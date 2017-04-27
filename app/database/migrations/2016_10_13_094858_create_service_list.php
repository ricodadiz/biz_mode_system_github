<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('services', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->date('service_date');
            $table->string('sr_no');
            $table->string('station_location');
            $table->string('address');
            $table->string('service_by');
            $table->string('work_details');
            $table->string('remarks_result');
            $table->string('item');
            $table->string('unit_cost');
            $table->string('qty');
            $table->string('service_charge');
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
		Schema::drop('services');
	}

}
