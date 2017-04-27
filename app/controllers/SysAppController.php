<?php

class SysAppController extends Controller {

	public function calendar($id)
	{
		$datatopass  = array(
			'title' 		=> "Calendar - Beezmode",
			'page_label'	=> "Calendar",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('sysapp.calendar',$datatopass);
	}

	public function update_calendar($id)
	{
		$validate = Calendar::where('user_id',Confide::user()->id)->first();
		if($validate)
		{
			$calendar = $validate;
			$calendar->user_id			= Confide::user()->id;
			$calendar->calendar_object 	= json_encode(Input::get("collections"));
			$calendar->save();
		}
		else
		{
			$calendar = new Calendar;
			$calendar->user_id			= Confide::user()->id;
			$calendar->calendar_object 	= json_encode(Input::get("collections"));
			$calendar->save();
		}
	}

	public function get_events()
	{
		$events = Calendar::where('user_id',Confide::user()->id)->first();
		return json_decode($events->calendar_object);
	}
	// public function umgt_profiles($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Profiles - User Management - Bizmode",
	// 		'page_label'	=> "UMGT Profiles",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('sysapp.umgt_profiles',$datatopass);
	// }
}

