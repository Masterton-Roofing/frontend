import ServicesPreview from "../components/ServicesPreview";
import ContactForm from "../components/contactForm.jsx";
function Contact() {
    return (
        <>
            <section className="hero h-[80vh] md:h-screen bg-cover bg-center" style={{ backgroundImage: "url('https://placehold.co/600x400')" }}>
                <div className="flex items-center justify-center h-full bg-black/30 px-4">
                    <h1 className="header text-4xl md:text-5xl lg:text-6xl text-center text-white font-bold">Contact Us</h1>
                </div>
            </section>
            <section className="py-16 bg-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center gap-8">
                    <div className="w-full md:w-1/2 text-center md:text-left">
                        <h2 className="text-3xl font-bold mb-4">Contact Us</h2>
                    <ContactForm />
                    </div>
                    <div className="w-full md:w-1/2">
                        <img src="https://www.mastertonroofing.com/img/work/unnamed.jpg" alt="About us" className="rounded-lg shadow-lg w-full" />
                    </div>
                </div>
            </section>
        </>
    );
}

export default Contact;
