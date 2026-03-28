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
            <section className="py-20 bg-gray-50">
                <div className="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <div className="mb-12">
                        <h2 className="text-4xl font-extrabold text-slate-900 mb-4">Get in Touch</h2>
                        <p className="text-lg text-gray-600">
                            Have a project in mind or need a professional roofing consultation? 
                            Fill out the form and our team will get back to you as soon as possible.
                        </p>
                    </div>
                    <div className="text-left">
                        <ContactForm />
                    </div>
                </div>
            </section>
        </>
    );
}

export default Contact;
