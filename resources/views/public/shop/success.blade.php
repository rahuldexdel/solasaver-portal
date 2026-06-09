<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmed - SolaSaver</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased min-h-screen flex flex-col justify-between">

@include('layouts.public-header')

    <main class="max-w-2xl mx-auto w-full px-4 py-16 flex-grow flex items-center justify-center">
        <div class="bg-white border border-slate-200 rounded-3xl p-8 sm:p-12 text-center shadow-xl space-y-6 w-full">
            <div class="w-20 h-20 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center text-4xl mx-auto shadow-inner">
                🎉
            </div>
            
            <div class="space-y-2">
                <h1 class="text-3xl font-black text-slate-950 tracking-tight">Fulfillment Order Placed!</h1>
                <p class="text-slate-500 text-sm max-w-sm mx-auto">Your hardware allocation invoice transaction has been completed and assigned to deployment routing.</p>
            </div>

            <div class="border border-slate-100 bg-slate-50/50 rounded-2xl p-6 text-left space-y-3 font-medium text-sm">
                <div class="flex justify-between items-center text-slate-500">
                    <span>Order Reference Ledger</span>
                    <span class="font-mono text-slate-900 font-bold">#SLS-{{ $order->id }}</span>
                </div>
                <div class="flex justify-between items-center text-slate-500">
                    <span>Fulfillment Status</span>
                    <span class="bg-amber-100 text-amber-800 text-xs px-2.5 py-0.5 rounded-full font-bold uppercase tracking-wider">{{ $order->status }}</span>
                </div>
                <div class="flex justify-between items-center text-slate-500 border-t border-slate-100 pt-3">
                    <span class="text-slate-900 font-bold">Total Capital Paid</span>
                    <span class="text-xl font-black text-emerald-600">${{ number_format($order->total_amount, 2) }}</span>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <a href="{{ route('home') }}" class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-3.5 rounded-xl transition text-center text-sm shadow-sm">
                    Go to Account Dashboard
                </a>
                <a href="{{ route('shop') }}" class="bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 font-bold py-3.5 rounded-xl transition text-center text-sm shadow-sm">
                    Continue Browsing Shop
                </a>
            </div>
        </div>
    </main>

    <footer class="text-center py-6 text-xs text-slate-400 font-medium">
        &copy; {{ date('Y') }} SolaSaver Portal Engineering Ecosystem. All corporate properties protected.
    </footer>

</body>
</html>