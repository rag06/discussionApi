<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcribers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('SUBSCRIBER_USERID');
            $table->string('SUBSCRIBER_CHANNEL_ID');
            $table->timestamps();
        });

       /*  Schema::table(
            'subcribers', function ($table) {
                $table
                    ->foreign('SUBSCRIBER_USERID')
                    ->references('USER_ID')
                    ->on('users')
                    ->onDelete('cascade');
            }
        );
        Schema::table(
            'subcribers', function ($table) {
                $table
                    ->foreign('SUBSCRIBER_CHANNEL_ID')
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
        Schema::dropIfExists('subcribers');
    }
}
