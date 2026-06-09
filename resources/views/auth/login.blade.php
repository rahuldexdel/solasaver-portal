<x-guest-layout>
    <div class="min-h-screen flex flex-col md:flex-row bg-slate-50">
        
        <div class="hidden md:flex flex-1 relative bg-slate-900 overflow-hidden items-center justify-center">
            <div class="absolute inset-0 z-0 opacity-25 mix-blend-multiply bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1509391366360-2e959784a276?q=80&w=1470&auto=format&fit=crop');"></div>
            
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-950/90 via-slate-900/95 to-slate-950/70 z-10"></div>
            
            <div class="relative z-20 p-16 max-w-xl text-left text-white">
                <span class="bg-emerald-500/20 text-emerald-300 border border-emerald-500/30 text-[10px] font-bold tracking-widest uppercase px-3 py-1 rounded-full">
                    Enterprise Asset Management
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-white mt-6 leading-tight">
                    Smarter Solar, <br><span class="text-emerald-400">Smarter Savings.</span>
                </h1>
                <p class="text-slate-300 text-sm mt-4 leading-relaxed font-light">
                    Monitor excess electrical distribution, evaluate structural system load balances, and coordinate technician deployment schedules cleanly through an optimized hub pipeline.
                </p>
                
                <div class="mt-8 pt-8 border-t border-white/10 flex gap-12">
                    <div>
                        <p class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Scope Coverage</p>
                        <p class="text-lg font-bold text-emerald-400 mt-1">Australia Wide</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 uppercase tracking-widest font-semibold">Deployment Rate</p>
                        <p class="text-lg font-bold text-white mt-1">100% Green Energy</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full md:w-[45%] flex flex-col justify-center px-8 sm:px-16 lg:px-24 bg-white shadow-xl z-10 relative">
            
            <div class="mb-10 text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-2 text-2xl font-black tracking-tight text-slate-900">
                    <svg class="w-7 h-7 text-amber-500 fill-current animate-pulse-slow" viewBox="0 0 24 24">
                        <path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0-5c.55 0 1 .45 1 1v2c0 .55-.45 1-1 1s-1-.45-1-1V3c0-.55.45-1 1-1zm0 14c.55 0 1 .45 1 1v2c0 .55-.45 1-1 1s-1-.45-1-1v2c0-.55.45-1 1-1zM4.22 5.64c.39-.39 1.02-.39 1.41 0l1.41 1.41c.39.39.39 1.02 0 1.41s-1.02.39-1.41 0L4.22 7.05c-.39-.39-.39-1.02 0-1.41zm12.73 12.73c.39-.39 1.02-.39 1.41 0l1.41 1.41c.39.39.39 1.02 0 1.41s-1.02.39-1.41 0l-1.41-1.41c-.39-.39-.39-1.02 0-1.41zM3 11c.55 0 1 .45 1 1s-.45 1-1 1H1c-.55 0-1-.45-1-1s.45-1 1-1h2zm19 0c.55 0 1 .45 1 1s-.45 1-1 1h-2c-.55 0-1-.45-1-1s.45-1 1-1h2zm-16.78 7.38c-.39-.39-.39-1.02 0-1.41s1.02-.39 1.41 0l1.41 1.41c.39.39.39 1.02 0 1.41s-1.02.39-1.41 0l-1.41-1.41zm12.73-12.73c-.39-.39-.39-1.02 0-1.41s1.02-.39 1.41 0l1.41 1.41c.39.39.39 1.02 0 1.41s-1.02.39-1.41 0L17.95 5.65z"/>
                    </svg>
                    <span class="text-slate-900 font-extrabold text-xl">Sola<span class="text-emerald-500 font-bold">Saver</span></span>
                </div>
                <h2 class="text-2xl font-bold tracking-tight text-slate-900 mt-8">Welcome back</h2>
                <p class="text-sm text-slate-500 mt-2">Access your personalized monitoring dashboard and management toolsets.</p>
            </div>

            <x-auth-session-status class="mb-6 p-4 bg-emerald-50 text-emerald-800 rounded-xl text-sm border border-emerald-100" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Email Address</label>
                    <input id="email" 
                           type="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           autocomplete="username" 
                           placeholder="admin@solasaver.com"
                           class="block w-full px-4 py-3 bg-[#e9f0fe] text-slate-900 border-0 rounded-xl text-sm transition-all focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs text-rose-600 font-medium" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Password</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs font-medium text-emerald-600 hover:text-emerald-700 transition-colors" href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                    <input id="password" 
                           type="password" 
                           name="password" 
                           required 
                           autocomplete="current-password" 
                           placeholder="••••••••"
                           class="block w-full px-4 py-3 bg-[#e9f0fe] text-slate-900 border-0 rounded-xl text-sm transition-all focus:bg-white focus:ring-2 focus:ring-emerald-500/20 focus:outline-none" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs text-rose-600 font-medium" />
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                        <input id="remember_me" 
                               type="checkbox" 
                               name="remember"
                               class="w-4 h-4 rounded border-slate-300 text-emerald-600 shadow-sm focus:ring-emerald-500/30 focus:ring-offset-0 focus:outline-none cursor-pointer">
                        <span class="ms-2.5 text-sm text-slate-500 group-hover:text-slate-900 transition-colors select-none">Remember this station</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-[#059669] hover:bg-emerald-700 text-white font-semibold text-sm px-5 py-3.5 rounded-xl transition-all flex items-center justify-center gap-2 shadow-sm">
                        Sign In to Portal ➔
                    </button>
                </div>
            </form>

            <div class="mt-12 text-center text-xs text-slate-400">
                &copy; 2026 SolaSaver Portal. All rights reserved. Available wide across Australia.
            </div>
        </div>

    </div>
</x-guest-layout>