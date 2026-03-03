import { Link, useLocation } from 'react-router-dom';

function Navbar() {
    const location = useLocation();
    const currentPath = location.pathname;

    const isActive = (path) => {
        return currentPath === path || (path === '/' && currentPath === '/index.html');
    };

    return (
        <nav className="fixed top-0 left-0 right-0 z-50 bg-gray-800/50 after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10 backdrop-blur-md">
            <div className="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div className="relative flex h-16 items-center justify-between">
                    <div className="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        {/* Mobile menu button */}
                        <button
                            type="button"
                            className="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500"
                        >
                            <span className="sr-only">Open main menu</span>
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                strokeWidth="1.5"
                                aria-hidden="true"
                                className="size-6"
                            >
                                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" strokeLinecap="round" strokeLinejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div className="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div className="flex shrink-0 items-center">
                            <span className="text-white font-bold text-xl">Masterton Roofing</span>
                        </div>
                        <div className="hidden sm:ml-6 sm:block">
                            <div className="flex space-x-4">
                                <Link
                                    to="/"
                                    className={`rounded-md px-3 py-2 text-sm font-medium ${isActive('/') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'
                                        }`}
                                >
                                    Home
                                </Link>
                                <Link
                                    to="/solutions"
                                    className={`rounded-md px-3 py-2 text-sm font-medium ${isActive('/solutions') ? 'bg-gray-950/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'
                                        }`}
                                >
                                    Solutions
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    );
}

export default Navbar;
