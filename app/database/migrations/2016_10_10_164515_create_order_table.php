<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_generics', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('customer_name');
            $table->date('date_order');
            $table->string('order_id');
            $table->string('status');
            $table->string('payment_name');
            $table->string('terms');
            $table->string('due_date');
            $table->string('amount_paid');
            $table->string('total_amount');
            $table->softDeletes();
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
		//
	}

}
