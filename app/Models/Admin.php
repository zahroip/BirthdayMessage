<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';

    // Kolom yang bisa diisi
    protected $fillable = ['email', 'password'];

    // Hidden attributes (jangan pernah mengirim password dalam response)
    protected $hidden = ['password'];
}
