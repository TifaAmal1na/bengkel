<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'proyek'; // Nama tabel dalam huruf kecil (konvensi Laravel)

    // Tentukan nama kolom yang menjadi primary key
    protected $primaryKey = 'ID_PROYEK'; // Sesuaikan dengan huruf besar

    public $timestamps = false;

    // Definisikan kolom yang bisa diisi massal
    protected $fillable = [
        'NAMA',           
        'STATUS',
        'JUMLAH_PEKERJA',
        'TANGGAL_MULAI',
    ];

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'ID_PROYEK');
    }

    // Relasi dengan model Notifikasi (one-to-many)
    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'ID_PROYEK');
    }
}