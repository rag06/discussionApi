<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CHANNEL_ID');
            $table->string('CHANNEL_NAME');
            $table->string('CHANNEL_ADMIN_ID');
            $table->string('CHANNEL_STATUS');
            $table->timestamps();
        });
    /*
        Schema::table(
            'channels', function ($table) {
                $table
                    ->foreign('CHANNEL_ADMIN_ID')
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
        Schema::dropIfExists('channels');
    }
}
