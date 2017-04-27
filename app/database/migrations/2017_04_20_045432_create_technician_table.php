<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnicianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('technicians', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('date');
            $table->string('name');
            $table->string('particular');
            $table->string('transpo');
            $table->string('meals');
            $table->string('accommodation');
            $table->string('others');
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
