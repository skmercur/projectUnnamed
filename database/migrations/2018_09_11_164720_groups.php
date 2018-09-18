<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Groups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('groups', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name',80);
      $table->string('groupid',150)->unique();
      $table->string('admin',30);
      $table->longText('members');
      $table->longText('pmembers');
      $table->integer('type');
      $table->integer('chat');
      $table->integer('key');
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
      Schema::dropIfExists('groups');
    }
}
