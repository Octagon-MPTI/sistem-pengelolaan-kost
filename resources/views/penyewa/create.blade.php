@extends('layouts.app')
@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">{{ isset($penyewa) ? 'Edit' : 'Tambah' }} Penyewa</h1>
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ isset($penyewa) ? route('penyewa.update', $penyewa) : route('penyewa.store') }}"
            enctype="multipart/form-data">@csrf
            @if (isset($penyewa))
                @method('PUT')
            @endif
            <!-- Nama -->
            <div>
                <label for="nama" class="block font-medium">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="border p-2 w-full" required
                    value="{{ old('nama', $penyewa->nama ?? '') }}">
            </div>
            <div>
                <label for="no_hp" class="block font-medium">No HP</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="No HP" class="border p-2 w-full" required
                    value="{{ old('no_hp', $penyewa->no_hp ?? '') }}">
            </div>
            <div>
                <label for="nik" class="block font-medium">NIK</label>
                <input type="text" name="nik" id="nik" placeholder="NIK" class="border p-2 w-full" required
                    value="{{ old('nik', $penyewa->nik ?? '') }}">
            </div>
            <div>
                <label for="foto_ktp" class="block font-medium">Foto KTP</label>
                <input type="file" name="foto_ktp" id="foto_ktp" class="border p-2 w-full" {{ isset($penyewa) ? '' : 'required' }} accept="image/*">
                
                @if (isset($penyewa) && $penyewa->foto_ktp)
                    <p class="mt-2">Foto KTP saat ini:</p>
                    <img src="{{ asset('storage/' . $penyewa->foto_ktp) }}" alt="Foto KTP" class="w-40 mt-1">
                @endif
            </div>

            <!-- Pilih Kamar -->
            <div>
                @if ($kamars->isEmpty())
                    <p class="text-red-600">Tidak ada kamar tersedia.</p>
                @else
                    <label for="kamar_id" class="block font-medium">Pilih Kamar</label>
                    <select name="kamar_id" id="kamar_id" class="border p-2 w-full">
                        <option value="">-- Pilih Kamar Tersedia --</option>
                        @foreach ($kamars as $kamar)
                            <option value="{{ $kamar->id }}" {{ (old('kamar_id', $penyewa->kamar_id ?? '') == $kamar->id) ? 'selected' : '' }}>
                                {{ $kamar->nama_kamar }}
                            </option>
                        @endforeach
                    </select>
                @endif

            </div>
            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="border p-2 w-full" required>
                    <option value="aktif" {{ old('status', $penyewa->status ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="keluar" {{ old('status', $penyewa->status ?? '') == 'keluar' ? 'selected' : '' }}>Keluar</option>
                </select>
            </div>

            <!-- Submit -->
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
@endsection
