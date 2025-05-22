<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Pembayaran;
use App\Models\Penyewa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    $totalKamar = Kamar::count();
    $kamarTerisi = Kamar::where('status', 'terisi')->count();
    $kamarTersedia = $totalKamar - $kamarTerisi;
    $penyewaAktif = Penyewa::where('status', 'aktif')->count();
    $totalPemasukan = Pembayaran::whereMonth('created_at', now()->month)->sum('jumlah');

    return view('dashboard.index', compact('totalKamar', 'kamarTerisi', 'kamarTersedia', 'penyewaAktif', 'totalPemasukan'));
}
}
