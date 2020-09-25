<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnassignedLensometersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unassigned_lensometers', function (Blueprint $table) {
            $table->id();
            $table->string('la01')->nullable(); // sphere OD
            $table->string('la02')->nullable(); // cyl od
            $table->string('la03')->nullable(); // axis od
            $table->string('la04')->nullable(); // add od
            $table->string('la05')->nullable(); // sphere os
            $table->string('la06')->nullable(); // cyl os
            $table->string('la07')->nullable(); // axis os
            $table->string('la08')->nullable(); // add os
            $table->string('complete')->default(0);
            $table->bigInteger('store_location_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unassigned_lensometers');
    }
}
