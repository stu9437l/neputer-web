<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuSectionPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_section_page', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('menu_section_id');
            $table->unsignedInteger('page_id');
            $table->integer('rank')->nullable();

            $table->foreign('menu_section_id')->references('id')->on('menu_sections')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('page_id')->references('id')->on('pages')
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
        Schema::dropIfExists('menu_section_page');
    }
}
