<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{

    public function up()
    {
        Schema::create('visitors', function (Blueprint $table)
         {
            $table->id();
            $table->date('date');
            $table->string('ip');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
