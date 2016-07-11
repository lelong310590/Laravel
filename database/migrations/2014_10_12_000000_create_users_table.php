<?php

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
        Schema::create('lar_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_login')->unique();
            $table->string('user_email')->unique();
            $table->string('user_password');
            $table->string('user_info');
            $table->boolean('user_status')->default(1);
            $table->integer('user_level');
            $table->rememberToken();
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
        Schema::drop('lar_users');
    }
}
