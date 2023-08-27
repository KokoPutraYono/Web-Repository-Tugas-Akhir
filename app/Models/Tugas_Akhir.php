<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Tugas_Akhir extends Model
{
    use HasFactory;

    protected $collection = 'tugas_akhir';

    protected $fillable = [
        'judul',
        'abstrak',
        'kata_kunci',
        'dospem',
        'penguji_1',
        'penguji_2',
        'kaprodi',
        'nama',
        'nim',
        'kelas',
        'angkatan',
        'tingkatan',
        'jurusan',
        'file_TA',
        'status',
        'user_id',
    ];
}
