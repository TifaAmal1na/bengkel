<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $table = 'standard'; // Table name
    protected $primaryKey = 'ID_GRAFIK';    // Primary key
    public $timestamps = false;  // Disable timestamps as they do not exist in the table
    protected $fillable = [
        'STANDARD',
        'TANGGAL_MULAI',
        'TANGGAL_SELESAI',
        'STATUS'
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

    public function getRouteKeyName()
{
    return 'ID_GRAFIK';
}


}