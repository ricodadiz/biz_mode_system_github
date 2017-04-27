<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessReportIssueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_business_issues', function ($table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('date');
            $table->longText('message')->nullable();
            $table->longText('image')->nullable();
            $table->longText('reply')->nullable();
            $table->string('status')->nullable();
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
		Schema::drop('report_business_issues');
		
	}

}
