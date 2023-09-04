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
        Schema::create('comuni', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('nome', 100);
            $table->string('codice_catastale', 4)->unique();
            $table->decimal('latitudine', 20,10);
            $table->decimal('longitudine', 20,10);
            $table->bigInteger('id_provincia')->unsigned()->index();
            $table->bigInteger('id_regione')->unsigned()->index();
            $table->foreign('id_provincia')->references('id')->on('province');
            $table->foreign('id_regione')->references('id')->on('regioni');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comuni');
    }
};
