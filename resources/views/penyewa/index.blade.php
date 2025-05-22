@extends('layouts.app')
@section('content')
    <div class="p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold mb-4">Manajemen Penyewa</h1>
            <a href="{{ route('penyewa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Penyewa</a>
        </div>
        <table class="mt-4 w-full table-auto border">
            <thead class="bg-gray-100 dark:bg-gray-500">
                <tr>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">No HP</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyewas as $penyewa)
                    <tr class="border-t">
                        <td class="border px-4 py-2">{{ $penyewa->nama }}</td>
                        <td class="border px-4 py-2">{{ $penyewa->no_hp }}</td>
                        <td class="border px-4 py-2">{{ $penyewa->status }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('penyewa.edit', $penyewa) }}"
                                class="bg-blue-600 text-white py-1 px-4 rounded-md hover:bg-blue-700">Edit</a>

                            <form method="POST" action="{{ route('penyewa.destroy', $penyewa) }}" class="inline-block"
                                onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-1 px-4 rounded-md hover:bg-red-700">
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
