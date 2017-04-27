<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bills', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('bill_retailer');
            $table->string('bill_date');
            $table->string('bill_due_date');
            $table->string('bill_note');
            $table->string('bill_supertotal');
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
