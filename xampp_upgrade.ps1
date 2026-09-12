param(
    [string]$XamppPath = "C:\xampp",
    [string]$PhpZipPath = "",        # Full path to a local PHP Thread-Safe ZIP (preferred)
    [string]$PhpVersion = "",       # e.g. "8.4.0" - used only if PhpZipPath omitted
    [string]$PhpZipUrl = ""         # Optional direct URL to ZIP; if empty and PhpVersion provided a default URL will be tried
)

function Abort($msg) { Write-Error $msg; exit 1 }

# Ensure admin
$principal = New-Object Security.Principal.WindowsPrincipal([Security.Principal.WindowsIdentity]::GetCurrent())
if (-not $principal.IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator)) {
    Abort "Run PowerShell as Administrator."
}

if (-not (Test-Path $XamppPath)) { Abort "XAMPP path not found: $XamppPath" }

$phpPath = Join-Path $XamppPath "php"
$timestamp = (Get-Date).ToString("yyyyMMddHHmmss")
$backupPath = Join-Path $XamppPath ("php-backup-$timestamp")
$tempDir = Join-Path $env:TEMP ("php-upgrade-$timestamp")
$zipPath = ""

# Determine zip source
if ($PhpZipPath) {
    if (-not (Test-Path $PhpZipPath)) { Abort "Provided PhpZipPath not found: $PhpZipPath" }
    $zipPath = (Resolve-Path $PhpZipPath).Path
} else {
    if (-not $PhpZipUrl -and $PhpVersion) {
        # common windows.php.net naming for VS16 x64 thread-safe; adjust if needed
        $PhpZipUrl = "https://windows.php.net/downloads/releases/php-$PhpVersion-Win32-vs16-x64.zip"
    }
    if (-not $PhpZipUrl) { Abort "No PhpZipPath or PhpZipUrl/PhpVersion provided. Download a Thread-Safe PHP zip and provide -PhpZipPath." }

    New-Item -ItemType Directory -Path $tempDir -Force | Out-Null
    $zipPath = Join-Path $tempDir "php.zip"
    Write-Host "Downloading PHP from $PhpZipUrl ..."
    try {
        Invoke-WebRequest -Uri $PhpZipUrl -OutFile $zipPath -UseBasicParsing -ErrorAction Stop
    } catch {
        Abort "Download failed: $($_.Exception.Message) - provide a local ZIP with -PhpZipPath."
    }
}

# Stop XAMPP services
Write-Host "Stopping XAMPP services..."
$stopExe = Join-Path $XamppPath "xampp_stop.exe"
if (Test-Path $stopExe) { & $stopExe } else {
    Try { Stop-Service -Name 'Apache2.4' -ErrorAction SilentlyContinue } Catch {}
    Try { Stop-Service -Name 'mysql' -ErrorAction SilentlyContinue } Catch {}
}
Start-Sleep -Seconds 3

# Backup existing php folder
if (Test-Path $phpPath) {
    Write-Host "Backing up existing PHP folder to $backupPath"
    Move-Item -Path $phpPath -Destination $backupPath -Force
} else {
    Write-Host "No existing PHP folder to backup."
}

# Prepare extraction
if (-not (Test-Path $tempDir)) { New-Item -ItemType Directory -Path $tempDir -Force | Out-Null }
$extractDir = Join-Path $tempDir "extracted"
if (Test-Path $extractDir) { Remove-Item -Recurse -Force $extractDir }
New-Item -ItemType Directory -Path $extractDir -Force | Out-Null

Write-Host "Extracting $zipPath ..."
try {
    Expand-Archive -LiteralPath $zipPath -DestinationPath $extractDir -Force
} catch {
    Abort "Failed to extract ZIP: $($_.Exception.Message)"
}

# Find folder containing php.exe
$phpSource = Get-ChildItem -Path $extractDir -Directory | Where-Object { Test-Path (Join-Path $_.FullName 'php.exe') } | Select-Object -First 1
if (-not $phpSource) {
    if (Test-Path (Join-Path $extractDir 'php.exe')) {
        $phpSourcePath = $extractDir
    } else {
        Abort "Could not find php.exe inside extracted archive. Inspect $extractDir"
    }
} else {
    $phpSourcePath = $phpSource.FullName
}

Write-Host "Moving new PHP from $phpSourcePath to $phpPath ..."
try {
    Move-Item -Path $phpSourcePath -Destination $phpPath -Force
} catch {
    # fallback to copy
    New-Item -ItemType Directory -Path $phpPath -Force | Out-Null
    Copy-Item -Path (Join-Path $phpSourcePath '*') -Destination $phpPath -Recurse -Force
}

# Restore php.ini if backed up
$oldIni = Join-Path $backupPath 'php.ini'
if (Test-Path $oldIni) {
    Write-Host "Restoring php.ini from backup"
    Copy-Item -Path $oldIni -Destination (Join-Path $phpPath 'php.ini') -Force
} else {
    $prod = Join-Path $phpPath 'php.ini-production'
    if (Test-Path $prod -and -not (Test-Path (Join-Path $phpPath 'php.ini'))) {
        Copy-Item -Path $prod -Destination (Join-Path $phpPath 'php.ini')
    }
}

# Try to set extension_dir in php.ini to the new ext folder
$extDir = Join-Path $phpPath 'ext'
$iniFile = Join-Path $phpPath 'php.ini'
if (Test-Path $iniFile -and Test-Path $extDir) {
    (Get-Content $iniFile) |
        ForEach-Object { $_ -replace '^\s*;?\s*extension_dir\s*=.*', "extension_dir = `"$extDir`"" } |
        Set-Content $iniFile
}

# Start XAMPP services
Write-Host "Starting XAMPP services..."
$startExe = Join-Path $XamppPath "xampp_start.exe"
if (Test-Path $startExe) { & $startExe } else {
    Try { Start-Service -Name 'Apache2.4' -ErrorAction SilentlyContinue } Catch {}
    Try { Start-Service -Name 'mysql' -ErrorAction SilentlyContinue } Catch {}
}
Start-Sleep -Seconds 5

# Verify
$cliPhp = Join-Path $phpPath 'php.exe'
if (Test-Path $cliPhp) {
    Write-Host "New CLI PHP version:"
    & $cliPhp -v
} else {
    Write-Host "php.exe not found at $cliPhp - check $phpPath"
}

Write-Host "Upgrade finished. Backup preserved at: $backupPath"
Write-Host "Temporary files: $tempDir"