<?php

namespace App\Models;

use App\Models\Standard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan'; // Nama tabel di database
    public $incrementing = false;
    protected $primaryKey = 'ID_PEKERJAAN'; // Primary key

    public $timestamps = false;

    protected $fillable = [
        'ID_GRAFIK',
        'ID_PROYEK',
        'NAMA',
        'STATUS',
        'KATEGORI',
        'TANGGAL', // Start date
        'date_end' // End date
    ];

    // Relasi ke tabel proyek
    public function proyek()
    {
        return $this->belongsTo(Proyek::class, 'ID_PROYEK');
    }
    public function grafik()
    {
        return $this->belongsTo(Standard::class, 'ID_GRAFIK', 'ID_GRAFIK');
    }

    public function revisi(){
        return $this->hasMany(Revisi::class, 'ID_REVISI');
    }

}
