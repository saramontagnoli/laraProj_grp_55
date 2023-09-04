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
        Schema::create('province', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('nome', 100)->unique();
            $table->string('sigla', 2)->unique();
            $table->decimal('latitudine', 9,6 );
            $table->decimal('longitudine', 9,6 );
            $table->bigInteger('id_regione')->unsigned()->index();
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
        Schema::dropIfExists('province');
    }
};
