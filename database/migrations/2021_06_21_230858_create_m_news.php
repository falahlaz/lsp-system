<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user");
            $table->string("title");
            $table->text("body");
            $table->text("image")->nullable();
            $table->integer("is_active")->default(1);
            $table->integer("is_show")->default(0);
            $table->timestamps();

            $table->foreign("id_user")->references("id")->on("m_users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_news');
    }
}
