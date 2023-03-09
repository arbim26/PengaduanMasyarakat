<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
