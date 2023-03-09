<?php

namespace App\Models;

use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = "tanggapan";
    
    protected $fillable = [
        'id_pengaduan',
        'id_admin',
        'tgl_tanggapan',
        'tanggapan',
    ];

}
