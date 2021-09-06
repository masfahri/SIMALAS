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
    
    /**
     * Get the Kelas associated with the MappingJadwalPelajaranModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Kelas()
    {
        return $this->hasOne(KelasSubJurusan::class, 'id', 'kd_kelas_sub_jur');
    }

}
