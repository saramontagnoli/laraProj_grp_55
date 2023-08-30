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
     * Metodo per la creazione della tabella noleggio compresa di tutti i campi e chiavi esterne
     */
    public function up()
    {
        Schema::create('noleggio', function (Blueprint $table) {
            $table->bigIncrements('codice_noleggio')->unsigned()->index();
            $table->date('data_inizio');
            $table->date('data_fine');
            $table->bigInteger('utente_ref')->unsigned()->index();
            $table->foreign('utente_ref')->references('id')->on('users');
            $table->bigInteger('auto_ref')->unsigned()->index();
            $table->foreign('auto_ref')->references('codice_auto')->on('auto');
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
        Schema::dropIfExists('noleggio');
    }
};
