<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Where to Buy SolaSaver</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

@include('layouts.public-header')

    <section class="relative bg-gradient-to-br from-gray-900 via-slate-800 to-emerald-950 py-24 text-center text-white overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
        <div class="relative max-w-4xl mx-auto px-6">
            <span class="text-xs font-bold tracking-widest text-emerald-400 uppercase bg-emerald-500/10 px-4 py-1.5 rounded-full border border-emerald-500/20">Distribution Hub</span>
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight mt-6 mb-4">Where to Buy SolaSaver?</h1>
            <p class="text-lg text-gray-300 max-w-2xl mx-auto font-light leading-relaxed">
                Smart savings, smarter hardware. Get connected with procurement channels or find an independent installer near you.
            </p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-20">
        <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
            
            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8 flex flex-col justify-between hover:shadow-md transition duration-300">
                <div>
                    <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-2xl mb-6">🛠️</div>
                    <h3 class="text-2xl font-bold tracking-tight text-gray-900 mb-3">Find an Electrician Near You</h3>
                    <p class="text-gray-600 leading-relaxed mb-6 font-light">
                        Search our verified network of independent licensed electricians in your area who can supply, wire, and commission your hardware safely.
                    </p>
                </div>
                <a href="{{ route('public.find-electrician') }}" class="inline-flex items-center justify-center gap-2 bg-emerald-600 text-white font-medium px-6 py-3.5 rounded-xl hover:bg-emerald-700 transition w-full shadow-sm text-sm">
                    Find an Electrician Near You &rarr;
                </a>
            </div>

            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-8 flex flex-col justify-between hover:shadow-md transition duration-300">
                <div>
                    <div class="w-12 h-12 bg-blue-50 rounded-2xl flex items-center justify-center text-2xl mb-6">🛒</div>
                    <h3 class="text-2xl font-bold tracking-tight text-gray-900 mb-3">Order SolaSaver Directly</h3>
                    <p class="text-gray-600 leading-relaxed mb-6 font-light">
                        Purchase hardware kits directly from our official fulfillment marketplace and have them shipped directly to your deployment site coordinates.
                    </p>
                </div>
                <a href="/" class="inline-flex items-center justify-center gap-2 bg-gray-900 text-white font-medium px-6 py-3.5 rounded-xl hover:bg-gray-800 transition w-full shadow-sm text-sm">
                    Order SolaSaver Directly &rarr;
                </a>
            </div>

        </div>
    </section>

</body>
</html>