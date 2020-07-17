<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            //address capacity details images1 images2 images3 user_id position prix rate stat superfice
            $table->bigIncrements('id');
            $table->integer('capacity');
            $table->string('address');
            $table->string('title');
            $table->string('details');
            $table->longText('images1');
            $table->longText('images2');
            $table->longText('images3');
            $table->string('position');
            $table->integer('prix');
            $table->integer('rate');
            $table->string('stat');
            $table->integer('superfice');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('annonces');
    }
}
