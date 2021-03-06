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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username',30)->unique();
            $table->string('email',191)->unique();
            $table->string('password');
            $table->string('imgpath');
              $table->string('namespi',191);
              $table->integer('status');
              $table->integer('code');
              $table->string('type',10);
              $table->integer('nfiles');
              $table->integer('tsize');
              $table->string('gender',7);
              $table->longText('bio');
              $table->longText('followers');
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
        Schema::dropIfExists('users');
    }
}
