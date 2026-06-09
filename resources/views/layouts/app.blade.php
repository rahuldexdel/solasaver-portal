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
<body class="bg-gray-50 text-gray-900 antialiased" x-data="{ mobileMenuOpen: false }">
    <div class="min-h-screen flex">
        
        @include('layouts.navigation')

        <div class="flex-1 lg:pl-64 flex flex-col min-h-screen w-full">
            
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 sm:px-8 sticky top-0 z-40 shadow-sm">
                <div class="flex items-center gap-4">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-xl text-gray-500 hover:bg-gray-100 lg:hidden" title="Open Workspace Menu">
                        ☰
                    </button>
                    <div>
                        @if (isset($header))
                            {{ $header }}
                        @endif
                    </div>
                </div>
                <div class="text-[10px] sm:text-xs font-medium text-gray-400 uppercase tracking-wider hidden sm:block">
                    Workspace: <span class="text-gray-700 font-semibold">@role('admin') Local Admin Engine @else Customer Account Profile @endrole</span>
                </div>
            </header>

            <main class="flex-1 p-4 sm:p-8">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>