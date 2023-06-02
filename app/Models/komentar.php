<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    protected $table = 'komentars';
    protected $primaryKey = 'id_komentar';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function surat()
    {
        return $this->belongsTo(surat::class);
    }
}
