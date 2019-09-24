<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomHomeStayTransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_home_stay_transections', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('property_id')->nullable();
            $table->uuid('type_id')->nullable();
            $table->uuid('home_stay_id')->nullable();
            $table->text('amount')->nullable();
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
        Schema::dropIfExists('room_home_stay_transections');
    }
}
