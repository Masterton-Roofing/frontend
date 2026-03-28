import { useState } from "react";
import { Link } from "react-router-dom";
import { FaBars, FaTimes, FaChevronDown, FaChevronRight } from "react-icons/fa";

export default function Navbar() {
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [isSolutionsOpen, setIsSolutionsOpen] = useState(false);
  const [isAdditionalOpen, setIsAdditionalOpen] = useState(false);

  return (
    <nav className="fixed top-0 left-0 right-0 z-50 bg-slate-900 text-white shadow-xl">
      <div className="max-w-7xl mx-auto px-6">
        <div className="flex justify-between items-center h-20">

          {/* Logo */}
          <Link to="/" className="flex items-center" onClick={() => setIsMenuOpen(false)}>
            <img src="/img/logo.png" alt="Masterton Roofing" className="h-12 md:h-16 w-auto" />
          </Link>

          {/* Desktop Navigation */}
          <div className="hidden lg:flex items-center space-x-8">
            {/* Solutions Dropdown */}
            <div className="relative group">
              <Link to="/solutions" className="flex items-center text-gray-300 hover:text-white font-bold transition">
                Solutions
                <FaChevronDown className="ml-1 h-3 w-3" />
              </Link>

              {/* Main dropdown */}
              <div className="absolute right-0 mt-0 pt-3 w-80 opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all duration-200">
                <div className="bg-slate-800 rounded-lg shadow-2xl border border-slate-700 overflow-hidden">
                  <div className="py-2">
                    <span className="block px-4 py-1 text-xs font-bold uppercase tracking-wider text-slate-500">
                      Main Solutions
                    </span>
                    <Link to="/solutions/pvc" className="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                      PVC Membrane
                    </Link>
                    <Link to="/solutions/vcl" className="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                      Vapour Control Layer (VCL)
                    </Link>
                  </div>

                  <div className="border-t border-slate-700 py-2">
                    <span className="block px-4 py-1 text-xs font-bold uppercase tracking-wider text-slate-500">
                      More Services
                    </span>
                    <div className="relative group/services">
                      <div className="flex justify-between items-center px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white cursor-pointer transition">
                        Additional Services
                        <FaChevronRight className="h-3 w-3" />
                      </div>
                      <div className="absolute top-0 left-full ml-1 w-64 opacity-0 invisible group-hover/services:visible group-hover/services:opacity-100 transition-all duration-200">
                        <div className="bg-slate-800 rounded-lg shadow-2xl border border-slate-700 overflow-hidden">
                          <Link to="/services/leak-detection" className="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                            Leak Detection
                          </Link>
                          <Link to="/services/roof-surveys" className="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                            Roof Surveys
                          </Link>
                          <Link to="/services/addons" className="block px-4 py-2 text-sm text-gray-300 hover:bg-slate-700 hover:text-white transition">
                            Add-ons
                          </Link>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <Link to="/projects" className="text-gray-300 hover:text-white font-bold transition">Projects</Link>
            <Link to="/blog" className="text-gray-300 hover:text-white font-bold transition">Blog</Link>
            <Link to="/contact" className="text-gray-300 hover:text-white font-bold transition">Contact</Link>
            <Link to="/about" className="text-gray-300 hover:text-white font-bold transition">About</Link>
          </div>

          {/* Mobile Menu Button */}
          <div className="lg:hidden flex items-center">
            <button
              onClick={() => setIsMenuOpen(!isMenuOpen)}
              className="text-gray-300 hover:text-white p-2 transition"
              aria-label="Toggle Menu"
            >
              {isMenuOpen ? <FaTimes size={24} /> : <FaBars size={24} />}
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Menu Overlay */}
      <div
        className={`lg:hidden fixed inset-0 z-40 bg-slate-900 transition-transform duration-300 ease-in-out ${
          isMenuOpen ? "translate-x-0" : "translate-x-full"
        }`}
        style={{ top: "80px" }}
      >
        <div className="flex flex-col p-6 space-y-4 h-full overflow-y-auto">
          {/* Solutions Mobile Accordion */}
          <div>
            <button
              onClick={() => setIsSolutionsOpen(!isSolutionsOpen)}
              className="flex justify-between items-center w-full text-xl font-bold text-gray-300 hover:text-white"
            >
              Solutions
              <FaChevronDown className={`transition-transform duration-200 ${isSolutionsOpen ? "rotate-180" : ""}`} />
            </button>
            <div className={`mt-2 ml-4 space-y-2 overflow-hidden transition-all duration-300 ${isSolutionsOpen ? "max-h-96 opacity-100" : "max-h-0 opacity-0"}`}>
              <Link to="/solutions" onClick={() => setIsMenuOpen(false)} className="block py-2 text-gray-400 hover:text-white">All Solutions</Link>
              <Link to="/solutions/pvc" onClick={() => setIsMenuOpen(false)} className="block py-2 text-gray-400 hover:text-white">PVC Membrane</Link>
              <Link to="/solutions/vcl" onClick={() => setIsMenuOpen(false)} className="block py-2 text-gray-400 hover:text-white">Vapour Control Layer (VCL)</Link>
              
              <div className="pt-2 border-t border-slate-800">
                 <button
                  onClick={() => setIsAdditionalOpen(!isAdditionalOpen)}
                  className="flex justify-between items-center w-full py-2 text-gray-300 hover:text-white font-semibold"
                >
                  Additional Services
                  <FaChevronDown className={`transition-transform duration-200 ${isAdditionalOpen ? "rotate-180" : ""}`} />
                </button>
                <div className={`mt-1 ml-4 space-y-2 overflow-hidden transition-all duration-300 ${isAdditionalOpen ? "max-h-40 opacity-100" : "max-h-0 opacity-0"}`}>
                  <Link to="/services/leak-detection" onClick={() => setIsMenuOpen(false)} className="block py-2 text-gray-400 hover:text-white">Leak Detection</Link>
                  <Link to="/services/roof-surveys" onClick={() => setIsMenuOpen(false)} className="block py-2 text-gray-400 hover:text-white">Roof Surveys</Link>
                  <Link to="/services/addons" onClick={() => setIsMenuOpen(false)} className="block py-2 text-gray-400 hover:text-white">Add-ons</Link>
                </div>
              </div>
            </div>
          </div>

          <Link to="/projects" onClick={() => setIsMenuOpen(false)} className="text-xl font-bold text-gray-300 hover:text-white">Projects</Link>
          <Link to="/blog" onClick={() => setIsMenuOpen(false)} className="text-xl font-bold text-gray-300 hover:text-white">Blog</Link>
          <Link to="/contact" onClick={() => setIsMenuOpen(false)} className="text-xl font-bold text-gray-300 hover:text-white">Contact</Link>
          <Link to="/about" onClick={() => setIsMenuOpen(false)} className="text-xl font-bold text-gray-300 hover:text-white">About</Link>
        </div>
      </div>
    </nav>
  );
}