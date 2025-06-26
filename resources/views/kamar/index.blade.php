@extends('layouts.app')
@section('content')
    <div class="p-4 bg-gray-100 min-h-screen">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-700">Manajemen Kamar</h1>
            <a href="{{ route('kamar.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
                Tambah Kamar
            </a>
        </div>

        <table class="w-full table-auto border rounded overflow-hidden shadow">
            <thead class="bg-blue-200 text-blue-900">
                <tr>
                    <th class="border px-4 py-2">Kamar</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Fasilitas</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($kamars as $kamar)
                    <tr class="border-t hover:bg-blue-50">
                        <td class="border px-4 py-2">{{ $kamar->nama_kamar }}</td>
                        <td class="border px-4 py-2">{{ $kamar->status }}</td>
                        <td class="border px-4 py-2 space-x-1">
                            @foreach ($kamar->fasilitas ?? [] as $item)
                                <span class="inline-block bg-indigo-100 text-indigo-800 text-sm px-2 py-1 rounded">
                                    {{ $item }}
                                </span>
                            @endforeach
                        </td>
                        <td class="border px-4 py-2">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('kamar.edit', $kamar) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-4 rounded-md">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('kamar.destroy', $kamar) }}" class="inline-block"
                                onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-md">
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
