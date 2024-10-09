<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisi extends Model
{
    use HasFactory;

    protected $table = 'revisi_gambar'; // Nama tabel di database
    protected $primaryKey = 'ID_REVISI'; // Primary key

    public $timestamps = false;

    protected $fillable = [
        'ID_PEKERJAAN',
        'DESKRIPSI',
        'TANGGAL'
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'ID_PEKERJAAN');
    }
}
