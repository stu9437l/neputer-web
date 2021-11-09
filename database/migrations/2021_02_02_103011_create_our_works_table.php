<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('priority')->nullable(true);
            $table->longText('description');
            $table->string('images')->nullable(true);
            $table->string('platform');
            $table->boolean('status',10);
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
        Schema::dropIfExists('our_works');
    }
}
