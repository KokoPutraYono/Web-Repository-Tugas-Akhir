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
        Schema::connection('mongodb')->create('notifications', function(Blueprint $collection) { 
            $collection->objectId('_id');
            $collection->string('title');
            $collection->string('message');
            $collection->string('jenis');
            $collection->string('perespon');
            $collection->string('status');
            $collection->string('user_id');
            $collection->string('is_read');
            $collection->timestamps();

            $collection->index('title');
            $collection->index('message');
            $collection->index('jenis');
            $collection->index('perespon');
            $collection->index('status');
            $collection->index('user_id');
            $collection->index('is_read');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('notifications');
    }
};