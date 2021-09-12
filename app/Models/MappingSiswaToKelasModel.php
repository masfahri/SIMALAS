<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MappingSiswaToKelasModel extends Model
{
    use HasFactory;

    protected $table = 'mapping_siswa_to_kelas';
    protected $fillable = [
        'kd_mapping_siswa_to_kelas',
        'kd_siswa',
        'kelas_sub_jurusan_id',
    ];

    public function Siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'kd_siswa', 'kd_siswa');
    }

    public function Kelas()
    {
        return $this->hasOne(KelasSubJurusanModel::class, 'id', 'kelas_sub_jurusan_id');
    }
}
