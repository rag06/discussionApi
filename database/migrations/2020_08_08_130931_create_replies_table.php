<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('REPLY_ID');
            $table->string('POST_ID');
            $table->string('REPLY_TEXT');
            $table->string('REPLY_USER_ID');
            $table->string('REPLY_STATUS');
            $table->timestamps();
        });

       /*  Schema::table(
            'replies', function ($table) {
                $table
                    ->foreign('REPLY_USER_ID')
                    ->references('USER_ID')
                    ->on('users')
                    ->onDelete('cascade');
            }
        );

        Schema::table(
            'replies', function ($table) {
                $table
                    ->foreign('POST_ID')
                    ->references('POST_ID')
                    ->on('posts')
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
        Schema::dropIfExists('replies');
    }
}
