@extends('layouts.app')
@section('content')
<<<<<<< HEAD
    <div class="p-4 bg-gray-100 min-h-screen">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-blue-100 text-blue-800 p-4 rounded shadow">Total Kamar: {{ $totalKamar }}</div>
            <div class="bg-green-100 text-green-800 p-4 rounded shadow">Kamar Terisi: {{ $kamarTerisi }}</div>
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded shadow">Kamar Tersedia: {{ $kamarTersedia }}</div>
            <div class="bg-purple-100 text-purple-800 p-4 rounded shadow">Penyewa Aktif: {{ $penyewaAktif }}</div>
        </div>

        <div class="mt-6 bg-indigo-100 text-indigo-800 p-4 rounded shadow">
            Total Pemasukan: Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
=======
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-blue-100 dark:bg-gray-800 p-4 rounded shadow">Total Kamar : {{ $totalKamar }}</div>
            <div class="bg-blue-100 dark:bg-gray-800 p-4 rounded shadow">Kamar Terisi: {{ $kamarTerisi }}</div>
            <div class="bg-blue-100 dark:bg-gray-800 p-4 rounded shadow">Kamar Tersedia: {{ $kamarTersedia }}</div>
            <div class="bg-blue-100 dark:bg-gray-800 p-4 rounded shadow">Penyewa Aktif: {{ $penyewaAktif }}</div>
            {{-- <div class="bg-white p-4 rounded shadow col-span-3">Pemasukan Bulan Ini: Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</div> --}}
            <div class="bg-blue-100 dark:bg-gray-800 p-4 rounded shadow col-span-4">Total Pemasukan: Rp
                {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
>>>>>>> efc97b406a69fadcb42b3308b98060b3a641d75a
        </div>
    </div>
@endsection
