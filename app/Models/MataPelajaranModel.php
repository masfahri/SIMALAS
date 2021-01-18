<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaranModel extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';
    protected $fillable = [
        'kd_mapel',
        'summon',
        'nama_mapel'
    ];

    public const VALIDATION_RULES = [
        'kd_mapel' => [
            'required',
            'unique:mata_pelajaran'
        ],
        'summon' => [
            'required',
            'unique:summon'
        ],
        'nama_mapel' => [
            'required',
        ],
    ];

    public const VALIDATION_MESSAGES = [
        'kd_mapel.required' => 'Kode Mapel Dibutuhkan',
        'kd_mapel.unique' => 'Kode Mapel Harus Unik',
        'summon.required' => 'Nama Kode Mapel Dibutuhkan',
        'summon.unique' => 'Nama Kode Mapel Harus Unik',
        'nama_mapel.required'    => 'Mapel Dibutuhkan',
    ];
}
