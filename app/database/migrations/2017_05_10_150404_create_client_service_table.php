<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients_services', function ($table) {
            $table->increments('id');
            $table->string('service_id');
            $table->string('item');
            $table->string('unit_cost');
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
