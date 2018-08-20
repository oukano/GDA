<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('representantLegal');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('cin');
            $table->string('tel1');
            $table->string('tel2');
            $table->string('profession');
            $table->string('natureJuridique');
            $table->string('nationalite');
            $table->string('dateNaissance');
            $table->string('lieuNaissance');
            $table->string('nomPere');
            $table->string('nomMere');
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
        Schema::dropIfExists('clients');
    }
}
