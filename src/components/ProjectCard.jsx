import { useState } from "react";

export default function ProjectCard({ project }) {
    const [open, setOpen] = useState(false);

    return (
        <div className="w-full mx-auto mt-6">
            <button
                onClick={() => setOpen(!open)}
                className="w-full flex justify-between items-center px-4 py-3 bg-slate-800 text-white rounded-lg transition hover:bg-slate-700"
            >
                <span className="text-left">{project.name}</span>

                <span
                    className={`transform transition-transform duration-300 ml-2 ${
                        open ? "rotate-180" : ""
                    }`}
                >
          ▼
        </span>
            </button>

            <div
                className={`overflow-hidden transition-all duration-300 ${
                    open ? "max-h-[1000px] opacity-100 mt-2" : "max-h-0 opacity-0"
                }`}
            >
                <div className="p-4 bg-slate-100 rounded-lg text-slate-700">
                    <span className="text-2xl font-bold mb-2 block">About</span>

                    <p className="mb-4">{project.description}</p>


                    {project.image && (
                        <img
                            className="mx-auto rounded"
                            src={project.image}
                            alt={project.name}
                        />
                    )}
                </div>
            </div>
        </div>
    );
}