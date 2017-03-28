<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubCategoryPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('SubCategoryPosts', function (Blueprint $table) {
            $table->integer('sub_cat_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->timestamps();
            
             $table->foreign('sub_cat_id')->references('id')->on('SubCategory')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('post_id')->references('id')->on('Posts')
                ->onUpdate('cascade')->onDelete('cascade');
           
            $table->primary(['post_id', 'sub_cat_id']);
            
             
            
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
                        Schema::drop("SubCategoryPosts");

    }
}
