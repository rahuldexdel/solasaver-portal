<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Checkout - SolaSaver</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-50 text-slate-900 p-8">
    <div class="max-w-2xl mx-auto bg-white border border-slate-200 rounded-3xl p-8 shadow-xl">
        <h2 class="text-2xl font-black mb-6">Delivery Details & Checkout</h2>
        
        <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Shipping Destination Address</label>
                <textarea name="shipping_address" required rows="3" class="w-full rounded-xl border-slate-200 text-sm focus:ring-emerald-500"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Contact Phone Number</label>
                <input type="text" name="contact_phone" required class="w-full rounded-xl border-slate-200 text-sm focus:ring-emerald-500">
            </div>

            <button type="submit" class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold py-3.5 rounded-xl transition">
                Authorize Financial Wire & Order Placement
            </button>
        </form>
    </div>
</body>
</html>