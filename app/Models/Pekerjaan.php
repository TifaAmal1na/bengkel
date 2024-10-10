<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan'; // Nama tabel di database
    protected $primaryKey = 'ID_PEKERJAAN'; // Primary key

    public $timestamps = false;

    protected $fillable = [
        'ID_GRAFIK',
        'ID_PROYEK',
        'NAMA',
        'STATUS',
        'KATEGORI',
        'TANGGAL',
        'TANGGAL_SELESAI',
        'JUMLAH'
    ];

    // Relasi ke tabel proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'ID_PROYEK');
    }


    public function grafik(){
        return $this->belongsTo(Workload::class, 'ID_GRAFIK');
    }

    public function revisi(){
        return $this->hasMany(Revisi::class, 'ID_REVISI');
    }

}
