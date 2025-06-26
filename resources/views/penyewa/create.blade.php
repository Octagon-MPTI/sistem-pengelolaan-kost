<<<<<<< HEAD
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
=======
<div x-show="tambahPenyewa" x-cloak x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm px-4">

    <div x-on:click.away="tambahPenyewa = false"
        class="relative bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-full max-w-lg p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-gray-800 dark:text-gray-100">
                {{ isset($penyewa) ? 'Edit' : 'Tambah' }} Penyewa
            </h2>
            <button @click="tambahPenyewa = false"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                ✕
            </button>
        </div>

        <!-- Error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4 text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ isset($penyewa) ? route('penyewa.update', $penyewa) : route('penyewa.store') }}"
            enctype="multipart/form-data" class="space-y-4">
            @csrf
            @if (isset($penyewa))
                @method('PUT')
            @endif

            <!-- Nama -->
            <div>
                <label for="nama"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    required value="{{ old('nama', $penyewa->nama ?? '') }}">
            </div>

            <!-- No HP -->
            <div>
                <label for="no_hp" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">No
                    HP</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="08xxxxx"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    required value="{{ old('no_hp', $penyewa->no_hp ?? '') }}">
            </div>

            <!-- NIK -->
            <div>
                <label for="nik"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">NIK</label>
                <input type="text" name="nik" id="nik" placeholder="NIK"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                    required value="{{ old('nik', $penyewa->nik ?? '') }}">
            </div>

            <!-- Foto KTP -->
            <div>
                <label for="foto_ktp" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Foto
                    KTP</label>
                <input type="file" name="foto_ktp" id="foto_ktp"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md dark:bg-gray-700 dark:text-white"
                    {{ isset($penyewa) ? '' : 'required' }} accept="image/*">
                @if (isset($penyewa) && $penyewa->foto_ktp)
                    <p class="text-xs text-gray-500 mt-2">Foto KTP saat ini:</p>
                    <img src="{{ asset('storage/' . $penyewa->foto_ktp) }}" alt="Foto KTP"
                        class="w-40 mt-1 rounded-md border">
                @endif
            </div>

            <!-- Pilih Kamar -->
            <div>
                <label for="kamar_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Pilih
                    Kamar</label>
                @if ($kamars->isEmpty())
                    <p class="text-sm text-red-600 bg-red-100 px-3 py-2 rounded-md">Tidak ada kamar tersedia.</p>
                @else
                    <select name="kamar_id" id="kamar_id"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                        <option value="">-- Pilih Kamar Tersedia --</option>
                        @foreach ($kamars as $kamar)
                            <option value="{{ $kamar->id }}"
                                {{ old('kamar_id', $penyewa->kamar_id ?? '') == $kamar->id ? 'selected' : '' }}>
                                {{ $kamar->nama_kamar }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>

            <!-- Status -->
            <div>
                <label for="status"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Status</label>
                <select name="status" id="status"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                    required>
                    <option value="aktif" {{ old('status', $penyewa->status ?? '') == 'aktif' ? 'selected' : '' }}>
                        Aktif</option>
                    <option value="keluar" {{ old('status', $penyewa->status ?? '') == 'keluar' ? 'selected' : '' }}>
                        Keluar</option>
>>>>>>> efc97b406a69fadcb42b3308b98060b3a641d75a
                </select>
            @endif
        </div>

<<<<<<< HEAD
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
=======
            <!-- Tombol Simpan -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-md shadow-sm transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
>>>>>>> efc97b406a69fadcb42b3308b98060b3a641d75a
