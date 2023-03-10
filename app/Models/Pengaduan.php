<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = "pengaduan";
    
    protected $fillable = [
        'tgl_pengaduan',
        'user_id',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapan(): HasOne
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan', 'id');
    }
}
?>