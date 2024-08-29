<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'nama', 'divisi', 'uuid'];
    protected $table = 'karyawan';
    public $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'karyawan_uuid', 'uuid');
    }
}
