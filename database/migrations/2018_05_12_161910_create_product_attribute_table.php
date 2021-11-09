<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('attribute_id');
            $table->text('value')->nullable();
            $table->tinyInteger('rank')->default(0);

            $table->foreign('product_id')->references('id')->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('attribute_id')->references('id')->on('attributes')
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
        Schema::dropIfExists('product_attribute');
    }
}
