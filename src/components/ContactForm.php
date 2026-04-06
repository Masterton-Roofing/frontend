<?php
$success = isset($_GET['success']); // simple flag after redirect
?>

<?php if ($success): ?>
    <p class="text-green-600 font-semibold p-4 bg-green-50 rounded-lg border border-green-200">
        Thanks for your message! We will get back to you shortly!
    </p>
<?php endif; ?>

<form action="https://formspree.io/f/xykbkbeg" method="POST" class="space-y-6 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
    <div>
        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
        <input type="email" id="email" name="email" required placeholder="your@email.com"
               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200">
    </div>

    <div>
        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name</label>
        <input type="text" id="name" name="name" required placeholder="Your Name"
               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200">
    </div>

    <div>
        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
        <input type="tel" id="phone" name="phone" required placeholder="07700 123456"
               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200">
    </div>

    <div>
        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
        <textarea id="message" name="message" rows="4" required placeholder="How can we help you?"
                  class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none transition duration-200 resize-none"></textarea>
    </div>

    <button type="submit"
            class="w-full bg-slate-900 text-white font-bold py-3 px-6 rounded-lg hover:bg-slate-800 shadow-md">
        Send Message
    </button>
</form>