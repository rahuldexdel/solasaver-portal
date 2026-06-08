<div class="flex flex-col h-full bg-white border-r border-gray-200 w-64 fixed left-0 top-0 pt-16 z-10">
    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest block">Navigation Hub</span>
        <span class="text-xs font-bold text-gray-800 mt-1 block">
            {{ Auth::user()->is_admin ? 'Operational Terminal' : 'Customer Workspace' }}
        </span>
    </div>

    <div class="p-4 flex-1 space-y-1 overflow-y-auto">
        @if(Auth::check() && Auth::user()->is_admin)
            <span class="block text-[10px] font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2 mt-2">Management Panel</span>
            
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium tracking-tight text-gray-700 hover:bg-gray-50 transition-all">
                📊 Dashboard Overview
            </a>
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium tracking-tight text-gray-700 hover:bg-gray-50 transition-all">
                📦 Manage Products
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium tracking-tight text-gray-700 hover:bg-gray-50 transition-all">
                📋 View Orders
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium tracking-tight text-gray-700 hover:bg-gray-50 transition-all">
                🛠️ Installations
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium tracking-tight text-gray-700 hover:bg-gray-50 transition-all">
                👥 User Accounts
            </a>
        @else
            <span class="block text-[10px] font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2 mt-2">Customer Account</span>
            
            <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium tracking-tight text-gray-700 hover:bg-gray-50 transition-all">
                🏠 Customer Portal Home
            </a>
            <a href="{{ route('customer.orders.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-xs font-medium tracking-tight text-gray-700 hover:bg-gray-50 transition-all">
                📋 Your Purchased Orders
            </a>
        @endif

        <span class="block text-[10px] font-semibold text-gray-400 uppercase tracking-wider px-3 mb-2 pt-4 border-t border-gray-100">Public Services</span>
        <a href="/" target="_blank" class="flex items-center justify-between px-3 py-2.5 rounded-xl text-xs font-medium text-gray-600 hover:bg-gray-50 transition-all">
            <span>🛒 Open Live Shop</span>
            <span class="text-[10px] text-gray-400">↗</span>
        </a>
    </div>

    <div class="p-4 border-t border-gray-100 bg-gray-50/50">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium text-red-500 hover:bg-red-50 transition-all">
                🚪 Sign Out Account
            </button>
        </form>
    </div>
</div>