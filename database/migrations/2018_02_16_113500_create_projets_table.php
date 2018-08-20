<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomProjet');
            $table->string('etat');
            $table->string('prix');            
            $table->string('delaiRealisation');            
            $table->string('type');            
            $table->string('nature');            
            $table->string('situationTerrain');            
            $table->string('commune');            
            $table->string('surfaceTotale');            
            $table->string('surfaceDemande');            
            $table->string('surfaceBatie');            
            $table->string('surfacePlancher');            
            $table->string('titreFoncier');            
            $table->string('nbrPiecesHabitables');
            $table->string('nbrLogement');           
            $table->string('autorisation'); 
            $table->string('cos');            
            $table->string('ces');  
            $table->string('idAdmin');              
            $table->string('idClient');        
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
        Schema::dropIfExists('projets');
    }
}
