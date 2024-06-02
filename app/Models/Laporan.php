<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rapat()  {
        return $this->belongsTo(Rapat::class , 'id_rapat' , 'id');
    }
}
