<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Kamar;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('penyewa.kamar')->latest()->get(); // Include kamar juga
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $penyewas = Penyewa::all();
        $kamars = Kamar::all();
        return view('pembayaran.create', compact('penyewas', 'kamars'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'penyewa_id'     => 'required|exists:penyewas,id',
            'tanggal_bayar'  => 'required|date',
            'jumlah'         => 'required|numeric',
            'status'         => 'required|in:lunas,belum lunas',
            'nomor_kamar'    => 'required|string',
        ]);
    
        $jatuhTempo = Carbon::parse($request->tanggal_bayar)->addMonth();
    
        Pembayaran::create([
            'penyewa_id'     => $request->penyewa_id,
            'tanggal_bayar'  => $request->tanggal_bayar,
            'jatuh_tempo'    => $jatuhTempo,
            'jumlah'         => $request->jumlah,
            'status'         => $request->status,
            'nomor_kamar'    => $request->nomor_kamar,
        ]);
    
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil disimpan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $penyewas = Penyewa::all();
        $kamars = Kamar::all();
        return view('pembayaran.create', compact('pembayaran', 'penyewas', 'kamars'));
    }
    

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'nomor_kamar' => 'required|string',
            'tanggal_bayar' => 'required|date',
            'jatuh_tempo'   => 'nullable|date',
            'jumlah'        => 'required|numeric',
            'status'        => 'required|in:lunas,belum lunas'
        ]);

        $jatuhTempo = $request->jatuh_tempo
            ? Carbon::parse($request->jatuh_tempo)
            : Carbon::parse($request->tanggal_bayar)->addMonth();

        $pembayaran->update([
            'nomor_kamar'    => $request->nomor_kamar,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jatuh_tempo'   => $jatuhTempo,
            'jumlah'        => $request->jumlah,
            'status'        => $request->status,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran diperbarui.');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran dihapus.');
    }

    // public function export()
    // {
    //     return Excel::download(new TransaksiExport, 'transaksi.xlsx');
    // }
}
