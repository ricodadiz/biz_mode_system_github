<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('warehouses', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('warehouse_name');
            $table->string('warehouse_address');
            $table->string('status');
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
        Schema::drop('warehouses');
	}

}

