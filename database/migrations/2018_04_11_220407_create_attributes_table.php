<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('group_id');
            $table->string('title', 150);
            $table->string('slug', 50);
            $table->string('status', 50);
            $table->foreign('group_id')->references('id')->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**\
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attributes');
    }
}
