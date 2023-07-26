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
        Schema::create('faq', function (Blueprint $table) {
            $table->bigIncrements('codice_faq')->unsigned()->index();
            $table->string('domanda', 150);
            $table->string('risposta', 150);
            $table->bigInteger('admin_ref')->unsigned()->index();
            $table->foreign('admin_ref')->references('codice_utente')->on('utente');
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
        Schema::dropIfExists('faq');
    }
};