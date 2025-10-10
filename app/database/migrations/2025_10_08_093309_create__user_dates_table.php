<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_dates', function (Blueprint $table) {
            $table->integer('id');
            $table->string('name', 20);
            $table->string('email', 50);
            $table->string('password', 100);
            $table->string('image')->nullable();
            $table->string('comment', 255)->nullable();
            $table->tinyInteger('roll')->default(0);
            $table->tinyInteger('is_active')->default(0);
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
        Schema::dropIfExists('user_dates');
    }
}
