<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->foreignId("news_id")->references("id")->on("news")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("users_id")->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('comment');;
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
        Schema::dropIfExists('comments');
    }
}
