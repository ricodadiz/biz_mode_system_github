<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientList extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('client_company_name');
            $table->string('client_customer_name');
            $table->string('client_billing_address');
            $table->string('client_shipping_address');
            $table->string('client_contact_number');
            $table->string('client_contact_person');
            $table->string('client_email_address');
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
        Schema::drop('client');
	}

}
