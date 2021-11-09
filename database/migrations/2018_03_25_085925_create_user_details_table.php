<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->string('gender', 15);
            $table->date('dob')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('contact', 50)->nullable();
            $table->text('social_media_links')->nullable();
            $table->text('profile_image')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('user_details');
    }
}
