<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostsHasCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_has_categories', function (Blueprint $table){
            $table->bigInteger('id');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('posts_id');

            $table->index(['categories_id','posts_id']);
            $table->foreign('posts_id')->references('id')->on('posts');
            $table->foreign('categories_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_has_categories');
    }
}
