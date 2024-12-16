<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\nilai;
use App\Models\Soal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Data yang sudah ada
        $scores = nilai::where('user_id', Auth::id())->select('score', 'user_id', 'subject')->get();
        $soals = Soal::where('guru_id', Auth::id())->with('kategori_soal', 'jawabans')->get();
        $groupedSoals = $soals->groupBy(function($soal) {
            return $soal->kategori_soal->nama_kategori;
        });

        return view('guru.dashboard', compact('scores', 'groupedSoals'));
    }

    public function exportPDF()
    {
        // Mengambil data yang ingin diekspor
        $scores = nilai::where('user_id', Auth::id())->select('score', 'user_id', 'subject')->get();
        $soals = Soal::where('guru_id', Auth::id())->with('kategori_soal', 'jawabans')->get();
        $groupedSoals = $soals->groupBy(function($soal) {
            return $soal->kategori_soal->nama_kategori;
        });

        // Memuat view dan mengonversinya menjadi PDF
        $pdf = Pdf::loadView('dashboard-pdf', compact('scores', 'groupedSoals'));

        // Mengunduh PDF
        return $pdf->download('dashboard.pdf');
    }
}
