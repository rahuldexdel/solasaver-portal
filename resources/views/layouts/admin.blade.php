<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SolaSaver Management Console</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 antialiased font-sans flex">

    <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col fixed inset-y-0 left-0 z-50">
        <div class="h-16 flex items-center px-6 bg-slate-950 border-b border-slate-800">
            <span class="text-xl font-bold text-white flex items-center gap-2">☀️ <span class="text-indigo-400">Sola</span>Saver</span>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-3 mb-2">Operations Center</div>
            <a href="/admin/dashboard" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">📊 Dashboard Overview</a>
            <a href="/admin/products" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">📦 Manage Products ss</a>
            <a href="/admin/orders" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">📋 View Orders</a>
            <a href="/admin/installations" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">🛠️ Installations</a>
            <a href="/admin/users" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium hover:bg-slate-800 hover:text-white transition">👥 User Accounts</a>
        </nav>
        <div class="p-4 bg-slate-950 border-t border-slate-800 flex justify-between items-center text-xs">
            <div>
                <p class="font-medium text-white">System Admin</p>
                <p class="text-slate-400">admin@solasaver.com</p>
            </div>
            <a href="/" class="text-slate-400 hover:text-white">Exit ↗</a>
        </div>
    </aside>

    <div class="flex-1 pl-64 flex flex-col min-h-screen">
        <header class="h-16 bg-white border-b border-gray-200 flex items-center px-8 sticky top-0 z-40 shadow-sm">
            <div class="font-semibold text-lg text-gray-800">{{ $title ?? 'Operations Desk' }}</div>
        </header>
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>

</body>
</html>