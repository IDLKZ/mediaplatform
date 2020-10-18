<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("course_id");
            $table->foreign("course_id")->references("id")->on("courses")->cascadeOnDelete();
            $table->integer("available")->default(0);
            $table->string("video_url");
            $table->integer("count");
            $table->string("title");
            $table->text('description')->nullable();
            $table->string("alias");
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
        Schema::dropIfExists('videos');
    }
}
