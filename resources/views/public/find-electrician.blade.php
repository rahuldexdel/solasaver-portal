<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find an Electrician Near You</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

@include('layouts.public-header')

    <main class="max-w-5xl mx-auto px-6 py-16">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900 mb-4">Find an Electrician Near You</h1>
            <p class="text-sm sm:text-base text-gray-500 font-light leading-relaxed">
                Electricians listed in the SolaSaver installer network operate as independent contractors and are not employees or agents of SolaSaver. Installation services are provided directly by the electrician.
            </p>
        </div>

        <div class="bg-white rounded-3xl border border-gray-200 p-6 sm:p-8 shadow-sm max-w-3xl mx-auto mb-12">
            <form action="#" method="GET" class="flex flex-col sm:flex-row gap-4">
                <div class="w-full sm:w-1/3 relative">
                    <select class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 appearance-none font-medium text-gray-700">
                        <option value="AU">🇦🇺 Australia</option>
                        <option value="US">🇺🇸 United States</option>
                        <option value="IN">🇮🇳 India</option>
                    </select>
                </div>
                <div class="w-full sm:flex-1">
                    <input type="text" placeholder="Enter your postal code..." class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-3.5 text-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 font-light">
                </div>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-6 py-3.5 rounded-xl transition shadow-sm flex items-center justify-center gap-2 whitespace-nowrap">
                    Find an installer &rarr;
                </button>
            </form>
        </div>

        <div class="w-full h-96 bg-slate-200 border border-gray-300 rounded-3xl shadow-inner relative overflow-hidden flex items-center justify-center group">
            <div class="absolute inset-0 bg-cover bg-center mix-blend-multiply opacity-80" style="background-image: url('https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&w=1200&q=80');"></div>
            <div class="relative bg-white/95 backdrop-blur-md border border-gray-200 rounded-2xl p-6 text-center max-w-sm mx-4 shadow-xl">
                <span class="text-2xl mb-2 block">📍</span>
                <h4 class="font-bold text-gray-900 mb-1">Interactive Map Node Launcher</h4>
                <p class="text-xs text-gray-500 font-light mb-0">Enter a valid region postal code above to search for verified contractor coordinates nearby.</p>
            </div>
        </div>
    </main>

</body>
</html>