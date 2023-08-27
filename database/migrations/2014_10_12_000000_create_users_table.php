<?php

use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
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
        Schema::connection('mongodb')->create('users', function(Blueprint $collection) { 
            $collection->objectId('_id');
            $collection->string('nama_lengkap');
            $collection->string('nim');
            $collection->string('jurusan');
            $collection->string('tingkatan');
            $collection->integer('angkatan');
            $collection->integer('status');
            $collection->integer('user_status');
            $collection->integer('nomor_hp');
            $collection->string('jenis_kelamin');
            $collection->binary('image');

            $collection->string('nip');
            $collection->string('jabatan');
            $collection->string('penanggung_jawab_jurusan');

            $collection->string('email')->unique();
            $collection->timestamp('email_verified_at')->nullable();
            $collection->string('password');
            $collection->rememberToken();
            $collection->timestamps();

            $collection->index('name');
            $collection->index('nim');
            $collection->index('jurusan');
            $collection->index('tingkatan');
            $collection->index('angkatan');
            $collection->index('status');
            $collection->index('user_status');
            $collection->index('nip');
            $collection->index('jabatan');
            $collection->index('penanggung_jawab_jurusan');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('users');
        // Schema::dropIfExists('users');
    }
};
