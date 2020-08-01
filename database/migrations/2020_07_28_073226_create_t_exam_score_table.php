<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTExamScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_exam_score', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form01');
            $table->foreign('id_form01')->references('id')->on('t_form01');

            $table->foreignId('id_scheme');
            $table->foreign('id_scheme')->references('id')->on('m_scheme');

            $table->integer('score');
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
        Schema::dropIfExists('t_exam_score');
    }
}
