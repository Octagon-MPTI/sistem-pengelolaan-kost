<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKamar = Kamar::count();
        $kamarTerisi = Kamar::where('status', 'terisi')->count();
        $kamarTersedia = $totalKamar - $kamarTerisi;
        $penyewaAktif = Penyewa::where('status', 'aktif')->count();
        $totalPemasukan = Pembayaran::whereMonth('created_at', now()->month)->sum('jumlah');

        return view('dashboard.index', compact('totalKamar', 'kamarTerisi', 'kamarTersedia', 'penyewaAktif', 'totalPemasukan'));
    }

    public function riwayatBayar()
    {

        $user = Auth::user(); // atau: $user = auth()->user();

        // Jika hanya butuh nama:
        $nama = $user->name;

        return view('riwayat-bayar.index', compact('nama'));
    }
}
