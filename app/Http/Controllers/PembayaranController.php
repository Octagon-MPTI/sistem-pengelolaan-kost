<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewa;
use Illuminate\Http\Request;


class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('penyewa')->latest()->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $penyewas = Penyewa::where('status', 'aktif')->get();
        return view('pembayaran.create', compact('penyewas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyewa_id' => 'required|exists:penyewas,id',
            'tanggal_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required|in:lunas,belum lunas'
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil disimpan.');
    }

    public function edit(Pembayaran $pembayaran)
    {
        $penyewas = Penyewa::all();
        return view('pembayaran.edit', compact('pembayaran', 'penyewas'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'tanggal_bayar' => 'required|date',
            'jumlah' => 'required|numeric',
            'status' => 'required|in:lunas,belum lunas'
        ]);

        $pembayaran->update($request->all());
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
