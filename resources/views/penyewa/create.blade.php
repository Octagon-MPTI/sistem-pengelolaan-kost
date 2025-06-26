@extends('layouts.app')
@section('content')
<div class="p-6 max-w-lg mx-auto bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">{{ isset($penyewa) ? 'Edit' : 'Tambah' }} Penyewa</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ isset($penyewa) ? route('penyewa.update', $penyewa) : route('penyewa.store') }}" enctype="multipart/form-data">
        @csrf
        @if (isset($penyewa))
            @method('PUT')
        @endif

        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Nama lengkap" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                value="{{ old('nama', $penyewa->nama ?? '') }}">
        </div>

        <!-- No HP -->
        <div class="mb-4">
            <label for="no_hp" class="block font-medium text-gray-700 mb-1">No HP</label>
            <input type="text" name="no_hp" id="no_hp" placeholder="Nomor HP" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                value="{{ old('no_hp', $penyewa->no_hp ?? '') }}">
        </div>

        <!-- NIK -->
        <div class="mb-4">
            <label for="nik" class="block font-medium text-gray-700 mb-1">NIK</label>
            <input type="text" name="nik" id="nik" placeholder="Nomor Induk Kependudukan" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                value="{{ old('nik', $penyewa->nik ?? '') }}">
        </div>

        <!-- Foto KTP -->
        <div class="mb-4">
            <label for="foto_ktp" class="block font-medium text-gray-700 mb-1">Foto KTP</label>
            <input type="file" name="foto_ktp" id="foto_ktp" class="w-full"
                {{ isset($penyewa) ? '' : 'required' }} accept="image/*">

            @if (isset($penyewa) && $penyewa->foto_ktp)
                <p class="mt-2 text-gray-600">Foto KTP saat ini:</p>
                <img src="{{ asset('storage/' . $penyewa->foto_ktp) }}" alt="Foto KTP" class="w-40 mt-1 rounded border">
            @endif
        </div>

        <!-- Pilih Kamar -->
        <div class="mb-4">
            @if ($kamars->isEmpty())
                <p class="text-red-600 font-medium">Tidak ada kamar tersedia.</p>
            @else
                <label for="kamar_id" class="block font-medium text-gray-700 mb-1">Pilih Kamar</label>
                <select name="kamar_id" id="kamar_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Pilih Kamar Tersedia --</option>
                    @foreach ($kamars as $kamar)
                        <option value="{{ $kamar->id }}" {{ (old('kamar_id', $penyewa->kamar_id ?? '') == $kamar->id) ? 'selected' : '' }}>
                            {{ $kamar->nama_kamar }}
                        </option>
                    @endforeach
                </select>
            @endif
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block font-medium text-gray-700 mb-1">Status</label>
            <select name="status" id="status" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="aktif" {{ old('status', $penyewa->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="keluar" {{ old('status', $penyewa->status ?? '') == 'keluar' ? 'selected' : '' }}>Keluar</option>
            </select>
        </div>

        <!-- Submit -->
        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
