@extends('layouts.app')
@section('content')
    <div class="p-6 bg-gray-100 min-h-screen">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
            <h1 class="text-2xl font-semibold mb-6 text-gray-800">
                {{ isset($kamar) ? 'Edit Kamar' : 'Tambah Kamar' }}
            </h1>

            <form method="POST" action="{{ isset($kamar) ? route('kamar.update', $kamar) : route('kamar.store') }}">
                @csrf
                @if (isset($kamar))
                    @method('PUT')
                @endif

                {{-- Nama Kamar --}}
                <div class="mb-4">
                    <label for="nama_kamar" class="block text-gray-700 font-medium mb-1">Nama Kamar</label>
                    <input type="text" name="nama_kamar" id="nama_kamar"
                        value="{{ old('nama_kamar', $kamar->nama_kamar ?? '') }}"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                        required>
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status" id="status"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        <option value="tersedia"
                            {{ old('status', $kamar->status ?? '') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="terisi"
                            {{ old('status', $kamar->status ?? '') == 'terisi' ? 'selected' : '' }}>Terisi</option>
                    </select>
                </div>

                {{-- Harga --}}
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 font-medium mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" id="harga" min="0"
                        value="{{ old('harga', $kamar->harga ?? '') }}"
                        placeholder="Masukkan harga kamar"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                        required>
                </div>

                {{-- Fasilitas --}}
                @php
                    $selectedFasilitas = old('fasilitas', $kamar->fasilitas ?? []);
                    $daftarFasilitas = ['AC', 'Kamar Mandi Dalam', 'WiFi', 'Kasur', 'Lemari', 'Meja', 'Kipas Angin'];
                @endphp

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Fasilitas</label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($daftarFasilitas as $fasilitas)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="fasilitas[]" value="{{ $fasilitas }}"
                                    class="text-blue-500"
                                    {{ in_array($fasilitas, $selectedFasilitas) ? 'checked' : '' }}>
                                <span class="text-gray-600">{{ $fasilitas }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-2 rounded shadow">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
