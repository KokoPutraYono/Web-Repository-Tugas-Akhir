<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Nim extends Model
{
    use HasFactory;

    protected $collection = 'nim';

    protected $fillable = [
        '_id',
        'nim',
        'kelas',
        'angkatan',
        'tingkatan',
        'jurusan'
    ];
}
