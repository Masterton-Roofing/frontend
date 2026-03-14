import React from "react";

export default function ProjectCard({ project }) {
    return (
        <li className="p-4 border rounded shadow hover:shadow-lg transition flex flex-col md:flex-row items-start md:items-center">
            {project.image && (
                <img
                    src={project.image}
                    alt={project.name}
                    className="w-32 h-32 object-cover rounded mr-6 mb-4 md:mb-0"
                />
            )}
            <div>
                <h2 className="text-xl font-semibold">{project.name}</h2>
                <p className="text-gray-700 mt-1">{project.description}</p>
                <p className="text-sm text-gray-500 mt-1">ID: {project.id}</p>
            </div>
        </li>
    );
}