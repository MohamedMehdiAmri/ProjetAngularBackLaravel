<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Voiture extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('owner');
            $table->string('kilometrage');
            $table->Date('year');
            $table->string('phone_number');
            $table->string('image');
            $table->string('quantity');
            $table->string('category');
            $table->double('prix',8,3);
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
        //
    }
}
