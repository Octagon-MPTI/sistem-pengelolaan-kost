@extends('layouts.app')
@section('content')
<div class="p-4">
  <h1 class="text-xl font-bold mb-4">Input Pembayaran</h1>
  <form method="POST" action="{{ route('pembayaran.store') }}">@csrf
    <select name="penyewa_id" class="input">
      @foreach($penyewas as $penyewa)
        <option value="{{ $penyewa->id }}">{{ $penyewa->nama }}</option>
      @endforeach
    </select>
    <input type="date" name="tanggal" class="input">
    <input type="number" name="jumlah" placeholder="Jumlah Pembayaran" class="input">
    <select name="status" class="input">
      <option value="lunas">Lunas</option>
      <option value="belum lunas">Belum Lunas</option>
    </select>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
  </form>
</div>
@endsection
