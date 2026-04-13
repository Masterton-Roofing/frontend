<?php
require_once __DIR__ . '/php/Layout/Main.php';

renderHeader("Contact Us - Masterton Roofing");
?>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CXBWH0G43P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-CXBWH0G43P');
    </script>

</head>
<section class="hero h-[80vh] md:h-screen bg-cover bg-center" style="background-image: url('/public/img/.jpeg')">
    <div class="flex items-center justify-center h-full bg-black/30 px-4">
        <h1 class="header text-4xl md:text-5xl lg:text-6xl text-center text-white font-bold">Contact Us</h1>
    </div>
</section>
<section class="py-20 bg-gray-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-12">
            <h2 class="text-4xl font-extrabold text-slate-900 mb-4">Get in Touch</h2>
            <p class="text-lg text-gray-600">
                Have a project in mind or need a professional roofing consultation?
                Fill out the form and our team will get back to you as soon as possible.
            </p>
        </div>
        <div class="text-left">
            <form action="https://formspree.io/f/xykbkbeg" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                <div>
                    <label htmlFor="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email Address
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200"
                        placeholder="your@email.com"
                        required
                    />
                </div>
                <div>
                    <label htmlFor="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Name
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200"
                        placeholder="Your Name"
                        required
                    />
                </div>
                <div>
                    <label htmlFor="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                        Phone Number
                    </label>
                    <input
                        id="phone"
                        type="tel"
                        name="phone"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200"
                        placeholder="07700 123456"
                        required
                    />
                </div>
                <div>
                    <label htmlFor="message" class="block text-sm font-semibold text-gray-700 mb-2">
                        Message
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        rows="4"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200 resize-none"
                        placeholder="How can we help you?"
                        required
                    ></textarea>
                </div>
                <button 
                    type="submit" 
                    class="w-full bg-slate-900 text-white font-bold py-3 px-6 rounded-lg hover:bg-slate-800 transform transition active:scale-[0.98] shadow-md"
                >
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>

<?php
renderPageFooter();
?>
