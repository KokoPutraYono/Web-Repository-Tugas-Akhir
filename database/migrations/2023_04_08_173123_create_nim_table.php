<?php

use Illuminate\Database\Migrations\Migration;
use Jenssegers\Mongodb\Schema\Blueprint;
// use Illuminate\Database\Schema\Blueprint;
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
        Schema::connection('mongodb')->create('nim', function (Blueprint $collection) {
            $collection->objectId('_id');
            $collection->string('nim');
            $collection->string('kelas');
            $collection->integer('angkatan');
            $collection->string('tingkatan');
            $collection->string('jurusan');
            $collection->timestamps();

            $collection->index('nim');
            $collection->index('kelas');
            $collection->index('angkatan');
            $collection->index('tingkatan');
            $collection->index('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('nim');
    }
};
