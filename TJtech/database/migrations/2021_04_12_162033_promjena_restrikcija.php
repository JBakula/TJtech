<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PromjenaRestrikcija extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('racunalos', function (Blueprint $table) {
            $table->string('CPU')->nullable()->change();
            $table->string('RAM')->nullable()->change();
            $table->string('Memorija')->nullable()->change();
            $table->string('Graficka')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('racunalos', function (Blueprint $table) {
            //
        });
    }
}
