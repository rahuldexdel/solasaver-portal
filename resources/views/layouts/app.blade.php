<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SolaSaver') }} - Portal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    <div class="min-h-screen flex">
        
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col fixed inset-y-0 left-0 z-50">
            <div class="h-16 flex items-center px-6 border-b border-gray-200 bg-white">
                <a href="/" class="text-lg font-bold tracking-tight text-gray-900 flex items-center gap-2">
                    ☀️ <span class="text-gray-800">Sola<span class="text-gray-500 font-normal">Saver</span></span>
                </a>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1 bg-white overflow-y-auto">
                @auth
                    @role('admin')
                        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2">Management Panel</div>
                        
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('admin/dashboard') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            📊 Dashboard Overview
                        </a>

                        <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('admin/products*') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            📦 Manage Products
                        </a>

                        <a href="{{ route('admin.orders.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('admin/orders*') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            📋 View Orders
                        </a>

                        <a href="{{ route('admin.installations.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('admin/installations*') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            🛠️ Installations
                        </a>

                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('admin/users*') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            👥 User Accounts
                        </a>
                        @elserole('installer')
                        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2">Field Operations</div>
                        
                        <a href="{{ route('installer.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('installer/dashboard') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            📊 Deployment Center
                        </a>

                        <a href="{{ route('installer.jobs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('installer/jobs*') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            🛠️ Assigned Jobs
                        </a>
                    @else
                        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2">Customer Space</div>

                        <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('customer/dashboard') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            🏠 Customer Portal
                        </a>

                        <a href="{{ route('customer.orders.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ Request::is('customer/orders*') ? 'bg-gray-100 text-gray-900 font-semibold shadow-sm' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            📋 Purchase History
                        </a>
                    @endrole
                @endauth

                <div class="pt-4 mt-4 border-t border-gray-100"></div>
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2">Public Shortcuts</div>
                <a href="/" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-all">
                    🛒 Open Live Shop ↗
                </a>
            </nav>

            <div class="p-4 border-t border-gray-200 bg-gray-50/50 flex items-center justify-between">
                <div class="min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate">{{ auth()->user()->name ?? 'Guest User' }}</p>
                    <p class="text-xs text-gray-500 truncate capitalize">
                        {{ auth()->user()->roles->first()->name ?? 'Client' }}
                    </p>
                </div>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-gray-600 p-2 rounded-lg hover:bg-gray-100 transition-all" title="Sign Out">
                        🚪
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 pl-64 flex flex-col min-h-screen">
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-8 sticky top-0 z-40 shadow-sm">
                <div>
                    @if (isset($header))
                        {{ $header }}
                    @endif
                </div>
                <div class="text-xs font-medium text-gray-400 uppercase tracking-wider">
                    Workspace: <span class="text-gray-700 font-semibold">@role('admin') Local Admin Engine @else Customer Account Profile @endrole</span>
                </div>
            </header>

            <main class="flex-1 p-8">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>