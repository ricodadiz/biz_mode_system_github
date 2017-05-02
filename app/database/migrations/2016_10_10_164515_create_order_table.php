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
            $table->string('reference_no');
            $table->string('status')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('terms')->nullable();
            $table->string('due_date')->nullable();
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
