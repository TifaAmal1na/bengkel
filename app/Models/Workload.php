<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workload extends Model
{
    use HasFactory;

    protected $table = 'workload_analysis';
    protected $primaryKey = 'id_grafik';
    protected $fillable = [
        'standard',
        'tanggal',
        'jumlah_pekerjaan',
    ];

    // Relasi dengan model Proyek (one-to-many)
    public function proyek()
    {
        return $this->hasMany(Proyek::class, 'id_proyek');
    }

    // Relasi dengan model Tools (many-to-many)
    public function tools()
    {
        return $this->belongsToMany(Tools::class, 'menggunakan', 'id_grafik', 'id_tools');
    }
}