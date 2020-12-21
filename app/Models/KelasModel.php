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

    public function SubKelas()
    {
        return $this->hasMany(SubKelas::class, 'kd_sub_kelas');
    }

    

}
