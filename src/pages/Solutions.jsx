import DropdownPvcMembrane from "../components/dropdownPvcMembrane.jsx";
import SolutionArticle from "../components/SolutionArticle.jsx";
function Solutions() {
    return (
        <section className="py-16">
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 className="text-4xl font-bold mb-8">Our solutions</h1>
                <p className="text-lg text-gray-700">
                    We offer a wide range of roofing services tailored to your needs. More content coming soon!
                   <SolutionArticle
                       title="PVC Membrane"
                       blurb={"Our main material is the PVC membrane, which we have chosen to use for all our roofs due to its extreme weather resistance and durability. " +
                           "It can either be mechanically fixed or glued down (see adhered membrane article). It has a minium product warranty of 20 years."}
                       about={"This PVC roofing membrane is designed to work well on roofs of all shapes and sizes, making it suitable for both simple and more complex designs. " +
                           "It is made to last, with strong resistance to things like natural effects of UV damage and ageing over time. " +
                           "The material remains flexible, allowing it to move slightly with the building as temperatures change or the structure settles, which helps prevent damage." +
                           " When used with mechanically fixed roofing systems, it also helps the roof stay secure by offering excellent resistance to strong winds and uplift forces.\n"}
                       specs={"Danosa DANOPOL+ HS\n" +
                           "\n" +
                           "Available thicknesses: 1.5 mm, 1.2 mm\n" +
                           "\n" +
                           "Available colours: Anthracite\n" +
                           "\n" +
                           "Length (cm per roll): 2000 (1.5 mm), 2500 (1.2 mm)\n" +
                           "\n" +
                           "Width (cm per roll): 108\n" +
                           "\n" +
                           "Fire Regulation: Broof(T4)"}
                       image={"/img/hs.png"}
                       />
                </p>
            </div>
        </section>
    );
}

export default Solutions;
