import { Link } from "react-router-dom";

export default function Navbar() {
  return (
    <nav className="bg-gray-900 text-white">
      <div className="max-w-7xl mx-auto px-6">
        <div className="flex justify-between items-center h-16">

          {/* Logo */}
          <Link to="/" className="text-xl font-bold">
            <img src="/img/templogo.png" alt="Masterton Roofing" className="h-8 w-auto" />
          </Link>

          {/* Navigation */}
          <div className="flex items-center space-x-8">

            {/* Solutions Dropdown */}
            <div className="relative group">

              <Link to="/solutions" className="flex items-center text-gray-200 hover:text-white">
                Solutions
                <svg
                  className="ml-1 h-4 w-4"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                </svg>
              </Link>

              {/* Main dropdown */}
              <div className="absolute right-0 mt-3 w-80 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200">

                <div className="bg-gray-800 rounded-lg shadow-xl border border-gray-700">

                  {/* Main Solutions */}
                  <div className="py-2">
                    <span className="block px-4 py-1 text-xs font-semibold uppercase tracking-wider text-gray-400">
                      Main Solutions
                    </span>

                    <Link
                      to="/solutions/pvc"
                      className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                    >
                      PVC Membrane
                    </Link>

                    <Link
                      to="/solutions/vcl"
                      className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                    >
                      Vapour Control Layer (VCL)
                    </Link>
                  </div>

                  {/* More Services */}
                  <div className="border-t border-gray-700 py-2">

                    <span className="block px-4 py-1 text-xs font-semibold uppercase tracking-wider text-gray-400">
                      More Services
                    </span>

                    {/* Nested submenu trigger */}
                    <div className="relative group/services">

                      <div className="flex justify-between items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white cursor-pointer">
                        Additional Services

                        <svg
                          className="h-4 w-4 ml-2"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                        >
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 5l7 7-7 7" />
                        </svg>
                      </div>

                      {/* Side submenu */}
                      <div className="absolute top-0 left-full ml-1 w-64 opacity-0 invisible group-hover/services:visible group-hover/services:opacity-100 transition-all duration-200">

                        <div className="bg-gray-800 rounded-lg shadow-xl border border-gray-700 overflow-hidden">

                          <Link
                            to="/services/water-checks"
                            className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                          >
                            Water Checks
                          </Link>

                          <Link
                            to="/services/roof-surveys"
                            className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                          >
                            Roof Surveys
                          </Link>

                          <Link
                            to="/services/addons"
                            className="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white"
                          >
                            Addons
                          </Link>

                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            {/* Other links */}
            <Link to="/about" className="text-gray-200 hover:text-white">
              About
            </Link>

            <Link to="/contact" className="text-gray-200 hover:text-white">
              Contact
            </Link>

          </div>
        </div>
      </div>
    </nav>
  );
}
;