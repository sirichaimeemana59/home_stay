<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{

    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->uuid('id');
            $table->text('name_th')->nullable();
            $table->text('name_en')->nullable();
            $table->text('phone')->nullable();
            $table->text('location')->nullable();
            $table->text('detail_th')->nullable();
            $table->text('detail_en')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('travels');
    }
}
