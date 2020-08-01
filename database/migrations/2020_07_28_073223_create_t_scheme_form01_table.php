<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSchemeForm01Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_scheme_form01', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_exam_question');
            $table->foreign('id_exam_question')->references('id')->on('m_exam_question');

            $table->foreignId('id_form01');
            $table->foreign('id_form01')->references('id')->on('t_form01');

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
        Schema::dropIfExists('t_scheme_form01');
    }
}
