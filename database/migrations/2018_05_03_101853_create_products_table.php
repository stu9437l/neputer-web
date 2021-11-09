<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->string('title', 50);
            $table->string('slug', 50);
            $table->double('new_price', 10, 2)->nullable();
            $table->double('old_price', 10, 2)->nullable();
            $table->integer('quantity');
            $table->text('short_desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('main_image', 255)->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedInteger('rating')->nullable();
            $table->string('seo_title', 50)->nullable();
            $table->text('seo_desc')->nullable();
            $table->text('seo_keywords')->nullable();

            $table->foreign('user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
