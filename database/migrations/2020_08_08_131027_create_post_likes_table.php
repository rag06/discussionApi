<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('POST_LIKE_USER_ID');
            $table->string('POST_LIKE_POST_ID');
            $table->timestamps();
        });

/*
        Schema::table(
            'post_likes', function ($table) {
                $table
                    ->foreign('POST_LIKE_POST_ID')
                    ->references('POST_ID')
                    ->on('posts')
                    ->onDelete('cascade');
            }
        );


        Schema::table(
            'post_likes', function ($table) {
                $table
                    ->foreign('POST_LIKE_USER_ID')
                    ->references('USER_ID')
                    ->on('users')
                    ->onDelete('cascade');
            }
        ); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_likes');
    }
}
