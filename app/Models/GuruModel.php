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
        'user_id',
        'nip',
        'flag',
        'pas_foto',
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
