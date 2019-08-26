<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('book_name');
            $table->string('book_lname');
            $table->string('book_email');
            $table->string('book_contact');
            $table->date('book_from');
            $table->date('book_to');
            $table->integer('adult_number');
            $table->integer('child_number');
            $table->string('book_room');
            $table->tinyInteger('book_status')->default(0);
            $table->string('book_service');
            $table->date('booking_date');
            $table->integer('booking_price');
            $table->integer('booking_total');
            $table->string('motif');
            $table->string('pays');
            $table->tinyInteger('archived')->default(0);
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
        Schema::dropIfExists('books');
    }
}
