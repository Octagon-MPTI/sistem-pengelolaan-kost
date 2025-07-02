@extends('layouts.app')
@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">Halo, {{ $nama }}</h1>
        <div class=" bg-gray-700 rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold">Riwayat Pembayaran</h2>
                <div class="flex items-center gap-4">
                    <select class="border rounded-md px-3 py-1 text-gray-700">
                        <option>2025</option>
                        <!-- Tambahkan tahun lainnya jika perlu -->
                    </select>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md">
                        Unduh PDF
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border border-gray-600 rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-gray-200 rounded-t-lg">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Bulan</th>
                            <th class="px-4 py-2 border">Jumlah</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Tanggal Bayar</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-200">
                        <tr class="border">
                            <td class="px-4 py-2 border">1</td>
                            <td class="px-4 py-2 border">April 2025</td>
                            <td class="px-4 py-2 border">Rp 1.000.000</td>
                            <td class="px-4 py-2 border text-green-600 font-semibold">Lunas</td>
                            <td class="px-4 py-2 border">10-04-2025</td>
                        </tr>
                        <tr class="border">
                            <td class="px-4 py-2 border">2</td>
                            <td class="px-4 py-2 border">Mei 2025</td>
                            <td class="px-4 py-2 border">Rp 1.000.000</td>
                            <td class="px-4 py-2 border text-green-600 font-semibold">Lunas</td>
                            <td class="px-4 py-2 border">09-05-2025</td>
                        </tr>
                        <tr class="border">
                            <td class="px-4 py-2 border">3</td>
                            <td class="px-4 py-2 border">Juni 2025</td>
                            <td class="px-4 py-2 border">Rp 1.000.000</td>
                            <td class="px-4 py-2 border text-red-600 font-semibold">Belum<br>Lunas</td>
                            <td class="px-4 py-2 border">Bayar sebelum 10 Juni</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
