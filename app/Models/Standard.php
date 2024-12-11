<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $table = 'standard'; // Nama tabel
    protected $primaryKey = 'ID_GRAFIK'; // Primary key adalah ID_GRAFIK
    public $timestamps = false; // Tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'STANDARD',
        'TANGGAL_MULAI',
        'TANGGAL_SELESAI',
        'STATUS'
    ];

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'ID_GRAFIK', 'ID_GRAFIK');
    }

    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'ID_PROYEK');
    }

    public function tools()
    {
        return $this->belongsToMany(Tools::class, 'menggunakan', 'ID_GRAFIK', 'ID_TOOLS');
    }

    public function getRouteKeyName()
    {
        return 'ID_GRAFIK'; // Gunakan ID_GRAFIK untuk routing
    }
}
