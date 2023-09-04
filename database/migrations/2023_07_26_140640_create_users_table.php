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
     * Metodo per la creazione della tabella users con campi e chiavi esterne relative
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('nome', 50);
            $table->string('cognome', 70);
            $table->date('data_nascita')->nullable();
            $table->string('username', 50)->unique();
            $table->string('password', 65);
            $table->string('role', 5);
            $table->string('email', 60)->unique()->nullable();
            $table->string('indirizzo', 100)->nullable();
            $table->bigInteger('occupazione_ref')->unsigned()->index()->nullable();
            $table->foreign('occupazione_ref')->references('codice_occupazione')->on('occupazione');
            $table->bigInteger('comune_ref')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('users');
    }
};
