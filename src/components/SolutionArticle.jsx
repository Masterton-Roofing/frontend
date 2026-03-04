import { useState } from 'react';

export default function SolutionArticle({
    title,
    blurb,
    about,
    specs,
    image
                                        })
{
    const [open, setOpen] = useState(false);
    return (
        <article className="w-full max-1-4xl mx-auto my-8 bg-white rounded-xl shadow-md border border-gray-200">
            {/* header / preview */}
            <div className="p-6">
                <h2 className="text-2xl font-bold text-gray-800">{title}</h2>
                <p className="text-gray-600 mt-2">{blurb}</p>

                <button
                    onClick={() => setOpen(!open)}
                    className="mt-4 inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition"
                >
                    {open ? "Hide details" : "Read more"}
                    <span
                        className={`ml-2 transform transition-transform ${
                            open ? "rotate-180" : ""
                        }`}
                    >▼</span>
                </button>
            </div>
            {/* expandable content */}
            <div
                className={`overflow-hidden transition-all duration-300 ${
                    open ? "max-h-[1000px] opacity-100" : "max-h-0 opacity-0"
                }`}
            >
                <div className="px-6 pb-6">
                    <h3 className="text-xl font-semibold mt-4 mb-2">About</h3>
                    <p className="text-gray-700 mb-4">{about}</p>

                    <h3 className="text-xl font-semibold mb-2">Specifications</h3>
                    <p className="text-gray-700 mb-4">
                        {specs}
                    </p>

                    {image && (
                        <img
                            src={image}
                            className="rounded-lg mx-auto mt-4"
                        />
                    )}
                </div>
            </div>
        </article>
    )
}