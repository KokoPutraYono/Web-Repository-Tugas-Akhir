<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongodb')->create('tugas_akhir', function(Blueprint $collection) { 
            $collection->objectId('_id');
            $collection->string('judul');
            $collection->string('abstrak');
            $collection->string('kata_kunci');
            $collection->string('dospem');
            $collection->string('penguji_1');
            $collection->string('penguji_2');
            $collection->string('kaprodi');
            $collection->string('nama');
            $collection->string('nim');
            $collection->string('kelas');
            $collection->integer('angkatan');
            $collection->string('tingkatan');
            $collection->string('jurusan');
            $collection->json('file_TA')->nullable();
            // untuk melihat status di acc atau di tolak
            $collection->string('status');
            $collection->string('user_id');
            $collection->timestamps();

            $collection->index('judul');
            $collection->index('abstrak');
            $collection->index('kata_kunci');
            $collection->index('nama');
            $collection->index('nim');
            $collection->index('kelas');
            $collection->index('jurusan');
            $collection->index('angkatan');
            $collection->index('dospem');
            $collection->index('penguji_1');
            $collection->index('penguji_2');
            $collection->index('kaprodi');
            // untuk melihat status di acc atau di tolak
            $collection->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('tugas_akhir');
    }
};
