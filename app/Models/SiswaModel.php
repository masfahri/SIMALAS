<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'user_id',
        'kd_siswa',
        'nis',
        'nisn',
        'jenis_kelamin',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_telf',
        'pas_foto',
        'nama_ayah',
        'nama_ibu',
    ];

    public function SiswaToUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
