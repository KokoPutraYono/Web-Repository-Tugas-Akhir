<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'notifications';
    
    protected $fillable = [
        'title',
        'message',
        'perespon',
        'jenis',
        'status',
        'user_id',
        'is_read',
    ];
}
