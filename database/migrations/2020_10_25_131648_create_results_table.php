<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("examination_id");
            $table->foreignId("author_id");
            $table->foreignId("student_id");
            $table->foreignId("course_id");
            $table->foreignId("video_id");
            $table->foreign("examination_id")->references("id")->on("examinations")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("author_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("student_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("course_id")->references("id")->on("courses")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("video_id")->references("id")->on("videos")->cascadeOnDelete()->cascadeOnUpdate();
            $table->json("answers");
            $table->text("student_comments")->nullable();
            $table->text("teacher_comments")->nullable();
            $table->integer("checked")->default(0);
            $table->date("passed_day")->nullable();
            $table->date("checked_day")->nullable();
            $table->integer("status")->default(0);
            $table->string("result")->nullable();
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
        Schema::dropIfExists('results');
    }
}
