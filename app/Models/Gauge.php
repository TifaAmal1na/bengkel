<?php
// Workload.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workload extends Model
{
    protected $table = 'workload_analysis'; // Link the correct table
    public $timestamps = false; // If no created_at and updated_at columns exist
    protected $primaryKey = 'ID_GRAFIK';
}

// Pekerjaan.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan'; // Link the correct table
    public $timestamps = false; // If no created_at and updated_at columns exist
    protected $primaryKey = 'ID_PEKERJAAN';
}
