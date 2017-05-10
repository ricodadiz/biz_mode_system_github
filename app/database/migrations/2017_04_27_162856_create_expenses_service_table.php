<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenses_services', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('customer_name');
            $table->date('service_date');
            $table->string('sr_no');
            $table->string('station_location');
            $table->string('address');
            $table->string('service_by');
            $table->string('work_details');
            $table->string('remarks_result');
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
