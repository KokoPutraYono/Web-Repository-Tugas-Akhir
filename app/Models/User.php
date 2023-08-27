<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '_id',
        'nama_lengkap',
        'nim',
        'email',
        'jenis_kelamin',
        'nomor_hp',
        'jurusan',
        'tingkatan',
        'angkatan',
        'status',
        'user_status',
        'image',
        'password',

        'nip',
        'jabatan',
        'penanggung_jawab_jurusan',
    ];

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = new \MongoDB\BSON\Binary($value, \MongoDB\BSON\Binary::TYPE_GENERIC);
    }

    // public function password_resets()
    // {
    //     return $this->hasMany(PasswordReset::class);
    // }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
