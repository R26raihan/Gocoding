<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = ['soal', 'guru_id', 'kategori_id'];

    /**
     * Relasi dengan model Jawaban.
     * Satu soal memiliki banyak jawaban.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }

    /**
     * Relasi dengan model KategoriSoal.
     * Setiap soal milik satu kategori.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori_soal()
    {
        return $this->belongsTo(kategori_soal::class, 'kategori_id');
    }
    public function guru()
{
    return $this->belongsTo(User::class, 'guru_id');
}

}
