<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek'; // Nama tabel
    protected $primaryKey = 'ID_PROYEK'; // Primary key
    public $timestamps = false;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'NAMA',
        'STATUS',
        'JUMLAH_PEKERJA',
        'TANGGAL_MULAI',
    ];

    const STATUS_AKTIF = 'aktif';
    const STATUS_MENUNGGU = 'menunggu';
    const STATUS_DALAM_PROSES = 'dalam proses';
    const STATUS_SELESAI = 'selesai';
    const STATUS_KUNING = 'kuning'; // Status baru

    public function pekerjaan()
    {
        return $this->hasMany(Pekerjaan::class, 'ID_PROYEK');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'ID_PROYEK');
    }

    // Method untuk mendapatkan status dalam enum
    public static function getStatusOptions()
    {
        return [
            self::STATUS_AKTIF,
            self::STATUS_MENUNGGU,
            self::STATUS_DALAM_PROSES,
            self::STATUS_SELESAI,
        ];
    }
}