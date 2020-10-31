<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestiobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId("quiz_id");
            $table->foreign("quiz_id")->references("id")->on("quizzes")->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("question");
            $table->json('images')->nullable();
            $table->string("A");
            $table->string("B");
            $table->string("C");
            $table->string("D");
            $table->string("E");
            $table->string("answer");
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
        Schema::dropIfExists('questiobs');
    }
}
