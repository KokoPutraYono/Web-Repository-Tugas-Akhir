<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Pengaturan_TA extends Model
{
    use HasFactory;

    protected $collection = 'pengaturan_TA';

    protected $fillable = [
        'bab1',
        'bab2',
        'bab3',
        'bab4',
        'bab5',
        'file_program',
        'link_video'
    ];
}
