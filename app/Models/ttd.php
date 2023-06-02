<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ttd extends Model
{
    protected $table = 'ttds';
    protected $primaryKey = 'id_ttd';

    public function surat()
    {
        return $this->belongsTo(surat::class);
    }
    use HasFactory;
}
