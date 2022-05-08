<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllRoomsReservationInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_rooms_reservation_info', function (Blueprint $table) {
            $table->increments('id');
            $table->text('person_name');
            $table->integer('phone_number');
            $table->integer('room_id');
            $table->integer('user_id');
            $table->integer('reservation_id');
            $table->date('reservation_date');
            $table->date('reservation_exDate');
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
        Schema::dropIfExists('all_rooms_reservation_info');
    }
}
