<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'nilai';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'subject',
        'score',
    ];

    // Relasi ke tabel Users (many-to-one)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}


