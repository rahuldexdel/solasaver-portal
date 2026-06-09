<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us - SolaSaver</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

@include('layouts.public-header')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        <div class="lg:col-span-5 space-y-6">
            <h1 class="text-4xl font-extrabold text-slate-950 tracking-tight">Get in Touch with Our Team</h1>
            <p class="text-slate-600 leading-relaxed">Have questions about setting up your SolaSaver unit or tracking your hardware shipment? Drop us a message, and our technical support specialists will get right back to you.</p>
            
            <div class="space-y-4 pt-4">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">📞</span>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Call Support</p>
                        <a href="tel:+012482482481" class="text-sm font-bold text-slate-900 hover:text-emerald-600">+01 248 248 2481</a>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✉️</span>
                    <div>
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Email Us</p>
                        <a href="mailto:info@solasaver.com" class="text-sm font-bold text-slate-900 hover:text-emerald-600">info@solasaver.com</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7 bg-white border border-slate-200 rounded-3xl p-8 shadow-xl">
            <form action="#" method="POST" class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                        <input type="text" required class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <input type="email" required class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                    <textarea rows="4" required class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 text-sm"></textarea>
                </div>
                <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-3 rounded-xl transition shadow-md">
                    Send Message →
                </button>
            </form>
        </div>
    </main>
</body>
</html>