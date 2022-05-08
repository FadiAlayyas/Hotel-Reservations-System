<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('readCheck')->default(0);
            $table->integer('owner_id')->unsigned();
            $table->string('owner_type');
            $table->integer('conversation_id')->unsigned();
            $table->timestamps();
            $table->foreign('conversation_id')->references('id')->on('conversation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
}
