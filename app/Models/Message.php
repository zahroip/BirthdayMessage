<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'id_messages';


    protected $fillable = ['id_messages','id_user', 'email_guest', 'isi_pesan', 'lampiran', 'asal_kenalan', 'created_at', 'updated_at'];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class); // Assuming 'user_id' is the foreign key
    }

}
