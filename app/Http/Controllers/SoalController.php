<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\kategori_soal;
use App\Models\nilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SoalController extends Controller
{
    // Menampilkan dashboard guru
    public function index()
    {
        // Fetch all soal related to the logged-in guru and eager load related kategori_soal and jawabans
        $soals = Soal::where('guru_id', Auth::id())
                     ->with('kategori_soal', 'jawabans')  // Eager load related kategori_soal and jawabans
                     ->get();

        // Group soal by kategori_soal's name (kategori_soal.nama_kategori)
        $groupedSoals = $soals->groupBy(function($soal) {
            return $soal->kategori_soal->nama_kategori;
        });

        // Pass the grouped soal to the view
        return view('guru.dashboard', compact('groupedSoals'));
    }



    // Menampilkan form untuk menambahkan soal baru
    public function create()
    {
        $kategori_soal = kategori_soal::all(); // Ambil semua kategori soal
        return view('guru.createsoal', compact('kategori_soal'));
    }

    // Menyimpan soal baru
    public function store(Request $request)
    {
        $request->validate([
            'soal' => 'required|string',
            'kategori_id' => 'required|exists:kategori_soal,id', // Validasi kategori
            'jawaban.*.text' => 'required|string',
            'jawaban.*.is_correct' => 'required|boolean',
        ]);

        // Simpan soal dengan kategori
        $soal = Soal::create([
            'soal' => $request->soal,
            'guru_id' => Auth::id(),
            'kategori_id' => $request->kategori_id, // Tambahkan kategori_id
        ]);

        // Simpan jawaban
        foreach ($request->jawaban as $jawaban) {
            Jawaban::create([
                'soal_id' => $soal->id,
                'jawaban' => $jawaban['text'],
                'is_correct' => $jawaban['is_correct'],
            ]);
        }

        return redirect()->route('guru.dashboard')->with('success', 'Soal berhasil ditambahkan!');
    }

    // Menampilkan form edit soal
    public function edit($id)
    {
        $soal = Soal::with('jawabans')->findOrFail($id);

        if ($soal->guru_id != Auth::id()) {
            abort(403);
        }

        $kategori_soal = kategori_soal::all(); // Ambil semua kategori soal
        return view('guru.editsoal', compact('soal', 'kategori_soal'));
    }

    // Mengupdate soal dan jawaban
    public function update(Request $request, $id)
    {
        $request->validate([
            'soal' => 'required|string',
            'kategori_id' => 'required|exists:kategori_soal,id', // Validasi kategori
            'jawaban.*.id' => 'nullable|integer|exists:jawabans,id',
            'jawaban.*.text' => 'required|string',
            'jawaban.*.is_correct' => 'required|boolean',
        ]);

        $soal = Soal::findOrFail($id);

        if ($soal->guru_id != Auth::id()) {
            abort(403);
        }

        $soal->update([
            'soal' => $request->soal,
            'kategori_id' => $request->kategori_id, // Perbarui kategori_id
        ]);

        // Update atau tambahkan jawaban
        foreach ($request->jawaban as $jawabanData) {
            if (isset($jawabanData['id'])) {
                // Update jawaban yang ada
                $jawaban = Jawaban::findOrFail($jawabanData['id']);
                $jawaban->update([
                    'jawaban' => $jawabanData['text'],
                    'is_correct' => $jawabanData['is_correct'],
                ]);
            } else {
                // Tambahkan jawaban baru
                Jawaban::create([
                    'soal_id' => $soal->id,
                    'jawaban' => $jawabanData['text'],
                    'is_correct' => $jawabanData['is_correct'],
                ]);
            }
        }

        return redirect()->route('guru.dashboard')->with('success', 'Soal berhasil diperbarui!');
    }

    // Menghapus soal dan jawaban terkait
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);

        if ($soal->guru_id != Auth::id()) {
            abort(403);
        }

        // Hapus jawaban terkait
        $soal->jawabans()->delete();

        // Hapus soal
        $soal->delete();

        return redirect()->route('guru.dashboard')->with('success', 'Soal berhasil dihapus!');
    }
    public function showKategoriSoal()
    {
        // Ambil kategori soal dengan soal dan data guru terkait
        $kategoriSoals = Kategori_Soal::with(['soals.guru'])
            ->whereHas('soals') // Pastikan hanya kategori yang memiliki soal
            ->get();

        return view('kategori_soal', compact('kategoriSoals'));
    }
    public function lihatSoal($id)
{
    // Ambil kategori soal berdasarkan ID
    $kategori = Kategori_Soal::with('soals.jawabans', 'soals.guru')
        ->findOrFail($id);

    // Pastikan kategori memiliki soal
    if ($kategori->soals->isEmpty()) {
        return redirect()->route('siswa.kategoriSoal')->with('info', 'Belum ada soal untuk kategori ini.');
    }

    return view('lihat_soal', compact('kategori'));
}
public function latihanSoal($id)
{
    // Ambil kategori soal beserta soalnya
    $kategori = Kategori_Soal::with('soals.jawabans')->findOrFail($id);

    return view('latihan_soal', compact('kategori'));
}

public function submitLatihan(Request $request, $id)
{
    // Validasi input
    $validatedData = $request->validate([
        'jawaban' => 'required|array',
        'jawaban.*' => 'required|integer',
    ]);

    $kategori = Kategori_Soal::with('soals.jawabans')->findOrFail($id);

    $benar = 0;
    $total = count($kategori->soals);

    // Periksa jawaban
    foreach ($kategori->soals as $soal) {
        $jawabanBenar = $soal->jawabans->where('is_correct', true)->first();

        if (isset($validatedData['jawaban'][$soal->id]) &&
            $jawabanBenar &&
            $validatedData['jawaban'][$soal->id] == $jawabanBenar->id) {
            $benar++;
        }
    }

    // Hitung skor
    $skor = ($total > 0) ? round(($benar / $total) * 100, 2) : 0;

    // Simpan skor ke tabel nilai
    Nilai::create([
        'user_id' => Auth::id(), // Mendapatkan ID user yang sedang login
        'subject' => $kategori->nama_kategori, // Nama kategori soal
        'score' => $skor, // Skor yang dihitung
    ]);

    // Redirect ke halaman dengan hasil skor
    return redirect()->route('siswa.latihanSoal', $id)
                     ->with('result', ['benar' => $benar, 'total' => $total, 'skor' => $skor]);
}

public function dashboard()
{
    // Ambil data skor dari tabel 'nilai' yang terkait dengan user yang sedang login
    $scores = nilai::where('user_id', Auth::id())  // Ambil skor berdasarkan user_id
                   ->select('score', 'user_id', 'subject')
                   ->get();

    // Mengambil soal yang dikelompokkan berdasarkan kategori
    $soals = Soal::where('guru_id', Auth::id())
                 ->with('kategori_soal', 'jawabans')
                 ->get();

    // Kelompokkan soal berdasarkan kategori
    $groupedSoals = $soals->groupBy(function($soal) {
        return $soal->kategori_soal->nama_kategori;
    });

    // Kirimkan data ke view
    return view('guru.dashboard', compact('scores', 'groupedSoals'));
}

}
