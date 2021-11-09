<?php

use Illuminate\Support\Facades\Schema;
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
        //3.table categories
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('title', 50);
            $table->string('slug', 50);
            $table->string('banner')->nullable();
            $table->string('description', 255)->nullable();
            $table->string('status', 10);
            $table->string('seo_title', 50)->nullable();
            $table->string('seo_desc', 50)->nullable();
            $table->string('seo_keywords', 100)->nullable();
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
        Schema::dropIfExists('categories');
    }
}
