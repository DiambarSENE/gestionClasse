<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('bulletins', function (Blueprint $table) {
            $table->unsignedBigInteger('eleve_id');
            $table->foreign('eleve_id')
            ->references('id')
            ->on('students')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->id();
            $table->string('compo');
            
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
        Schema::dropIfExists('bulletins');
    }
}
