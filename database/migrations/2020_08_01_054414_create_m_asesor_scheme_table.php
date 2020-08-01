<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAsesorSchemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_asesor_scheme', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_asesor');
            $table->foreign('id_asesor')->references('id')->on('m_asesor');
            $table->foreignId('id_scheme');
            $table->foreign('id_scheme')->references('id')->on('m_scheme');
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
        Schema::dropIfExists('m_asesor_scheme');
    }
}
