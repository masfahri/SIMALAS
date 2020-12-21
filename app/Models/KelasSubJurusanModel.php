<?php

namespace App\Models;

use App\Models\GuruModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelasSubJurusanModel extends Model
{
    use HasFactory;

    protected $table = 'kelas_sub_jurusan';
    protected $fillable = [
        'kd_kelas',
        'kd_sub_kelas',
        'kd_jurusan',
        'kd_guru'
    ];

    public function Kelas()
    {
        return $this->hasOne(KelasModel::class, 'kd_kelas');
    }

    public function SubKelas()
    {
        return $this->hasOne(SubKelasModel::class, 'kd_sub_kelas');
    }

    public function Guru()
    {
        return $this->hasOne(GuruModel::class, 'kd_guru');
    }

    public function Jurusan()
    {
        return $this->hasOne(JurusanModel::class, 'kd_jurusan');
    }
}
