<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTForm02AnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_form02_answer', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_examinees_form02');
            $table->foreign('id_examinees_form02')->references('id')->on('t_examinees_form02');

            $table->foreignId('id_asesor');
            $table->foreign('id_asesor')->references('id')->on('m_asesor');

            $table->string('answer');
            $table->integer('status');
            
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
        Schema::dropIfExists('t_form02_answer');
    }
}
