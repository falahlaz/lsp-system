<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMTukScheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_tuk_scheme', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tuk');
            $table->foreignId('id_scheme');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('id_tuk')->references('id')->on('m_tuk');
            $table->foreign('id_scheme')->references('id')->on('m_scheme');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_tuk_scheme');
    }
}
