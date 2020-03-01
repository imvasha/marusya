<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('your_name', 100)->nullable();
            $table->text('comment');
            $table->text('description')->nullable();
            $table->integer('votes_up')->nullable();
            $table->integer('votes_down')->nullable();
            $table->boolean('confirmed')->default(false);
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
        Schema::dropIfExists('replies');
    }
}
