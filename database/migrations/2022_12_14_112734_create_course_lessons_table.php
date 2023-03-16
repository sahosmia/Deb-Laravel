<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file_name');
            $table->integer('file_type');
            $table->integer('position')->nullable();
             $table->unsignedBigInteger('course_chapter_id');
            $table->foreign('course_chapter_id')->references('id')->on('course_chapters')->onDelete('cascade');
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
        Schema::dropIfExists('course_lessons');
    }
};
