<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Guest extends Model
{
    use HasFactory;

    protected $primaryKey = 'email'; // Email sebagai primary key
    public $incrementing = false; // Non-auto increment
    protected $keyType = 'string'; // Primary key tipe string

    protected $fillable = ['email', 'nama'];

    public function messages()
    {
        return $this->hasMany(Message::class, 'email_guest', 'email'); // Relasi one-to-many ke tabel messages
    }
}
