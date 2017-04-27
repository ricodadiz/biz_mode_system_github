<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersproductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders_products', function ($table) {
            $table->increments('id');
            $table->string('order_id');
            $table->string('products');
            $table->string('warehouse');
        	$table->string('category');
        	$table->integer('quantity');
            $table->string('price');
            $table->string('vat');
            $table->string('amount');
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
