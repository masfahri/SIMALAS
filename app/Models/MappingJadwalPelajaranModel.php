<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingJadwalPelajaranModel extends Model
{
    use HasFactory;

    protected $table = 'mapping_jadwal_pelajaran';
    protected $fillable = [
        'kd_mapping_jadwal_pelajaran',
        'hari',
        'kd_mapels',
        'kd_kelas_sub_jur'
    ];

    public function exists($kd_kelas_sub_jur, $hari)
    {
        return $this->where(array('kd_kelas_sub_jur' => $kd_kelas_sub_jur, 'hari' => $hari))->get();
    }

    /**
     * Get the Kelas associated with the MappingJadwalPelajaranModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Kelas()
    {
        return $this->hasOne(KelasSubJurusanModel::class, 'id', 'kd_kelas_sub_jur');
    }

    /**
     * Get all of the Mapels for the MappingJadwalPelajaranModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Mapel()
    {
        return $this->hasOne(MappingMapelToGuruModel::class, 'kd_mapping_mapel_to_guru', 'kd_mapels');
    }

}
