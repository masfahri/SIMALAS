<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = [
        'kd_kelas',
        'name'
    ];

    public function KelasSubJurusan()
    {
        return $this->hasMany(KelasSubJurusanModel::class, 'kd_kelas', 'kd_kelas');
    }

    

}
