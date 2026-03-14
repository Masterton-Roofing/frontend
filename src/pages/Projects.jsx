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
        <div className="p-8">
            <h1 className="text-3xl font-bold mb-6">Projects</h1>
            <ul className="space-y-6">
                {projects.map((project) => (
                    <ProjectCard key={project.id} project={project} />
                ))}
            </ul>
        </div>
    );
}