<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')
            ->references('id')
            ->on('classes')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->id();
            $table->string('identifiant');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('date_naissance');
            $table->string('lieu_de_naissance');
            $table->string('telephone_parent')->nullable();;
            $table->string('email_parent')->nullable();
            //$table->string('date_insert'); 
           // $table->string('email')->unique();
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
        Schema::dropIfExists('students');
    }
}
