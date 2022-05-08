<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsDetailsTable extends Migration
{

    public function up()
    {
        Schema::create('persons_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->integer('age');
            $table->integer('reservation_id')->unsigned();
            $table->timestamps();
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('persons_details');
    }
}
