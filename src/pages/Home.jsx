function Home() {
    return (
        <>
            <section className="hero h-screen bg-cover bg-center" style={{ backgroundImage: "url('https://placehold.co/600x400')" }}>
                <div className="flex items-center justify-center h-full">
                    <h1 className="header text-5xl text-center">Welcome to Masterton Roofing</h1>
                </div>
            </section>
            <section className="py-16 bg-gray-100">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-8">
                    <div className="w-1/2">
                        <h2 className="text-3xl font-bold mb-4">About Us</h2>
                        <p className="text-gray-700 mb-6">
                            Welcome to Masterton Roofing Limited! With years of experience in the industry, our team is dedicated to delivering top-quality roofing solutions that stand the test of time.
                            We take pride in our craftsmanship, attention to detail, and commitment to customer satisfaction. From the initial consultation to the final inspection, we ensure every project is completed efficiently, safely, and to the maximum standards.
                            Trust us to provide you with a roof that not only looks great but also offers lasting protection for your home or business.
                        </p>
                    </div>
                    <div className="w-1/2">
                        <img src="https://www.mastertonroofing.com/img/work/unnamed.jpg" alt="About us" className="rounded-lg shadow-lg w-full" />
                    </div>
                </div>
            </section>
        </>
    );
}

export default Home;
