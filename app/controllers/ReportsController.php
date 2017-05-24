<?php

class ReportsController extends BaseController {

	public function reports_view($id)
	{
		$datatopass  = array(
			'title' 		=> "Reports - Beezmode",
			'page_label'	=> "Reports",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
		);
		return View::make('operations.reports.reports_view',$datatopass);
	}
	public function sales_report($id)
	{
		$datatopass  = array(
			'title' 		=> "Sales Report - Beezmode",
			'page_label'	=> "",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
		);
		return View::make('operations.reports.sales_report',$datatopass);
	}
	public function service_report($id)
	{
		$datatopass  = array(
			'title' 		=> "Sales Report - Beezmode",
			'page_label'	=> "",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
		);
		return View::make('operations.reports.service_report',$datatopass);
	}

}