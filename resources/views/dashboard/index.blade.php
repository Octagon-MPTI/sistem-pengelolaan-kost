@extends('layouts.app')
@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">Dashboard</h1>
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-500 p-4 rounded shadow">Total Kamar : {{ $totalKamar }}</div>
            <div class="bg-white dark:bg-gray-500 p-4 rounded shadow">Kamar Terisi: {{ $kamarTerisi }}</div>
            <div class="bg-white dark:bg-gray-500 p-4 rounded shadow">Kamar Tersedia: {{ $kamarTersedia }}</div>
            <div class="bg-white dark:bg-gray-500 p-4 rounded shadow">Penyewa Aktif: {{ $penyewaAktif }}</div>
            {{-- <div class="bg-white p-4 rounded shadow col-span-3">Pemasukan Bulan Ini: Rp {{ number_format($pemasukanBulanIni, 0, ',', '.') }}</div> --}}
            <div class="bg-white dark:bg-gray-500 p-4 rounded shadow col-span-4">totalPemasukan: Rp
                {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
        </div>
    </div>
@endsection
