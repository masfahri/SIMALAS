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

    public const VALIDATION_RULES = [
        'nis' => [
            'required',
            'unique:siswa'
        ],
        'nisn' => [
            'required',
            'unique:siswa'
        ],
        'tanggal_lahir' => [
            'required',
            'date'
        ],
        'jenis_kelamin' => [
            'required'
        ],
        'agama' => [
            'required',
        ],
        'tempat_lahir' => [
            'required'
        ],
        'tanggal_lahir' => [
            'required',
            'date'
        ],
        'nomor_telf' => [
            'required'
        ],
        'nama_ayah' => [
            'required'
        ],
        'nama_ibu' => [
            'required'
        ]
    ];

    public const VALIDATION_MESSAGES = [
        'nis.required' => 'Nis Dibutuhkan',
        'nis.unique:siswa' => 'Nis Sudah Digunakan',
        'nisn.required' => 'NISN Dibutuhkan',
        'nisn.unique:siswa' => 'NISN Dibutuhkan',
        'jenis_kelamin.required' => 'Jenis Kelamin Dibutuhkan',
        'tempat_lahir.required' => 'Tempat Lahir Dibutuhkan',
        'tanggal_lahir.required' => 'Tanggal Lahir Dibutuhkan',
        'tanggal_lahir.date'     => 'Tanggal Lahir Hanya Tanggal',
        'nomor_telf.required' => 'Nomor Telf Dibutuhkan',
        'nama_ayah.required' => 'Nama Ayah Dibutuhkan',
        'nama_ibu.required' => 'Nama Ibu Dibutuhkan'
    ];

    public function SiswaToUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
