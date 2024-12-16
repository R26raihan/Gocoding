<?php
// app/Http/Controllers/KategoriSoalController.php

namespace App\Http\Controllers;

use App\Models\nilai;  // Model untuk tabel nilai
use App\Models\kategori_soal;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        // Mengambil data kategori soal
        $kategoriSoals = Kategori_Soal::all();

        // Mengambil data skor pengguna (pastikan user_id yang sesuai)
        $scores = nilai::where('user_id', Auth::id())->get();

        // Kirim data kategori soal dan skor ke view
        return view('kategori_soal', compact('kategoriSoals', 'scores'));
    }
}
