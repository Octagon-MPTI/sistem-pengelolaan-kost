<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenyewaController extends Controller
{
    public function index()
    {
        $penyewas = Penyewa::with('kamar')->get();
        $kamars = Kamar::where('status', 'tersedia')->get();
        return view('penyewa.index', compact('penyewas', 'kamars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'nik' => 'required|string|max:16',
            'foto_ktp' => 'required|image|max:2048',
            'kamar_id' => 'nullable|exists:kamars,id'
        ]);

        $path = $request->file('foto_ktp')->store('ktp', 'public');

        $penyewa = Penyewa::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'foto_ktp' => $path,
            'kamar_id' => $request->kamar_id,
            'status' => 'aktif',
        ]);

        // Jika kamar diisi, ubah status kamar menjadi "terisi"
        if ($request->kamar_id) {
            Kamar::where('id', $request->kamar_id)->update(['status' => 'terisi']);
        }

        return redirect()->route('penyewa.index')->with('success', 'Penyewa berhasil ditambahkan.');
    }

    public function edit(Penyewa $penyewa)
    {
        $kamars = Kamar::all();
        return view('penyewa.create', compact('penyewa', 'kamars'));
    }

    public function update(Request $request, Penyewa $penyewa)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'nik' => 'required',
            'kamar_id' => 'nullable|exists:kamars,id',
            'status' => 'required|in:aktif,keluar'
        ]);

        $penyewa->update($request->all());
        if ($request->kamar_id) {
            Kamar::where('id', $request->kamar_id)->update(['status' => $request->status === 'keluar' ? 'tersedia' : 'terisi']);
        }

        return redirect()->route('penyewa.index')->with('success', 'Data penyewa diperbarui.');
    }

    public function destroy(Penyewa $penyewa)
    {
        if ($penyewa->foto_ktp) {
            Storage::disk('public')->delete($penyewa->foto_ktp);
        }
        $penyewa->delete();
        $penyewa->kamar->update(['status' => 'tersedia']);
        return redirect()->route('penyewa.index')->with('success', 'Penyewa dihapus.');
    }
}
