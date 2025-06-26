@extends('layouts.app')
@section('content')
<div class="p-4 bg-gray-100 min-h-screen">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-700">Manajemen Penyewa</h1>
        <a href="{{ route('penyewa.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
            Tambah Penyewa
        </a>
    </div>

    <table class="w-full table-auto border rounded overflow-hidden shadow">
        <thead class="bg-blue-200 text-blue-900">
            <tr>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">No HP</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($penyewas as $penyewa)
                <tr class="border-t hover:bg-blue-50">
                    <td class="border px-4 py-2">{{ $penyewa->nama }}</td>
                    <td class="border px-4 py-2">{{ $penyewa->no_hp }}</td>
                    <td class="border px-4 py-2">
                        @if ($penyewa->status === 'Aktif')
                            <span class="inline-block bg-green-100 text-green-800 text-sm px-2 py-1 rounded">
                                {{ $penyewa->status }}
                            </span>
                        @else
                            <span class="inline-block bg-red-100 text-red-800 text-sm px-2 py-1 rounded">
                                {{ $penyewa->status }}
                            </span>
                        @endif
                    </td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="{{ route('penyewa.edit', $penyewa) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-4 rounded-md">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('penyewa.destroy', $penyewa) }}" class="inline-block"
                            onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-md">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
