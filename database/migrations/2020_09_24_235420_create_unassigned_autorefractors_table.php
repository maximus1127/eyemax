<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnassignedAutorefractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unassigned_autorefractors', function (Blueprint $table) {
            $table->id();
            $table->string('ar01')->nullable(); //pd
            $table->string('ar02')->nullable(); // sphere od
            $table->string('ar03')->nullable(); // cyl od
            $table->string('ar04')->nullable(); // axis od
            $table->string('ar05')->nullable(); // sphere os
            $table->string('ar06')->nullable(); // cyl os
            $table->string('ar07')->nullable(); // axis os
            $table->string('ar08')->nullable(); // k1 od (flat)
            $table->string('ar09')->nullable(); // k1 axis od
            $table->string('ar10')->nullable(); // k1 os (flat)
            $table->string('ar11')->nullable(); // k1 axis os
            $table->string('ar12')->nullable(); // k2 od (steep)
            $table->string('ar13')->nullable(); // k2 axis od
            $table->string('ar14')->nullable(); // k2 os (steep)
            $table->string('ar15')->nullable(); // k2 axis os
            $table->string('la01')->nullable(); // sphere OD
            $table->string('la02')->nullable(); // cyl od
            $table->string('la03')->nullable(); // axis od
            $table->string('la04')->nullable(); // add od
            $table->string('la05')->nullable(); // sphere os
            $table->string('la06')->nullable(); // cyl os
            $table->string('la07')->nullable(); // axis os
            $table->string('la08')->nullable(); // add os
            $table->string('complete')->default(0); //completed
            $table->bigInteger('store_location_id')->unsigned(); //store location
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
        Schema::dropIfExists('unassigned_autorefractors');
    }
}
