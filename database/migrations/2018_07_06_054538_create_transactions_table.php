<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('code')->unique();
            $table->text('billing_info');
            $table->text('shipping_info');
            $table->unsignedInteger('user_id');
            $table->double('total', 10, 4);
            $table->string('payment_gateway');
            $table->string('payment_token')->nullable();
            $table->string('status'); // pending | logistic | completed
            $table->text('admin_message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
