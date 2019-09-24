<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeStaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_stays', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('property_id')->nullable();
            $table->text('name_th')->nullable();
            $table->text('name_en')->nullable();
            $table->text('phone')->nullable();
            $table->text('owner')->nullable();
            $table->text('location')->nullable();
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
        Schema::dropIfExists('home_stays');
    }
}
