import DropdownPvcMembrane from "../components/dropdownPvcMembrane.jsx";
function Solutions() {
    return (
        <section className="py-16">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 className="text-4xl font-bold mb-8">Our solutions</h1>
                <p className="text-lg text-gray-700">
                    We offer a wide range of roofing services tailored to your needs. More content coming soon!
                    <DropdownPvcMembrane />
                </p>
            </div>
        </section>
    );
}

export default Solutions;
