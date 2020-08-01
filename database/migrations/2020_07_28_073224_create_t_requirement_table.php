<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRequirementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_requirement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_form01');
            $table->foreign('id_form01')->references('id')->on('t_form01');

            $table->text('file_name');
            $table->string('name');
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
        Schema::dropIfExists('t_requirement');
    }
}
