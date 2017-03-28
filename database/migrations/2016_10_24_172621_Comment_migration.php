<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->integer('user_id');
            $table->integer('posts_id');
            $table->string('Comment');
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
        Schema::drop("Comments");
    }
}
