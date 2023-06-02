<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat extends Model
{
    protected $table = 'surats';
    protected $primaryKey = 'id_surat';
    use HasFactory;

    public function template()
    {
        return $this->belongsTo(template::class);
    }
}
