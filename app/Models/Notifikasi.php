<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    protected $table = 'notifikasi';

    protected $primaryKey = 'ID_NOTIFIKASI';

    protected $fillable = [
        'ID_PROYEK',
        'JUDUL',
        'DESKRIPSI',
        'TANGGAL_MULAI',
        'PRIORITAS'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'ID_PROYEK');
    }
}
