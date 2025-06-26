@extends('layouts.app')
@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">{{ isset($kamar) ? 'Edit' : 'Tambah' }} Kamar</h1>
        <form method="POST" action="{{ isset($kamar) ? route('kamar.update', $kamar) : route('kamar.store') }}">@csrf
            @if (isset($kamar))
                @method('PUT')
            @endif
            <!-- Nama Kamar -->
            <div>
                <label for="nama_kamar" class="block font-medium">Nama Kamar</label>
                <input type="text" name="nama_kamar" id="nama_kamar"
                    value="{{ old('nama_kamar', $kamar->nama_kamar ?? '') }}" class="border p-2 w-full" required>
            </div>

            <!-- Status -->
            <div class="mt-4">
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="border p-2 w-full">
                    <option value="tersedia" {{ old('status', $kamar->status ?? '') == 'tersedia' ? 'selected' : '' }}>
                        Tersedia</option>
                    <option value="terisi" {{ old('status', $kamar->status ?? '') == 'terisi' ? 'selected' : '' }}>Terisi
                    </option>
                </select>
            </div>

            <!-- Fasilitas (Checkbox Multiple) -->
            @php
                $selectedFasilitas = old('fasilitas', $kamar->fasilitas ?? []);
            @endphp

            <div class="mt-4">
                <label class="block font-medium mb-1">Fasilitas</label>
                <label><input type="checkbox" name="fasilitas[]" value="AC"
                        {{ in_array('AC', $selectedFasilitas) ? 'checked' : '' }}> AC</label><br>
                <label><input type="checkbox" name="fasilitas[]" value="Kamar Mandi Dalam"
                        {{ in_array('Kamar Mandi Dalam', $selectedFasilitas) ? 'checked' : '' }}> Kamar Mandi
                    Dalam</label><br>
                <label><input type="checkbox" name="fasilitas[]" value="WiFi"
                        {{ in_array('WiFi', $selectedFasilitas) ? 'checked' : '' }}> WiFi</label><br>
                <label><input type="checkbox" name="fasilitas[]" value="Kasur"
                        {{ in_array('Kasur', $selectedFasilitas) ? 'checked' : '' }}> Kasur</label><br>
            </div>


            <!-- Submit -->
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
