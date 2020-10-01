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

        //game tag
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('developer');
            $table->timestamps();
        });

        //genre tag
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //posts
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('image');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')
                ->references('id')->on('genres');

            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')
                ->references('id')->on('games');

            $table->boolean('hidden');
            $table->timestamps();
        });

        //comments
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id')->on('posts');

            $table->text('description');
            $table->timestamps();
        });

        //likes
        Schema::create('likes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id')->on('posts');

            $table->boolean('liked');
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
        //
    }
}
