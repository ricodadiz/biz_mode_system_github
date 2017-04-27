<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_services', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('product_service');
            $table->string('product_service_description');
            $table->string('price');
            $table->string('income_account')->nullable();
            $table->string('expense_account')->nullable();
            $table->string('sales_tax')->nullable();
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
