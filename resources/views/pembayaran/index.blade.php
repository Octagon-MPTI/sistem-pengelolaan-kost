@extends('layouts.app')

@section('content')
<div class="p-4">
  <h1 class="text-xl font-bold mb-4">Riwayat Pembayaran</h1>
  
  <table class="w-full table-auto border mt-4">
    <thead class="bg-gray-100 dark:bg-gray-500">
      <tr>
        <th class="border px-4 py-2">Nama Penyewa</th>
        <th class="border px-4 py-2">Nomor Kamar</th>
        <th class="border px-4 py-2">Jumlah</th>
        <th class="border px-4 py-2">Tanggal</th>
        <th class="border px-4 py-2">Status</th>
        <th class="border px-4 py-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($pembayarans as $pembayaran)
      <tr class="border-t hover:bg-gray-50">
        <td class="border px-4 py-2">{{ $pembayaran->penyewa->nama }}</td>
        <td class="border px-4 py-2">{{ $pembayaran->penyewa->kamar->nomor_kamar ?? '-' }}</td>
        <td class="border px-4 py-2">Rp {{ number_format($pembayaran->jumlah, 0, ',', '.') }}</td>
        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($pembayaran->tanggal)->format('d M Y') }}</td>
        <td class="border px-4 py-2">
          @if($pembayaran->status == 'lunas')
            <span class="text-green-600 font-semibold">Lunas</span>
          @else
            <span class="text-red-600 font-semibold">Belum Lunas</span>
          @endif
        </td>
        <td class="border px-4 py-2">
          <a href="{{ route('pembayaran.edit', $pembayaran) }}" class="text-blue-500 hover:underline">Edit</a>
          <form action="{{ route('pembayaran.destroy', $pembayaran) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline ml-2">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="text-center py-4">Belum ada data pembayaran.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
