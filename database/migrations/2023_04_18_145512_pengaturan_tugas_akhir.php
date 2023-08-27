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
        Schema::connection('mongodb')->create('pengaturan_TA', function(Blueprint $collection) { 
            $collection->objectId('_id');
            $collection->string('bab1');
            $collection->string('bab2');
            $collection->string('bab3');
            $collection->string('bab4');
            $collection->string('bab5');
            $collection->timestamps();

            $collection->index('bab1');
            $collection->index('bab2');
            $collection->index('bab3');
            $collection->index('bab4');
            $collection->index('bab5');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('pengaturan_TA');
    }
};
