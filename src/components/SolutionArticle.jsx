import { useState } from "react";

export default function SolutionArticle({
                                            title,
                                            blurb,
                                            about,
                                            specs,
                                            images = []
                                        }) {
    const [open, setOpen] = useState(false);

    return (
        <article className="w-full max-w-4xl mx-auto my-8 bg-white rounded-xl shadow-md border border-gray-200">

            {/* Preview */}
            <div className="p-6">
                <h2 className="text-2xl font-bold text-gray-800">{title}</h2>

                <p className="mt-2 text-gray-600">
                    {blurb}
                </p>

                <button
                    onClick={() => setOpen(!open)}
                    className="mt-4 inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition"
                >
                    {open ? "Hide details" : "Read more"}
                    <span
                        className={`ml-2 transform transition-transform ${
                            open ? "rotate-180" : ""
                        }`}
                    >
            ▼
          </span>
                </button>
            </div>

            {/* Expandable section */}
            <div
                className={`overflow-hidden transition-all duration-300 ${
                    open ? "max-h-[2000px] opacity-100" : "max-h-0 opacity-0"
                }`}
            >
                <div className="px-6 pb-6">

                    <h3 className="text-xl font-semibold mt-4 mb-2">About</h3>
                    <p className="text-gray-700 mb-4">{about}</p>

                    <h3 className="text-xl font-semibold mb-2">Specifications</h3>
                    <p className="text-gray-700 mb-6 whitespace-pre-line" >{specs}</p>

                    {/* Image gallery */}
                    {images.length > 0 && (
                        <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            {images.map((img, index) => (
                                <img
                                    key={index}
                                    src={img}
                                    className="rounded-lg shadow-md w-full object-cover"
                                />
                            ))}
                        </div>
                    )}

                </div>
            </div>

        </article>
    );
}