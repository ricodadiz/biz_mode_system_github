<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBalanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('account_balances', function ($table) {
			$table->increments('id');
			$table->integer('company_id');
            $table->string('name');
		    $table->string('date');
		    $table->integer('total_debit');
            $table->integer('total_credit');
            $table->softDeletes();
            $table->timestamps();
        	});	
     }

	/*
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
