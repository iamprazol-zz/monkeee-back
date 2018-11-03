<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('suburb_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->text('description');
            $table->string('cover_photo');
            $table->bigInteger('order')->unique();
            $table->string('phone');
            $table->string('email');
            $table->string('opening_time');
            $table->string('closing_time');
            $table->string('open');
            $table->string('facebook');
            $table->string('instagram');
            $table->boolean('show')->default(true);
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
        Schema::dropIfExists('clubs');
    }
}
