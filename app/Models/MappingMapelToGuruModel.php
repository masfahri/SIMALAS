<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(GuruModel::class, 'kd_guru', 'kd_guru');
    }

    public function MataPelajaran()
    {
        return $this->hasOne(MataPelajaranModel::class, 'kd_mapel', 'kd_mapel');
    }
}
