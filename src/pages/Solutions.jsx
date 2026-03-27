import SolutionArticle from "../components/SolutionArticle.jsx";
import { Link } from "react-router-dom";
function Solutions() {
    return (
        <>
            {/* Hero Section */}
            <section
                className="hero h-[60vh] md:h-[80vh] bg-cover bg-center"
                style={{ backgroundImage: "url('https://placehold.co/600x400')" }}
            >
                <div className="flex items-center justify-center h-full bg-black/40 px-4">
                    <h1 className="text-white text-4xl md:text-5xl font-bold text-center">
                        Solutions Hub
                    </h1>
                </div>
            </section>

            {/* Content Section */}
            <section className="py-16 bg-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <h2 className="text-3xl font-bold mb-8 text-gray-900 text-center md:text-left">
                        Our Roofing Solutions
                    </h2>

                    <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">


                        <Link to="/solutions/pvc">
                            <button
                                type="button"
                                className="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                            >
                                PVC Roofing
                            </button>
                        </Link>


                    </div>

                </div>
            </section>
        </>
    );
}

export default Solutions;
