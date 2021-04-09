<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacunalosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racunalos', function (Blueprint $table) {
            $table->increments('proizvod_id');
            $table->string('Naziv_proizvoda');
            $table->string('CPU');
	        $table->string('RAM');
            $table->string('Memorija');
	        $table->string('Graficka');
	        $table->string('Cijena');
	        $table->string('Slika');
            $table->string('Velika_slika');
            $table->unsignedInteger('kategorija_fk');
            $table->foreign('kategorija_fk')->references('kategorija_id')->on('kategorijas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('racunalos');
    }
}
