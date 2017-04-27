<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBill2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bills2s', function ($table) {
            $table->increments('id');
            $table->integer('bill_id');
            $table->string('bill_item');
            $table->string('bill_expense_category');
            $table->string('bill_description');
            $table->string('bill_qty');
            $table->string('bill_price');
            $table->string('bill_tax');
            $table->string('bill_amount');
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
