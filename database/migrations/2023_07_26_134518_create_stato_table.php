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
     * Metodo per la creazione della tabella stato e relativi campi
     */
    public function up()
    {
        Schema::create('stato', function (Blueprint $table) {
            $table->bigIncrements('codice_stato')->unsigned()->index();
            $table->string('nome_stato', 500)->unique();
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
        Schema::dropIfExists('stato');
    }
};
