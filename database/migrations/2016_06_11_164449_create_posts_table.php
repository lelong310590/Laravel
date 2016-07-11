<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lar_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_name');
            $table->string('post_slug');
            $table->text('post_content');
            $table->text('post_excerpt');
            $table->string('post_seo_title')->nullable();
            $table->string('post_focus_keyword')->nullable();
            $table->string('post_meta_description')->nullable();
            $table->integer('post_status')->default(1);
            $table->integer('post_tag')->unsigned();
            $table->foreign('post_tag')->references('id')->on('lar_taxonomy')->onDelete('cascade');
            $table->string('post_attachment');
            $table->integer('post_category')->unsigned();
            $table->foreign('post_category')->references('id')->on('lar_taxonomy')->onDelete('cascade');
            $table->integer('post_author')->unsigned();
            $table->foreign('post_author')->references('id')->on('lar_users')->onDelete('cascade');
            $table->integer('post_view');
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
        Schema::drop('lar_posts');
    }
}
