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
        Schema::connection('mongodb')->create('status_acc', function (Blueprint $collection) {
            $collection->objectId('_id');
            $collection->string('judul');
            $collection->string('nama');
            $collection->string('nim');
            $collection->string('jurusan');
            $collection->string('keterangan');
            $collection->string('perespon');
            $collection->string('status');
            $collection->timestamps();

            $collection->index('judul');
            $collection->index('nama');
            $collection->index('nim');
            $collection->index('jurusan');
            $collection->index('keterangan');
            $collection->index('perespon');
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
        Schema::connection('mongodb')->dropIfExists('status_acc');
    }
};
