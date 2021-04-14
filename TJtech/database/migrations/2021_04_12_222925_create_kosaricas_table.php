<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosaricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosaricas', function (Blueprint $table) {
            $table->increments('kosarica_id');
            $table->unsignedInteger('korisnik_fk');
            $table->foreign('korisnik_fk')->references('korisnik_id')->on('korisniks')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('proizvod_fk');
            $table->foreign('proizvod_fk')->references('proizvod_id')->on('racunalos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('kosaricas');
    }
}
