<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosagendacalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventosagendacalendario', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_start');
            $table->datetime('date_end')->nullable();
            $table->boolean('all_day')->nullable();
            $table->string('color')->nullable();
            $table->mediumText('title')->nullable();
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
        Schema::dropIfExists('eventosagendacalendario');
    }
}
