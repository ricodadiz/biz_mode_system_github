<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('date');
            $table->string('type');
            $table->string('category')->nullable();
            $table->string('amount')->nullable();
            $table->string('description')->nullable();
            $table->string('account')->nullable();
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
