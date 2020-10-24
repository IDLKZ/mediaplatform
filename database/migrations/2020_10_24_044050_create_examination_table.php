<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExaminationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->bigIncrements("id");
            //Table Course,Video,Quiz,Review,User
            $table->foreignId("course_id");
            $table->foreignId("video_id");
            $table->foreignId("quiz_id")->nullable();
            $table->foreignId("review_id")->nullable();
            $table->foreignId("author_id");
            //Cascade function
            $table->foreign("course_id")->references("id")->on("courses")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("video_id")->references("id")->on("videos")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("quiz_id")->references("id")->on("quizzes")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("review_id")->references("id")->on("reviews")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("author_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            //Cascade end function
            $table->string("file")->nullable();
            $table->string("title");
            $table->text("description")->nullable();
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
        Schema::dropIfExists('examination');
    }
}
