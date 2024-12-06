<?php
namespace App\Http\Controllers;

use App\Models\Guru; // Pastikan Anda menggunakan model yang benar
use Illuminate\Http\Request;

class FormDataController extends Controller
{
    public function saveUserData(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:gurus,email',
            'asal_sekolah' => 'required|string|max:255',
            'jenjang_pendidikan' => 'required|string|max:255',
            'role' => 'required|in:gurus,siswa',
        ]);

        // Simpan data ke tabel 'gurus' (jika role adalah guru)
        if ($validated['role'] === 'gurus') {
            Guru::create([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'asal_sekolah' => $validated['asal_sekolah'],
                'jenjang_pendidikan' => $validated['jenjang_pendidikan'],
            ]);
        } else {
            // Simpan data ke tabel siswa jika diperlukan
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
