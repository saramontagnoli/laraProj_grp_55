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
        Schema::create('comune', function (Blueprint $table) {
            $table->bigIncrements('codice_comune')->unsigned()->index();
            $table->string('CAP', 10)->unique();
            $table->string('nome_comune', 500)->unique();
            $table->bigInteger('stato_ref')->unsigned()->index();
            $table->foreign('stato_ref')->references('codice_stato')->on('stato');
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
        Schema::dropIfExists('comune');
    }
};
