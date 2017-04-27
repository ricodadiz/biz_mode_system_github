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
            $table->string('service_code')->unique();
            $table->string('report_type')->nullable();
            $table->string('station_location')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_nos')->nullable();
            $table->date('service_date')->nullable();
            $table->string('pump_phone_in_concern')->nullable();
            $table->string('phone_in_by')->nullable();
            $table->string('call_slip_no')->nullable();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->string('pump_manufacturer')->nullable();
            $table->string('pump_model')->nullable();
            $table->string('pump_serial_no')->nullable();
            $table->string('service_by')->nullable();
            $table->integer('pump_no')->nullable();
            $table->integer('hose_no')->nullable();
            $table->string('product')->nullable();
            $table->string('totalizer_before_service')->nullable();
            $table->string('totalizer_after_service')->nullable();
            $table->string('total_ltrs_used')->nullable();
            $table->string('pump_condition_before_repair')->nullable();
            $table->string('work_details')->nullable();
            $table->string('remarks_result')->nullable();
            $table->string('final_counter_measure')->nullable();
            $table->string('ten_ltrs_calibration_check')->nullable();
            $table->string('one_ltr_calibration_check')->nullable();
            $table->string('qty_unit')->nullable();
            $table->string('replace_parts')->nullable();
            $table->string('unit_cost')->nullable();
            $table->integer('unit_total')->nullable();
            $table->string('under_warranty')->nullable();
            $table->string('charge_to')->nullable();
            $table->string('conforme')->nullable();
            $table->string('service_charge')->nullable();
            $table->integer('service_total')->nullable();
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
