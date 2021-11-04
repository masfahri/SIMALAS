<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /**
     * Get all of the Gurus for the MataPelajaranModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Gurus(): HasMany
    {
        return $this->hasMany(MappingMapelToGuruModel::class, 'kd_mapel', 'kd_mapel');
    }
}
