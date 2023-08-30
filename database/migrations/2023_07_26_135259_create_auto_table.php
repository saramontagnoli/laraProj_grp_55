<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
     * Metodo per la creazione della tabella auto con relativi campi e chiavi esterne
     */
    public function up()
    {
        Schema::create('auto', function (Blueprint $table) {
            $table->bigIncrements('codice_auto')->unsigned()->index();
            $table->string('targa', 7)->unique();
            $table->string('foto_auto', 500)->unique();
            $table->string('allestimento', 500);
            $table->double('costo_giorno', 8, 2);
            $table->integer('num_posti');
            $table->bigInteger('modello_ref')->unsigned()->index();
            $table->foreign('modello_ref')->references('codice_modello')->on('modello');
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
        Schema::dropIfExists('auto');
    }
};
