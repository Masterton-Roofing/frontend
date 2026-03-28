// Make sure to run npm install @formspree/react
// For more help visit https://formspr.ee/react-help
import React from 'react';
import { useForm, ValidationError } from '@formspree/react';

function ContactForm() {
    const [state, handleSubmit] = useForm("xykbkbeg");
    if (state.succeeded) {
        return <p className="text-green-600 font-semibold p-4 bg-green-50 rounded-lg border border-green-200">Thanks for your message! We will get back to you shortly!</p>;
    }
    return (
        <form onSubmit={handleSubmit} className="space-y-6 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
            <div>
                <label htmlFor="email" className="block text-sm font-semibold text-gray-700 mb-2">
                    Email Address
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200"
                    placeholder="your@email.com"
                    required
                />
                <ValidationError
                    prefix="Email"
                    field="email"
                    errors={state.errors}
                    className="mt-1 text-sm text-red-600"
                />
            </div>
            <div>
                <label htmlFor="name" className="block text-sm font-semibold text-gray-700 mb-2">
                    Name
                </label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200"
                    placeholder="Your Name"
                    required
                />
                <ValidationError
                    prefix="Name"
                    field="name"
                    errors={state.errors}
                    className="mt-1 text-sm text-red-600"
                />
            </div>
            <div>
                <label htmlFor="phone" className="block text-sm font-semibold text-gray-700 mb-2">
                    Phone Number
                </label>
                <input
                    id="phone"
                    type="tel"
                    name="phone"
                    className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200"
                    placeholder="07700 123456"
                    required
                />
                <ValidationError
                    prefix="Phone"
                    field="phone"
                    errors={state.errors}
                    className="mt-1 text-sm text-red-600"
                />
            </div>
            <div>
                <label htmlFor="message" className="block text-sm font-semibold text-gray-700 mb-2">
                    Message
                </label>
                <textarea
                    id="message"
                    name="message"
                    rows="4"
                    className="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200 resize-none"
                    placeholder="How can we help you?"
                    required
                />
                <ValidationError
                    prefix="Message"
                    field="message"
                    errors={state.errors}
                    className="mt-1 text-sm text-red-600"
                />
            </div>
            <button 
                type="submit" 
                disabled={state.submitting}
                className="w-full bg-slate-900 text-white font-bold py-3 px-6 rounded-lg hover:bg-slate-800 transform transition active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed shadow-md"
            >
                {state.submitting ? "Sending... This may take some time - Do not close this tab" : "Send Message"}
            </button>
        </form>
    );
}


export default ContactForm;