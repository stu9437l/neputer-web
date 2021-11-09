<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewOldPriceRemarksColumnInProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_attribute', function (Blueprint $table) {
            $table->string('weight')->nullable();
            $table->string('new_price')->nullable();
            $table->string('old_price')->nullable();
            $table->text('remarks')->nullable();
            $table->dropColumn('value');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_attribute', function (Blueprint $table) {
            $table->dropColumn('weight');
            $table->dropColumn('new_price');
            $table->dropColumn('old_price');
            $table->dropColumn('remarks');
            $table->text('value')->nullable();
        });
    }
}
