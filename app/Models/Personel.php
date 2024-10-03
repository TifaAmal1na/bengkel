<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'personel';

    // Primary key
    protected $primaryKey = 'ID_PERSONEL';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'NAMA',
        'STATUS',
        'JUMLAH_PEKERJA'
    ];

    // Jika ada timestamp seperti created_at atau updated_at
    public $timestamps = false;

    /**
     * Relasi dengan tabel PEKERJAAN melalui tabel DIKERJAKAN.
     */
    public function pekerjaan()
    {
        return $this->belongsToMany(Pekerjaan::class, 'dikerjakan', 'ID_PERSONEL', 'ID_PEKERJAAN');
    }
}