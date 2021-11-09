<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title', 100);
            $table->string('slug', 100);
            $table->integer('parent_id');
            $table->string('seo_title')->nullable();
            $table->string('open_in', 50);
            $table->string('page_type', 50);
            $table->string('link', 150)->nullable();
            $table->text('content')->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('status', 15);
            $table->text('hint')->nullable();
            $table->string('seo_desc', 255)->nullable();
            $table->string('seo_keys', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
