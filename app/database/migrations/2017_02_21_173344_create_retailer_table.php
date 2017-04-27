<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('retailers', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('retailer_name');
            $table->string('retailer_email');
            $table->string('retailer_contact');
            $table->string('retailer_firstname');
            $table->string('retailer_lastname');
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
