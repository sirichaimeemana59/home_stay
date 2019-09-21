<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyHomeStaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_home_stays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_th')->nullable();
            $table->text('name_en')->nullable();
            $table->integer('province_id')->nullable();
            $table->integer('distric_id')->nullable();
            $table->integer('sub_dis')->nullable();
            $table->integer('code')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('owner')->nullable();
            $table->text('email')->nullable();
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
        Schema::dropIfExists('property__home__stays');
    }
}
