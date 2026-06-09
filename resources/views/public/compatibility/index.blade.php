<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>System Compatibility Matrix - SolaSaver</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="text-2xl font-bold tracking-tight text-slate-900"><span class="text-emerald-500">Sola</span>Saver</span>
            </a>
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                <a href="{{ route('home') }}" class="hover:text-slate-900 transition">Home</a>
                <a href="#" class="hover:text-slate-900 transition">Why Choose Us</a>
                <a href="{{ route('compatibility') }}" class="text-emerald-600 border-b-2 border-emerald-500 pb-1">System Compatibility</a>
                <a href="{{ route('shop') }}" class="hover:text-slate-900 transition">Order and Product Questions</a>
                <a href="{{ route('contact') }}" class="hover:text-slate-900 transition">Contact Us</a>
            </nav>
            <div class="flex items-center gap-4">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">@csrf
                        <button type="submit" class="text-xs font-medium text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg transition">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900 transition">Log In</a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 px-4 py-2 rounded-xl transition">Register</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-slate-950 tracking-tight">Is SolaSaver Compatible With Your System?</h1>
            <p class="text-slate-500 mt-2">Enter your inverter brand model parameter metrics to evaluate deployment readiness setup profiles.</p>
        </div>

        @if(session('checked'))
            <div class="mb-8 p-6 rounded-2xl border transition-all {{ session('compatible') ? 'bg-emerald-50 border-emerald-200 text-emerald-900' : 'bg-rose-50 border-rose-200 text-rose-900' }}">
                <div class="flex items-center gap-3">
                    <span class="text-3xl">{{ session('compatible') ? '✅' : '❌' }}</span>
                    <div>
                        <h3 class="font-bold text-lg">{{ session('compatible') ? 'System Fully Supported!' : 'Incompatible Setup Profile' }}</h3>
                        <p class="text-sm opacity-90 mt-0.5">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white border border-slate-200 rounded-3xl p-8 shadow-xl">
            <form action="{{ route('compatibility.check') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="inverter_brand" class="block text-sm font-medium text-slate-700 mb-2">Solar Inverter Brand Name</label>
                    <input type="text" name="inverter_brand" id="inverter_brand" required placeholder="e.g., Fronius, SMA, SolarEdge, Enphase" class="w-full rounded-xl border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 text-sm placeholder:text-slate-300">
                    <span class="text-xs text-slate-400 mt-2 block font-medium">Tip: Try entering 'Fronius' or 'Enphase' to see a successful match simulation.</span>
                    @error('inverter_brand')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3.5 rounded-xl transition shadow-md">
                    Execute Matrix Diagnostics →
                </button>
            </form>
        </div>
    </main>
</body>
</html>