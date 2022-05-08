<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{

    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->string('feature');
            $table->string('class');
            $table->integer('Accept')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('features');
    }
}
