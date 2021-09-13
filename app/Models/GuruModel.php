<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;

    protected $table = 'Guru';

    protected $fillable = [
        'kd_guru',
        'nip',
        'user_id',
        'email',
        'nomor_telf',
        'jenis_kelamin',
        'flag',
        'tempat_lahir',
        'tanggal_lahir',
        'nomor_telf',
        'pas_foto',
        'agama',
        'status_nikah',
        'nama_ibu',
        'nama_ayah',
        'status_kepegawaian',
        'jenis_ptk',
        'lembaga_sertifikasi',
        'no_sk',
        'tgl_sk',
        'nuptk',
        'tmt_tugas',
        'tugas_tambahan',
        'created_by'
    ];

    public function GuruToUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function GuruExport()
    {
        return $this->join('users', 'guru.user_id', '=', 'users.id')->get();
    }

    public function MataPelajaran()
    {
        return $this->hasMany(MappingMapelToGuruModel::class, 'kd_guru', 'kd_guru');
    }

    public function MappingMataPelajaran($where)
    {
        return $this->leftJoin('mapping_mapel_to_guru', 'guru.kd_guru', '=', 'mapping_mapel_to_guru.kd_guru')
        ->where(array('mapping_mapel_to_guru.kd_guru' => 'null'))->get();
    }

    public function MappingKelasJurusan()
    {
        return $this->leftJoin('kelas_sub_jurusan', 'guru.kd_guru', '=', 'kelas_sub_jurusan.kd_guru')
        ->where('kelas_sub_jurusan.kd_guru')->get();
    }
}
