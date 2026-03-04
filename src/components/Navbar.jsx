import { useState } from "react";
import { Link, useLocation } from "react-router-dom";

function Navbar() {
  const location = useLocation();
  const currentPath = location.pathname;
  const [mobileOpen, setMobileOpen] = useState(false);
  const [mobileSolutionsOpen, setMobileSolutionsOpen] = useState(false);

  // Helper to determine if a link is active
  // Now handles sub-routes (e.g., "Solutions" stays active when on "PVC Membrane")
  const isActive = (path) => {
    if (path === "/") {
      return currentPath === "/" || currentPath === "/index.html";
    }
    return currentPath.startsWith(path);
  };

  const closeMobileMenu = () => {
    setMobileOpen(false);
    setMobileSolutionsOpen(false);
  };

  return (
    <nav className="fixed top-0 left-0 right-0 z-50 bg-gray-800/80 backdrop-blur-md border-b border-white/10">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="relative flex h-16 items-center justify-between">
          {/* Logo */}
          <Link
            to="/"
            className="flex-shrink-0 flex items-center text-white font-bold text-xl tracking-tight"
            onClick={closeMobileMenu}
          >
            Masterton Roofing
          </Link>

          {/* Desktop Menu */}
          <div className="hidden sm:flex items-center space-x-4">
            <Link
              to="/"
              className={`rounded-md px-3 py-2 text-sm font-medium transition-colors ${
                isActive("/") && currentPath === "/"
                  ? "bg-gray-950/50 text-white"
                  : "text-gray-300 hover:bg-white/5 hover:text-white"
              }`}
            >
              Home
            </Link>

            {/* Solutions Dropdown Group */}
            <div className="relative group">
              {/* 
                                Clickable Parent Link: 
                                Navigates to /solutions on click, 
                                but the parent 'group' class triggers the dropdown on hover.
                            */}
              <Link
                to="/solutions"
                className={`rounded-md px-3 py-2 text-sm font-medium flex items-center transition-colors ${
                  isActive("/solutions")
                    ? "bg-gray-950/50 text-white"
                    : "text-gray-300 hover:bg-white/5 hover:text-white"
                }`}
              >
                Solutions
                <svg
                  className="ml-1 h-4 w-4 transition-transform group-hover:rotate-180"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M19 9l-7 7-7-7"
                  />
                </svg>
              </Link>

              {/* 
                                Dropdown Menu Container 
                                'top-full' and 'pt-2' creates the 'Invisible Bridge' 
                                so the mouse doesn't leave the hover zone.
                            */}
              <div className="absolute left-0 top-full w-64 pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                <div className="bg-gray-800 rounded-lg shadow-xl ring-1 ring-black ring-opacity-5 overflow-hidden border border-gray-700">
                  {/* Main Solutions Section */}
                  <div className="py-2">
                    <span className="block px-4 py-1 text-xs font-semibold uppercase tracking-wider text-gray-500">
                      Main Solutions
                    </span>
                    <Link
                      to="/solutions/pvc-membrane"
                      className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors"
                    >
                      PVC Membrane
                    </Link>
                    <Link
                      to="/solutions/vcl"
                      className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors"
                    >
                      VCL
                    </Link>
                  </div>

                  {/* More Services Section */}
                  <div className="border-t border-gray-700 py-2">
                    <span className="block px-4 py-1 text-xs font-semibold uppercase tracking-wider text-gray-500">
                      More Services
                    </span>
                    <Link
                      to="/solutions/drone"
                      className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors"
                    >
                      Drone Footage
                    </Link>
                    <Link
                      to="/solutions/roof-inspections"
                      className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors"
                    >
                      Roof Inspections
                    </Link>
                    <Link
                      to="/solutions/mansafe"
                      className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white transition-colors"
                    >
                      Mansafe Systems
                    </Link>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {/* Mobile Menu Toggle Button */}
          <div className="sm:hidden flex items-center">
            <button
              onClick={() => setMobileOpen(!mobileOpen)}
              className="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-none"
            >
              <span className="sr-only">Open main menu</span>
              <svg
                className="h-6 w-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                {mobileOpen ? (
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M6 18L18 6M6 6l12 12"
                  />
                ) : (
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                )}
              </svg>
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Menu Panel */}
      {mobileOpen && (
        <div className="sm:hidden bg-gray-900 border-t border-gray-700">
          <div className="space-y-1 px-2 pb-3 pt-2">
            <Link
              to="/"
              onClick={closeMobileMenu}
              className={`block px-3 py-2 rounded-md text-base font-medium ${
                currentPath === "/"
                  ? "bg-gray-950 text-white"
                  : "text-gray-300 hover:bg-gray-800"
              }`}
            >
              Home
            </Link>

            {/* Mobile Solutions Accordion */}
            <div>
              <button
                className={`w-full text-left px-3 py-2 text-base font-medium flex justify-between items-center rounded-md ${
                  isActive("/solutions")
                    ? "text-white bg-white/5"
                    : "text-gray-300 hover:bg-gray-800"
                }`}
                onClick={() => setMobileSolutionsOpen(!mobileSolutionsOpen)}
              >
                Solutions
                <svg
                  className={`ml-1 h-5 w-5 transform transition-transform ${
                    mobileSolutionsOpen ? "rotate-180" : ""
                  }`}
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth={2}
                    d="M19 9l-7 7-7-7"
                  />
                </svg>
              </button>

              {mobileSolutionsOpen && (
                <div className="mt-1 space-y-1 bg-gray-950/40 rounded-lg mx-2 pb-2 border border-white/5">
                  {/* Main Solutions Landing Page Link (Essential for mobile) */}
                  <Link
                    to="/solutions"
                    onClick={closeMobileMenu}
                    className="block px-4 py-3 text-sm font-bold text-blue-400 hover:bg-gray-800 rounded-t-lg"
                  >
                    All Solutions Overview →
                  </Link>

                  <div className="px-4 py-2 text-xs font-semibold text-gray-500 uppercase">
                    Main Solutions
                  </div>
                  <Link
                    to="/solutions/pvc-membrane"
                    onClick={closeMobileMenu}
                    className="block px-8 py-2 text-sm text-gray-300 hover:text-white"
                  >
                    PVC Membrane
                  </Link>
                  <Link
                    to="/solutions/vcl"
                    onClick={closeMobileMenu}
                    className="block px-8 py-2 text-sm text-gray-300 hover:text-white"
                  >
                    VCL
                  </Link>

                  <div className="px-4 py-2 mt-2 text-xs font-semibold text-gray-500 uppercase border-t border-gray-800">
                    More Services
                  </div>
                  <Link
                    to="/solutions/drone"
                    onClick={closeMobileMenu}
                    className="block px-8 py-2 text-sm text-gray-300 hover:text-white"
                  >
                    Drone Footage
                  </Link>
                  <Link
                    to="/solutions/roof-inspections"
                    onClick={closeMobileMenu}
                    className="block px-8 py-2 text-sm text-gray-300 hover:text-white"
                  >
                    Roof Inspections
                  </Link>
                  <Link
                    to="/solutions/mansafe"
                    onClick={closeMobileMenu}
                    className="block px-8 py-2 text-sm text-gray-300 hover:text-white"
                  >
                    Mansafe Systems
                  </Link>
                </div>
              )}
            </div>
          </div>
        </div>
      )}
    </nav>
  );
}

export default Navbar;
