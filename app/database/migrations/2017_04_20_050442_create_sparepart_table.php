<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparepartTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spareparts', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('date');
            $table->string('account_name');
            $table->string('product');
            $table->string('amount');
            $table->string('qty');
            $table->string('total');
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
