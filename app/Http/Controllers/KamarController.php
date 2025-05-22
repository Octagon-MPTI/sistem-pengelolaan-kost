<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('kamar.create');
    }

    public function store(Request $request)
    {
        Kamar::create([
            'nama_kamar' => $request->nama_kamar,
            'status' => $request->status ?? 'tersedia',
            'fasilitas' => $request->fasilitas, // Laravel otomatis cast ke json jika di-cast di model
        ]);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit(Kamar $kamar)
    {
        return view('kamar.create', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $kamar->update([
            'nama_kamar' => $request->nama_kamar,
            'status' => $request->status,
            'fasilitas' => $request->fasilitas,
        ]);

        return redirect()->route('kamar.index')->with('success', 'Kamar diperbarui.');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('kamar.index')->with('success', 'Kamar dihapus.');
    }
}
