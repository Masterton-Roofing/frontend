import { FaHardHat, FaSearch, FaTint, FaPlus } from "react-icons/fa";

export default function ServicesPreview() {
    const services = [
        {
            icon: <FaHardHat size={40} color="#01597c" />,
            title: "Roofing Systems",
            desc: "PVC membrane and flat roofing solutions."
        },
        {
            icon: <FaSearch size={40} color="#01597c"            />,
            title: "Roof Surveys",
            desc: "Professional roof condition inspections."
        },
        {
            icon: <FaTint size={40} color="#01597c" />,
            title: "Water Checks",
            desc: "Leak detection and preventative checks."
        },
        {
            icon: <FaPlus size={40} color="#f2e599"/>,
            title: "Add-ons",
            desc: "Mansafe systems, drone surveys and more."
        }
    ];

    return (
        <section className="py-20 bg-gray-50">
            <div className="max-w-6xl mx-auto px-6">

                <h2 className="text-3xl font-bold text-center mb-12">
                    Our Services
                </h2>

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    {services.map((service, index) => (
                        <div
                            key={index}
                            className="text-center p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition"
                        >
                            <div className="text-blue-600 flex justify-center mb-4">
                                {service.icon}
                            </div>

                            <h3 className="font-semibold text-lg mb-2">
                                {service.title}
                            </h3>

                            <p className="text-gray-600 text-sm">
                                {service.desc}
                            </p>
                        </div>
                    ))}
                </div>

            </div>
        </section>
    );
}