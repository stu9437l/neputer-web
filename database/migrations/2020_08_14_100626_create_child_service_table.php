<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_service', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('service_id');
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('order')->default(1);
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
        Schema::dropIfExists('child_service');
    }
}
