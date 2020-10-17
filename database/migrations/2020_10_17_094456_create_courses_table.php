<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements("id");
            //Foreign key
            $table->foreignId("author_id");
            $table->foreign("author_id")->references("id")->on("users")->cascadeOnDelete();
            $table->foreignId("language_id");
            $table->foreign("language_id")->references("id")->on("languages")->cascadeOnDelete();
            //
            $table->string("img")->nullable();
            $table->string("title");
            $table->string("subtitle",500);
            $table->text("description");
            $table->json("advantage")->nullable();
            $table->text("requirement")->nullable();
            $table->boolean("status")->default(false);
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
        Schema::dropIfExists('courses');
    }
}
