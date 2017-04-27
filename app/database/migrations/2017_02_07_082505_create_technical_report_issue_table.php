<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnicalReportIssueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_technical_issues', function ($table) {
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
		Schema::drop('report_technical_issue');
	}

}
