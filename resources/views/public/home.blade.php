<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SolaSaver - Use More of Your Own Solar Power</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased">

    <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 py-4 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <span class="text-2xl font-bold tracking-tight text-slate-900">
                    <span class="text-emerald-500">Sola</span>Saver
                </span>
            </a>

            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                <a href="{{ route('home') }}" class="text-emerald-600 border-b-2 border-emerald-500 pb-1">Home</a>
                <a href="#" class="hover:text-slate-900 transition">Why Choose Us</a>
                <a href="{{ route('compatibility') }}" class="hover:text-slate-900 transition">System Compatibility</a>
                <a href="{{ route('shop') }}" class="hover:text-slate-900 transition">Order and Product Questions</a>
                <a href="{{ route('contact') }}" class="hover:text-slate-900 transition">Contact Us</a>
            </nav>

            <div class="flex items-center gap-4">
         @auth
    @if(auth()->user()->hasRole('admin'))
        <a href="{{ route('admin.dashboard') }}" class="text-sm font-semibold text-gray-900 hover:text-gray-700">
            Go to Admin Portal →
        </a>
    @elseif(auth()->user()->hasRole('installer'))
        <a href="{{ route('installer.dashboard') }}" class="text-sm font-semibold text-gray-900 hover:text-gray-700">
            Go to Deployment Center →
        </a>
    @else
        <a href="{{ route('customer.dashboard') }}" class="text-sm font-semibold text-gray-900 hover:text-gray-700">
            Go to Customer Portal →
        </a>
    @endif
@endauth
                <a href="tel:+012482482481" class="hidden lg:flex items-center bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition shadow-sm">
                    Call for Help +01 248 248 2481 →
                </a>
            </div>
        </div>
    </header>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7 space-y-6">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-950 tracking-tight leading-none">
                Use More of Your Own Solar Power <span class="text-emerald-500 block sm:inline">Simply and Affordably</span>
            </h1>
            <p class="text-lg text-slate-600 max-w-xl leading-relaxed">
                SolaSaver is a smart solar diverter that automatically redirects excess solar energy straight into your home systems—helping reduce electricity bills and maximizing the true value of your setup.
            </p>
            
            <div class="flex flex-wrap items-center gap-4 pt-2">
                <a href="{{ route('shop') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-8 py-3.5 rounded-xl transition shadow-md hover:shadow-lg">
                    How It Works →
                </a>
                <a href="{{ route('compatibility') }}" class="bg-transparent hover:bg-slate-100 text-slate-900 border-2 border-slate-900 font-bold px-8 py-3.5 rounded-xl transition">
                    Check Compatibility →
                </a>
            </div>
        </div>

        <div class="lg:col-span-5 relative flex justify-center">
            <div class="w-full max-w-md relative">
                <div class="absolute -inset-4 bg-emerald-100 rounded-3xl transform rotate-3 opacity-70 blur-sm"></div>
                <div class="relative bg-white border border-slate-200 rounded-2xl p-8 shadow-xl flex flex-col items-center justify-center text-center space-y-4">
                    <div class="text-6xl">📟</div>
                    <h3 class="text-xl font-bold text-slate-900">SolaSaver Core Unit</h3>
                    <p class="text-xs text-slate-400 font-mono tracking-widest uppercase">Smart Diverter Module</p>
                    <div class="w-full bg-emerald-50 rounded-xl p-3 border border-emerald-100">
                        <span class="text-xs font-semibold text-emerald-800 uppercase tracking-wider block">Current Optimization Status</span>
                        <span class="text-2xl font-black text-emerald-600 mt-1 block">100% Diversion</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>