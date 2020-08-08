<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('POST_ID');
            $table->string('POST_NAME');
            $table->longText('POST_TEXT');
            $table->string('POST_CHANNEL_ID');
            $table->string('POST_USER_ID');
            $table->integer('POST_STATUS');
            $table->timestamps();
        });

       /*  Schema::table(
            'posts', function ($table) {
                $table
                    ->foreign('POST_USER_ID')
                    ->references('USER_ID')
                    ->on('users')
                    ->onDelete('cascade');
            }
        );

        Schema::table(
            'posts', function ($table) {
                $table
                    ->foreign('POST_CHANNEL_ID')
                    ->references('CHANNEL_ID')
                    ->on('channels')
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
        Schema::dropIfExists('posts');
    }
}
