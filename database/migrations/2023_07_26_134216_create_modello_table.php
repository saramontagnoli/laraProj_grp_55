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
    public function up()
    {
        Schema::create('modello', function (Blueprint $table) {
            $table->bigIncrements('codice_modello')->unsigned()->index();
            $table->string('nome_modello', 500)->unique();
            $table->bigInteger('marca_ref')->unsigned()->index();
            $table->foreign('marca_ref')->references('codice_marca')->on('marca');
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
        Schema::dropIfExists('modello');
    }
};
