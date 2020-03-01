<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->text('comment');
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('slug')->nullable();
            $table->integer('views')->nullable();
            $table->integer('votes')->nullable();
            $table->integer('votes_up')->nullable();
            $table->integer('votes_down')->nullable();
            $table->integer('forup')->nullable();
            $table->boolean('confirmed')->default(true);
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
        Schema::dropIfExists('posts');
    }
}
