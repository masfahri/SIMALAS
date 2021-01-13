<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    public const VALIDATION_RULES = [
        'email' => [
            'required',
            'unique:users'
        ]
    ];
    
    public const VALIDATION_MESSAGES = [
        'email.required' => 'Email Dibutuhkan',
        'email.unique:users' => 'Email Sudah Digunakan'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function Guru()
    {
        return $this->belongsTo(GuruModel::class, 'user_id', 'id');
    }

    public function Siswa()
    {
        return $this->hasOne(SiswaModel::class, 'user_id', 'id');
    }
}
