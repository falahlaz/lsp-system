<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAsesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_asesor', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('id_users');
            $table->foreign('id_users')->references('id')->on('m_users');

            $table->string('reg_num');
            $table->string('gender');
            $table->text('address');
            $table->string('phone');
            $table->integer('status');
            
            $table->foreignId('id_tuk');
            $table->foreign('id_tuk')->references('id')->on('m_tuk');
            
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
        Schema::dropIfExists('m_asesor');
    }
}
