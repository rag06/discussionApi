<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('USER_ID');
            $table->string('USER_FIRST_NAME');
            $table->string('USER_LAST_NAME');
            $table->string('USER_EMAIL');
            $table->string('USER_PASSWORD');
            $table->integer('USER_TYPE')->default(1);
            $table->integer('USER_STATUS')->default(1);
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
        Schema::dropIfExists('users');
    }
}
