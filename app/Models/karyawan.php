<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['nip','nama','divisi'];
    protected $table = 'karyawan';
    public $timestamps = false;
}