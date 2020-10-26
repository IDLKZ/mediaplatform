<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_videos', function (Blueprint $table) {
            $table->bigIncrements("id");
            //Foreign key to User, Course,Video
            $table->foreignId("subscribe_id");
            $table->foreignId("student_id");
            $table->foreignId("video_id");
            $table->foreign("student_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("video_id")->references("id")->on("videos")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("subscribe_id")->references("id")->on("subscribers")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("total")->nullable();
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('user_video');
    }
}
