<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::disableForeignKeyConstraints();
        Schema::create('evaluations', function (Blueprint $table) {
             $table->id();
             $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
            ->references('id')
            ->on('students')
            ->onDelete('restrict')
            ->onUpdate('restrict')->unique();
             $table->unsignedBigInteger('matiere_id');
            $table->foreign('matiere_id')
            ->references('id')
            ->on('matieres')
            ->onDelete('restrict')
            ->onUpdate('restrict');
           
            $table->string('trimestre');
            $table->integer('voc')->nullable();
            $table->integer('conj')->nullable();
            $table->integer('gram')->nullable();
            $table->integer('orth')->nullable();
           

           $table->integer('AN')->nullable();
           $table->integer('AM')->nullable();
           $table->integer('AG')->nullable();

           $table->integer('RPR')->nullable();
           $table->integer('RPC')->nullable();
          

           $table->integer('DMR')->nullable();
           $table->integer('DMC')->nullable();
          
           $table->integer('EDDR')->nullable(); 
           $table->integer('EDDC')->nullable(); 
          
           $table->integer('AP')->nullable();
          
           $table->integer('Arab')->nullable();
          
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
        Schema::dropIfExists('evaluations');
    }
}
