<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvenementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_title');
            $table->date('event_date');
            $table->string('event_desc');
            $table->string('event_image');
            $table->string('event_category');
            $table->string('event_type');
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
        Schema::dropIfExists('evenements');
    }
}
