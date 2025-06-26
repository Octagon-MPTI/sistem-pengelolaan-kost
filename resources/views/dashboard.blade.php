<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-700">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Judul --}}
            <h3 class="text-lg font-semibold text-gray-700">Statistik Kamar & Penyewa</h3>

            {{-- Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-blue-100 text-blue-800 p-4 rounded shadow">
                    Total Kamar : {{ $totalKamar ?? 0 }}
                </div>
                <div class="bg-green-100 text-green-800 p-4 rounded shadow">
                    Kamar Terisi: {{ $kamarTerisi ?? 0 }}
                </div>
                <div class="bg-yellow-100 text-yellow-800 p-4 rounded shadow">
                    Kamar Tersedia: {{ $kamarTersedia ?? 0 }}
                </div>
                <div class="bg-purple-100 text-purple-800 p-4 rounded shadow">
                    Penyewa Aktif: {{ $penyewaAktif ?? 0 }}
                </div>
            </div>

            {{-- Total Pemasukan --}}
            <div class="bg-indigo-100 text-indigo-800 p-4 rounded shadow">
                Total Pemasukan: {{ 'Rp ' . number_format($totalPemasukan ?? 0, 0, ',', '.') }}
            </div>

        </div>
    </div>
</x-app-layout>
