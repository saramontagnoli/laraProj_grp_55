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
     * Metodo per la creazione della tabella marca con relativi campi
     */
    public function up()
    {
        Schema::create('marca', function (Blueprint $table) {
            $table->bigIncrements('codice_marca')->unsigned()->index();
            $table->string('nome_marca', 500)->unique();
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
        Schema::dropIfExists('marca');
    }
};
