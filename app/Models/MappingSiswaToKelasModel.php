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
        'kd_kelas',
    ];

    public function Siswa()
    {
        return $this->belongsTo(SiswaModel::class, 'kd_siswa', 'kd_siswa');
    }

    public function Kelas()
    {
        return $this->hasOne(KelasModel::class, 'kd_kelas', 'kd_kelas');
    }
}
