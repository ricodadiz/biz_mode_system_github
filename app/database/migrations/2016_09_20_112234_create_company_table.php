<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('companies', function ($table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('company_name');
            $table->string('company_code')->unique();
            $table->longText('company_photo')->nullable();
            $table->longText('company_mission')->nullable();
            $table->longText('company_vision')->nullable();
            $table->longText('company_summary')->nullable();                    
            $table->longText('company_address')->nullable();
            $table->string('company_contact')->nullable();
            $table->string('company_tagline');
            $table->longtext('api_username');
            $table->longtext('api_password');
            $table->longtext('api_link');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('company_members', function ($table) {
            $table->increments('id');           
            $table->integer('company_id');
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('company_drag_orders', function($table) {
        	$table->increments('id');
        	$table->integer('user_id');
        	$table->integer('company_id');
        	$table->integer('drag_order');
        	//$table->softDeletes();
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
		Schema::drop('companies');
		Schema::drop('company_members');
		Schema::drop('company_drag_order');
	}

}
