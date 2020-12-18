<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;

    protected $table = 'Guru';
    // /**
    //  * The attributes that aren't mass assignable.
    //  *
    //  * @var array
    //  */
    // protected $guarded = ['user_id'];
    protected $fillable = [
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
}
