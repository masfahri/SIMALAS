<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKelasModel extends Model
{
    use HasFactory;

    protected $table = 'sub_kelas';
    protected $fillable = [
        'kd_sub_kelas',
        'name'
    ];
}
