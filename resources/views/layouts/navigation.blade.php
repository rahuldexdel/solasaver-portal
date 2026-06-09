<div 
    x-show="mobileMenuOpen" 
    x-transition:enter="transition-opacity ease-linear duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 lg:hidden" 
    @click="mobileMenuOpen = false"
    style="display: none;">
</div>

<aside 
    :class="mobileMenuOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="w-64 bg-white border-r border-gray-200 flex flex-col fixed inset-y-0 left-0 z-50 transform transition-transform duration-300 ease-in-out">
    
    <div class="h-16 flex items-center justify-between px-6 border-b border-gray-200 bg-white">
        <a href="/" class="text-lg font-bold tracking-tight text-gray-900 flex items-center gap-2">
            ☀️ <span class="text-gray-800">Sola<span class="text-gray-500 font-normal">Saver</span></span>
        </a>
        <button @click="mobileMenuOpen = false" class="p-1 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-600 lg:hidden" title="Close Menu">
            ✕
        </button>
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
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 hover:bg-gray-200/60 rounded-xl transition font-medium">
            <span>⚙️</span> Account Settings
        </a>
        
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button
                type="submit"
                class="w-7 h-7 flex items-center justify-center rounded-full bg-[#ff2d55] hover:bg-[#e9284d] transition-all"
                title="Sign Out"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7 text-white"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M12 2v10" />
                    <path d="M18.4 6.6a9 9 0 1 1-12.8 0" />
                </svg>
            </button>
        </form>
    </div>
</aside>