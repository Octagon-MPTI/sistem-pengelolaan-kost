@extends('layouts.app')
@section('content')
    <div x-data="{ tambahKamar: false }" class="p-4">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-bold mb-4">Manajemen Kamar</h1>
            <button @click="tambahKamar = true" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Kamar</button>
        </div>

        @include('kamar.create')
        
        <table class="mt-4 w-full table-auto">
            <thead class="bg-gray-100 dark:bg-gray-500">
                <tr>
                    <th class="bg-blue-100 dark:bg-gray-800 drak:text-gray-200 px-4 py-2 rounded-t-lg">Nomor</th>
                    <th class="bg-blue-100 dark:bg-gray-800 drak:text-gray-200 px-4 py-2 rounded-t-lg">Status</th>
                    <th class="bg-blue-100 dark:bg-gray-800 drak:text-gray-200 px-4 py-2 rounded-t-lg">Fasilitas</th>
                    <th class="bg-blue-100 dark:bg-gray-800 drak:text-gray-200 px-4 py-2 rounded-t-lg">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kamars as $kamar)
                    <tr class="border-t dark:border-gray-700">
                        <td class="border dark:border-gray-700 px-4 py-2">{{ $kamar->nama_kamar }}</td>
                        <td class="border dark:border-gray-700 px-4 py-2">{{ $kamar->status }}</td>
                        <td class="border dark:border-gray-700 px-4 py-2">
                            @foreach ($kamar->fasilitas ?? [] as $item)
                                <span
                                    class="bg-gray-200 dark:bg-gray-800 text-sm px-2 py-1 rounded mr-1">{{ $item }}</span>
                            @endforeach
                        </td>

                        {{-- <td>{{ implode(', ', $kamar->fasilitas ?? []) }}</td> --}}
                        <td class="border dark:border-gray-700 px-4 py-2">
                            <a href="{{ route('kamar.edit', $kamar) }}"
                                class="bg-blue-600 text-white py-1 px-4 rounded-md hover:bg-blue-700">Edit</a>

                            <form method="POST" action="{{ route('kamar.destroy', $kamar) }}" class="inline-block"
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
