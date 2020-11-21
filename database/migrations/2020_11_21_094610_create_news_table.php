<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("category_id");
            $table->foreignId("author_id");
            $table->foreignId("language_id");
            $table->foreign("author_id")->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign("language_id")->references("id")->on("languages")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("title");
            $table->text("description");
            $table->json("links")->nullable();
            $table->string("alias");
            $table->string("thumbnail");
            $table->string("img");
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
        Schema::dropIfExists('news');
    }
}
