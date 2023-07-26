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
        Schema::create('utente', function (Blueprint $table) {
            $table->bigIncrements('codice_utente')->unsigned()->index();
            $table->string('nome', 50);
            $table->string('cognome', 70);
            $table->date('data_nascita');
            $table->string('username', 50)->unique();
            $table->string('password', 65);
            $table->string('role', 20);
            $table->string('email', 60)->unique();
            $table->string('indirizzo', 100);
            $table->bigInteger('occupazione_ref')->unsigned()->index();
            $table->foreign('occupazione_ref')->references('codice_occupazione')->on('occupazione');
            $table->bigInteger('comune_ref')->unsigned()->index();
            $table->foreign('comune_ref')->references('codice_comune')->on('comune');
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
        Schema::dropIfExists('utente');
    }
};
