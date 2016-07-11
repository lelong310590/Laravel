<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lar_taxonomy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taxonomy_name');
            $table->string('taxonomy_slug');
            $table->integer('taxonomy_parent');
            $table->string('taxonomy_seo_title');
            $table->string('taxonomy_focus_keyword');
            $table->string('taxonomy_meta_description');
            $table->string('taxonomy_type');
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
        Schema::drop('lar_taxonomy');
    }
}
