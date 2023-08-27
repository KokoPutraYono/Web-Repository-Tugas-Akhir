<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Story_ACC extends Model
{
    use HasFactory;

    protected $collection = 'status_acc';

    protected $fillable = [
        '_id',
        'judul',
        'nama',
        'nim',
        'jurusan',
        'keterangan',
        'perespon',
        'status',
    ];
}
