<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\Model;

class file extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'files';

    protected $fillable = [
        'user_id',
        'nama',
        'file_TA',
    ];
}
