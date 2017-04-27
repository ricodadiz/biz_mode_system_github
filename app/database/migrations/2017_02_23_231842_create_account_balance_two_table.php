<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountBalanceTwoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('account_balances_twos', function ($table) {
			$table->increments('id');
            $table->string('account_id');
		    $table->string('account_name');
            $table->integer('credit');
            $table->integer('debit');
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
