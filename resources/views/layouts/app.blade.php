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
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <aside class="w-full lg:w-64 bg-white border-r border-gray-200 shadow-sm">
            <div class="p-6 font-bold text-xl text-blue-600">
                Kost App
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('dashboard') ? 'bg-blue-200 font-semibold' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('kamar.index') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('kamar.*') ? 'bg-blue-200 font-semibold' : '' }}">
                    Manajemen Kamar
                </a>
                <a href="{{ route('penyewa.index') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('penyewa.*') ? 'bg-blue-200 font-semibold' : '' }}">
                    Data Penyewa
                </a>
                <a href="{{ route('pembayaran.index') }}"
                    class="block px-4 py-2 rounded hover:bg-blue-100 {{ request()->routeIs('pembayaran.*') ? 'bg-blue-200 font-semibold' : '' }}">
                    Pembayaran
                </a>
                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
