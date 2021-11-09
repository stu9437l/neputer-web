<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('product_id');
            $table->string('image', 255)->nullable();
            $table->string('alt_text', 50)->nullable();
            $table->tinyInteger('rank')->nullable();
            $table->boolean('status')->default();


//            $table->foreign('product_id')->references('id')->on('products')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_gallery');
    }
}
