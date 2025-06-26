@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        {{ isset($pembayaran) ? 'Edit' : 'Input' }} Pembayaran
    </h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ isset($pembayaran) ? route('pembayaran.update', $pembayaran) : route('pembayaran.store') }}">
        @csrf
        @if(isset($pembayaran))
            @method('PUT')
        @endif

        <!-- Penyewa -->
        <div class="mb-4">
            <label for="penyewa_id" class="block font-medium text-gray-700 mb-1">Pilih Penyewa</label>
            <select name="penyewa_id" id="penyewa_id"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                {{ isset($pembayaran) ? 'disabled' : 'required' }}>
                <option value="">-- Pilih Penyewa --</option>
                @foreach($penyewas as $penyewa)
                    <option value="{{ $penyewa->id }}"
                        {{ old('penyewa_id', $pembayaran->penyewa_id ?? '') == $penyewa->id ? 'selected' : '' }}>
                        {{ $penyewa->nama }}
                    </option>
                @endforeach
            </select>
            @if (isset($pembayaran))
                <input type="hidden" name="penyewa_id" value="{{ $pembayaran->penyewa_id }}">
            @endif
        </div>

        <!-- Nomor Kamar -->
        <div class="mb-4">
            <label for="nomor_kamar" class="block font-medium text-gray-700 mb-1">Nomor Kamar</label>
            <select name="nomor_kamar" id="nomor_kamar"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
                <option value="">-- Pilih Nomor Kamar --</option>
                @foreach ($kamars as $kamar)
                    <option value="{{ $kamar->nama_kamar }}"
                        {{ old('nomor_kamar', $pembayaran->nomor_kamar ?? '') == $kamar->nama_kamar ? 'selected' : '' }}>
                        {{ $kamar->nama_kamar }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Bayar -->
        <div class="mb-4">
            <label for="tanggal_bayar" class="block font-medium text-gray-700 mb-1">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_bayar" id="tanggal_bayar"
                value="{{ old('tanggal_bayar', isset($pembayaran) ? $pembayaran->tanggal_bayar : '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
        </div>

        <!-- Jatuh Tempo -->
        <div class="mb-4">
            <label for="jatuh_tempo" class="block font-medium text-gray-700 mb-1">Jatuh Tempo</label>
            <input type="date" name="jatuh_tempo" id="jatuh_tempo"
                value="{{ old('jatuh_tempo', isset($pembayaran) ? $pembayaran->jatuh_tempo : '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Jumlah -->
        <div class="mb-4">
            <label for="jumlah" class="block font-medium text-gray-700 mb-1">Jumlah Pembayaran</label>
            <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan jumlah (Rp)" min="0"
                value="{{ old('jumlah', $pembayaran->jumlah ?? '') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block font-medium text-gray-700 mb-1">Status Pembayaran</label>
            <select name="status" id="status"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                required>
                <option value="">-- Pilih Status --</option>
                <option value="lunas" {{ old('status', $pembayaran->status ?? '') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                <option value="belum lunas" {{ old('status', $pembayaran->status ?? '') == 'belum lunas' ? 'selected' : '' }}>Belum Lunas</option>
            </select>
        </div>

        <!-- Tombol Simpan -->
        <div>
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
