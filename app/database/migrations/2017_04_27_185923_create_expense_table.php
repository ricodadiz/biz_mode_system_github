<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('expense_date');
            $table->string('expense_name');
            $table->string('expense_particular');
            $table->string('expense_transpo');
            $table->string('expense_meals');
            $table->string('expense_accommodation');
            $table->string('expense_others');
            $table->string('expense_total');
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
