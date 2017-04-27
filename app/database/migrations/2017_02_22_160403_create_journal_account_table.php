<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('journal_accounts', function ($table) {
			$table->increments('id');
		    $table->string('account_id');
		    $table->string('account_name');
            $table->string('description');
            $table->integer('debit');
            $table->integer('credit');
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
