<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTForm01Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_form01', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('birth_place');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('nationality');
            $table->text('home_address');
            $table->string('house_phone');
            $table->string('phone');
            $table->string('office_phone');
            $table->string('private_email');
            $table->string('post_code');
            $table->string('last_educ');
            $table->string('company_name');
            $table->string('position');
            $table->text('company_address');
            $table->string('company_phone');
            $table->string('company_fax');
            $table->string('company_email');
            $table->string('company_post_code');
            $table->integer('status');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('t_form01');
    }
}
