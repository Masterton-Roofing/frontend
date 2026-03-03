import { useState } from "react";
import { Link, useLocation } from "react-router-dom";

function Navbar() {
    const location = useLocation();
    const currentPath = location.pathname;
    const [mobileOpen, setMobileOpen] = useState(false);
    const [mobileSolutionsOpen, setMobileSolutionsOpen] = useState(false);

    const isActive = (path) =>
        currentPath === path || (path === "/" && currentPath === "/index.html");

    return (
        <nav className="fixed top-0 left-0 right-0 z-50 bg-gray-800/50 backdrop-blur-md">
            <div className="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div className="relative flex h-16 items-center justify-between">

                    {/* Logo */}
                    <div className="flex-shrink-0 flex items-center text-white font-bold text-xl">
                        Masterton Roofing
                    </div>

                    {/* Desktop Menu */}
                    <div className="hidden sm:flex space-x-4">
                        <Link
                            to="/"
                            className={`rounded-md px-3 py-2 text-sm font-medium ${
                                isActive("/") ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white"
                            }`}
                        >
                            Home
                        </Link>

                        {/* Solutions dropdown */}
                        <div className="relative group">
                            <button
                                className={`rounded-md px-3 py-2 text-sm font-medium flex items-center ${
                                    isActive("/solutions") ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white"
                                }`}
                            >
                                Solutions
                                <svg
                                    className="ml-1 h-4 w-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            {/* Dropdown Menu */}
                            <div className="absolute left-0 mt-2 w-56 bg-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-opacity z-50">
                                {/* Main Solutions */}
                                <div className="border-b border-gray-700">
                  <span className="block px-4 py-2 text-sm font-semibold text-gray-200">
                    Main Solutions
                  </span>
                                    <Link
                                        to="/solutions/pvc-membrane"
                                        className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                    >
                                        PVC Membrane
                                    </Link>

                                    <Link
                                        to="/solutions/vcl"
                                        className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                    >
                                        VCL
                                    </Link>

                                </div>

                                {/* More Services */}
                                <div className="border-t border-gray-700">
                  <span className="block px-4 py-2 text-sm font-semibold text-gray-200">
                    More Services
                  </span>
                                    <Link
                                        to="/solutions/drone"
                                        className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                    >
                                        Drone Footage
                                    </Link>

                                    <Link
                                        to="/solutions/roof-inspections"
                                        className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                    >
                                        Roof Inspections
                                    </Link>

                                    <Link
                                        to="/solutions/mansafe"
                                        className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                    >
                                        Mansafe Systems
                                    </Link>

                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Mobile menu button */}
                    <div className="sm:hidden flex items-center">
                        <button
                            onClick={() => setMobileOpen(!mobileOpen)}
                            className="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white"
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

            {/* Mobile Menu */}
            {mobileOpen && (
                <div className="sm:hidden bg-gray-800/95">
                    <Link
                        to="/"
                        className={`block px-4 py-2 text-base font-medium ${
                            isActive("/") ? "bg-gray-950/50 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white"
                        }`}
                    >
                        Home
                    </Link>

                    {/* Mobile Solutions Dropdown */}
                    <div className="border-t border-gray-700">
                        <button
                            className="w-full text-left px-4 py-2 text-base font-medium flex justify-between items-center text-gray-300 hover:bg-white/5 hover:text-white"
                            onClick={() => setMobileSolutionsOpen(!mobileSolutionsOpen)}
                        >
                            Solutions
                            <svg
                                className={`ml-1 h-4 w-4 transform ${mobileSolutionsOpen ? "rotate-180" : ""}`}
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        {mobileSolutionsOpen && (
                            <div className="pl-4">
                <span className="block px-4 py-2 text-sm font-semibold text-gray-200">
                  Main Solutions
                </span>
                                <Link
                                    to="/solutions/pvc-membrane"
                                    className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                >
                                    PVC Membrane
                                </Link>
                                <Link
                                    to="/solutions/vcl"
                                    className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                >
                                    VCL
                                </Link>

                                <span className="block px-4 py-2 mt-2 text-sm font-semibold text-gray-200">
                  More Services
                </span>
                                <Link
                                    to="/solutions/drone"
                                    className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                >
                                    Drone Footage
                                </Link>
                                <Link
                                    to="/solutions/roof-inspections"
                                    className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                >
                                    Roof Inspections
                                </Link>
                                <Link
                                    to="/solutions/mansafe"
                                    className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                                >
                                    Mansafe Systems
                                </Link>
                            </div>
                        )}
                    </div>
                </div>
            )}
        </nav>
    );
}

export default Navbar;