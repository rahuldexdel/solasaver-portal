<header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 py-4 flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <span class="text-2xl font-bold tracking-tight text-slate-900">
                <span class="text-emerald-500">Sola</span>Saver
            </span>
        </a>

        <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
            <a href="{{ route('home') }}" class="hover:text-slate-900 transition {{ Route::is('home') ? 'text-emerald-600 font-semibold' : '' }}">Home</a>
            <a href="#" class="hover:text-slate-900 transition">Why Choose Us</a>
            <a href="#" class="hover:text-slate-900 transition">System Compatibility</a>
            <a href="#" class="hover:text-slate-900 transition">Order and Product Questions</a>
            <a href="{{ route('public.where-to-buy') }}" class="hover:text-slate-900 transition {{ Route::is('public.where-to-buy') ? 'text-emerald-600 font-semibold' : '' }}">Where to Buy</a>
            <a href="{{ route('public.find-electrician') }}" class="hover:text-gray-900">Find an Installer</a>
            <a href="#" class="hover:text-slate-900 transition">Contact Us</a>
        </nav>

        <div class="flex items-center gap-4">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-xs font-medium text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-xl transition-all">
                        Log Out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-900 transition">Log In</a>
                <a href="{{ route('register') }}" class="text-sm font-semibold text-white bg-slate-900 hover:bg-slate-800 px-4 py-2 rounded-xl transition shadow-sm">Sign Up</a>
            @endauth
        </div>
    </div>
</header>