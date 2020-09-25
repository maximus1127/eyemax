<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encounters', function (Blueprint $table) {
            $table->id();
            $table->string('ar01'); //pd
            //presenting spec rx
            $table->string('la01')->nullable(); // sphere OD
            $table->string('la02')->nullable(); // cyl od
            $table->string('la03')->nullable(); // axis od
            $table->string('la04')->nullable(); // add od
            $table->string('la05')->nullable(); // sphere os
            $table->string('la06')->nullable(); // cyl os
            $table->string('la07')->nullable(); // axis os
            $table->string('la08')->nullable(); // add os
            //end spec rx
            //autoref
            $table->string('ar02')->nullable(); // sphere od
            $table->string('ar03')->nullable(); // cyl od
            $table->string('ar04')->nullable(); // axis od
            $table->string('ar05')->nullable(); // sphere os
            $table->string('ar06')->nullable(); // cyl os
            $table->string('ar07')->nullable(); // axis os
            //end auto ref
            //auto phor
            $table->string('ap01')->nullable(); // manifest sphere od
            $table->string('ap02')->nullable(); // manifest cyl od
            $table->string('ap03')->nullable(); // manifest axis od
            $table->string('ap04')->nullable(); // manifest add od
            $table->string('ap05')->nullable(); // manifest sphere os
            $table->string('ap06')->nullable(); // manifest cyl os
            $table->string('ap07')->nullable(); // manifest axis os
            $table->string('ap08')->nullable(); // manifest add os
            $table->string('ap09')->nullable(); // manifest DVA od
            $table->string('ap10')->nullable(); // manifest DVA os
            $table->string('ap11')->nullable(); // final sphere od
            $table->string('ap12')->nullable(); // final cyl od
            $table->string('ap13')->nullable(); // final axis od
            $table->string('ap14')->nullable(); // final add od
            $table->string('ap15')->nullable(); // final sphere os
            $table->string('ap16')->nullable(); // final cyl os
            $table->string('ap17')->nullable(); // final axis os
            $table->string('ap18')->nullable(); // final add os
            $table->string('ap19')->nullable(); // final DVA od
            $table->string('ap20')->nullable(); // final DVA os
            //end auto phor
            //k's
            $table->string('ar08')->nullable(); // k1 od (flat)
            $table->string('ar09')->nullable(); // k1 axis od
            $table->string('ar10')->nullable(); // k1 os (flat)
            $table->string('ar11')->nullable(); // k1 axis os
            $table->string('ar12')->nullable(); // k2 od (steep)
            $table->string('ar13')->nullable(); // k2 axis od
            $table->string('ar14')->nullable(); // k2 os (steep)
            $table->string('ar15')->nullable(); // k2 axis os
            //end k's

            $table->string('complete')->default(0); //completed
            $table->string('pt_id');
            $table->string('pt_name');
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
        Schema::dropIfExists('encounters');
    }
}
