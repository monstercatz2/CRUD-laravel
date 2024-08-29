<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $fillable = ['karyawan_uuid', 'amanah', 'kompeten', 'adaptif', 'loyal', 'harmonis', 'rata'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
