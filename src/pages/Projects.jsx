import { useEffect, useState } from "react";
import ProjectCard from "../components/ProjectCard";

export default function Projects() {
    const [projects, setProjects] = useState([]);

    useEffect(() => {
        fetch("/api/projects.json")
            .then((res) => res.json())
            .then((data) => setProjects(data))
            .catch(console.error);
    }, []);

    return (
        <div className="max-w-4xl mx-auto px-6 py-12">
            <h1 className="text-4xl font-bold mb-8 text-center text-slate-800">Our Projects</h1>
            <div className="space-y-8">
                {projects.map((project) => (
                    <ProjectCard key={project.id} project={project} />
                ))}
            </div>
        </div>
    );
}