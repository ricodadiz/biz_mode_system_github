<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('product_name');
            $table->integer('in_stock');
            $table->string('warranty');
            $table->string('model_code');
            $table->string('product_code');
            $table->string('supplier_code');
            $table->string('product_price');
            $table->string('status');
            $table->longText('product_photo')->nullable();
            $table->string('category');
            $table->string('brand');
            $table->string('warehouse');
            $table->string('description');
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
        Schema::drop('product');
	}

}
