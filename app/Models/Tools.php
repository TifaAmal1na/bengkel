<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tools extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'tools'; // Nama tabel di database

    // Tentukan kolom yang menjadi primary key
    protected $primaryKey = 'ID_TOOLS'; // Sesuaikan dengan nama kolom primary key Anda

    // Tentukan kolom yang bisa diisi massal
    protected $fillable = [
        'NAMA',
        'STATUS',
        'TANGGAL',
    ];

    public function pekerjaan()
    {
        return $this->belongsToMany(Pekerjaan::class, 'menggunakan', 'id_tools', 'id_pekerjaan');
    }
}
