<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MappingMapelToGuruModel extends Model
{
    use HasFactory;

    protected $table = 'mapping_mapel_to_guru';
    protected $fillable = [
        'kd_guru',
        'kd_mapel',
        'kd_mapping_mapel_to_guru'
    ];

    public function Guru()
    {
        return $this->hasOne(GuruModel::class, 'kd_guru', 'kd_guru');
    }

    public function Gurus()
    {
        return $this->hasMany(GuruModel::class, 'kd_guru', 'kd_guru');
    }

    public function MataPelajaran()
    {
        return $this->hasOne(MataPelajaranModel::class, 'kd_mapel', 'kd_mapel');
    }

    /**
     * Get all of the Jadwal for the MappingMapelToGuruModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Jadwal(): HasMany
    {
        return $this->hasMany(MappingJadwalPelajaranModel::class, 'kd_mapels', 'kd_mapping_mapel_to_guru');
    }
}
