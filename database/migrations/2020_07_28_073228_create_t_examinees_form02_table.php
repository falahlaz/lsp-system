<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTExamineesForm02Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_examinees_form02', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_unit_question');
            $table->foreign('id_unit_question')->references('id')->on('m_unit_question');

            $table->foreignId('id_form02');
            $table->foreign('id_form02')->references('id')->on('t_form02');

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
        Schema::dropIfExists('t_examinees_form02');
    }
}
