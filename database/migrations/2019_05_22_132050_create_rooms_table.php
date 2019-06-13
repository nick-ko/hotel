<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('room_code');
            $table->string('room_name');
            $table->integer('room_price');
            $table->integer('room_size');
            $table->string('room_category');
            $table->string('room_photo');
            $table->string('room_image');
            $table->tinyInteger('room_status')->default(0);
            $table->integer('room_number');
            $table->integer('total_room');
            $table->tinyInteger('disponibility_room')->default(0);
            $table->string('room_description');
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
        Schema::dropIfExists('rooms');
    }
}
