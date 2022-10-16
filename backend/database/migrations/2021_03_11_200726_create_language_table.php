<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cv_id')->index();
            $table->string('name');
            $table->integer('listening')->nullable();
            $table->integer('reading')->nullable();
            $table->integer('talking')->nullable();
            $table->integer('writing')->nullable();

            $table->foreign('cv_id')
                ->references('id')
                ->on('cvs')
                ->onDelete('cascade');

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
        Schema::dropIfExists('languages');
    }
}
