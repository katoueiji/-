<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('user_id');
            $table->integer('capacity');
            $table->string('title', 255);
            $table->string('image');
            $table->string('comment', 255);
            $table->date('date');
            $table->tinyInteger('format');
            $table->tinyInteger('type');
            $table->tinyInteger('is_visible');
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
        Schema::dropIfExists('events');
    }
}
