<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('requirement_experience');
            $table->longText('overview');
            $table->longText('skills');
            $table->boolean('status', 1);
            $table->string('jobType')->nullable();
            $table->string('jobLevel')->nullable();
            $table->string('company')->nullable();
            $table->string('location')->nullable();
            $table->string('salary')->nullable();
            $table->integer('priority')->nullable();
            $table->date('deadline_to_apply')->nullable();
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
        Schema::dropIfExists('career');
    }
}
