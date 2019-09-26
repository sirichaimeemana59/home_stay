<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelTransectionsTable extends Migration
{

    public function up()
    {
        Schema::create('travel_transections', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('travel_id')->nullable();
            $table->text('photo')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('travel_transections');
    }
}
