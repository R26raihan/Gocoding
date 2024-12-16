<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableTrait; // Import trait
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable; // Import interface

class Guru extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait; // Gunakan trait Authenticatable

    protected $fillable = ['nama', 'email', 'asal_sekolah', 'jenjang_pendidikan', 'role'];
}

