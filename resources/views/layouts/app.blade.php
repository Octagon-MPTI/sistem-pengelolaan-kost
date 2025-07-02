<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
        {{-- @include('layouts.navigation') --}}
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif


        {{-- Sidebar --}}
        <aside class="w-64 bg-blue-900 dark:bg-gray-950 border-r">
            <div class="p-4 font-bold text-lg text-white">
                Kost App
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 rounded text-white dark:text-gray-100 hover:bg-blue-100 dark:hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-blue-200 text-black dark:bg-gray-500' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('kamar.index') }}"
                    class="block px-4 py-2 rounded text-white hover:bg-blue-100 dark:hover:bg-gray-700 {{ request()->routeIs('kamar.*') ? 'bg-blue-200 text-black dark:bg-gray-500' : '' }}">
                    Manajemen Kamar
                </a>
                <a href="{{ route('penyewa.index') }}"
                    class="block px-4 py-2 rounded text-white hover:bg-blue-100 dark:hover:bg-gray-700 {{ request()->routeIs('penyewa.*') ? 'bg-blue-200 text-black dark:bg-gray-500' : '' }}">
                    Data Penyewa
                </a>
                <a href="{{ route('pembayaran.index') }}"
                    class="block px-4 py-2 rounded text-white hover:bg-blue-100 dark:hover:bg-gray-700 {{ request()->routeIs('pembayaran.*') ? 'bg-blue-200 text-black dark:bg-gray-500' : '' }}">
                    Pembayaran
                </a>
                <a href="{{ route('riwayat-bayar') }}"
                    class="block px-4 py-2 rounded text-white hover:bg-blue-100 dark:hover:bg-gray-700 {{ request()->routeIs('pembayaran.*') ? 'bg-blue-200 text-black dark:bg-gray-500' : '' }}">
                    Riwayat Pembayaran
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
</body>

</html>
