<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    protected $table = 'notifikasi'; // Nama tabel di database

    // Tentukan kolom yang menjadi primary key
    protected $primaryKey = 'ID_NOTIFIKASI'; // Sesuaikan dengan nama kolom primary key Anda

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'ID_PROYEK',
        'JUDUL',
        'DESKRIPSI',
        'TANGGAL',
        'PRIORITAS'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'ID_PROYEK');
    }
}
