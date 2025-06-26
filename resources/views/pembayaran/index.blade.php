@extends('layouts.app')

@section('content')
    <div class="p-4 bg-gray-100 min-h-screen">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-700">Pembayaran</h1>
            <a href="{{ route('pembayaran.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
                Input Pembayaran
            </a>
        </div>

        <table class="w-full table-auto border rounded overflow-hidden shadow">
            <thead class="bg-blue-200 text-blue-900">
                <tr>
                    <th class="border px-4 py-2">Nama Penyewa</th>
                    <th class="border px-4 py-2">Kamar</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Tanggal Bayar</th>
                    <th class="border px-4 py-2">Jatuh Tempo</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @forelse($pembayarans as $pembayaran)
                    <tr class="border-t hover:bg-blue-50">
                        <td class="border px-4 py-2">{{ $pembayaran->penyewa->nama }}</td>
                        <td class="border px-4 py-2">{{ $pembayaran->penyewa->kamar->nomor_kamar ?? '-' }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y') }}</td>
                        <td class="border px-4 py-2 text-gray-700 font-medium">
                            {{ \Carbon\Carbon::parse($pembayaran->jatuh_tempo)->format('d M Y') }}
                        </td>
                        <td class="border px-4 py-2">
                            @if($pembayaran->status == 'lunas')
                                <span class="inline-block bg-green-100 text-green-800 text-sm px-2 py-1 rounded font-semibold">Lunas</span>
                            @else
                                <span class="inline-block bg-red-100 text-red-800 text-sm px-2 py-1 rounded font-semibold">Belum Lunas</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 space-x-2 text-nowrap">
                            <a href="{{ route('pembayaran.edit', $pembayaran) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-4 rounded-md">
                                Edit
                            </a>
                            <form action="{{ route('pembayaran.destroy', $pembayaran) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-md">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data pembayaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
