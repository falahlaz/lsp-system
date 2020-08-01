<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMExamAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_exam_answer', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_exam_question');
            $table->foreign('id_exam_question')->references('id')->on('m_exam_question');

            $table->text('answer');
            $table->integer('status');
            $table->integer('is_correct');

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
        Schema::dropIfExists('m_exam_answer');
    }
}
