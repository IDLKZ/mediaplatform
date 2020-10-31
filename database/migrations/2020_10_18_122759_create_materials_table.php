<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->foreignId("video_id");
            $table->foreign("video_id")->references("id")->on("videos")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("author_id");
            $table->foreign("author_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("file")->nullable();
            $table->string("title");
            $table->string("type");
            $table->json("links")->nullable();

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
        Schema::dropIfExists('materials');
    }
}
