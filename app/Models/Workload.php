<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workload extends Model
{
    use HasFactory;

    protected $table = 'workload_analysis';
    protected $primaryKey = 'ID_GRAFIK';
    protected $fillable = [
        'STANDARD',
        'TANGGAL',
        'JUMLAH_PEKERJAAN',
    ];

    // Relasi dengan model Proyek (one-to-many)
    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'ID_PROYEK');
    }

    // Relasi dengan model Tools (many-to-many)
    public function tools()
    {
        return $this->belongsToMany(Tools::class, 'menggunakan', 'ID_GRAFIK', 'ID_TOOLS');
    }

    public function pekerjaan(){
        return $this->hasMany(Pekerjaan::class, 'ID_PEKERJAAN');
    }
}