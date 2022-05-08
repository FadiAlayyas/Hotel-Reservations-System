<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomReservationDateTable extends Migration
{

    public function up()
    {
        Schema::create('room_reservation_date', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->unsigned();
            $table->integer('reservation_id')->unsigned();
            $table->date('date');
            $table->timestamps();
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('room_reservation_date');
    }
}
