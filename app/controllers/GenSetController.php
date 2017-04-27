<?php

class GenSetController extends Controller {

	public function customer_support($id)
	{
		$datatopass  = array(
			'title' 		=> "Customer Support - Beezmode",
			'page_label'	=> "Customer Support",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('admin.gensettings.customer_support',$datatopass);
	}

	public function account_settings($id)
	{
		$datatopass  = array(
			'title' 		=> "Account Settings - Beezmode",
			'page_label'	=> "Account Settings",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('admin.gensettings.account_settings',$datatopass);
	}

	public function company_profile($id)
	{
		$datatopass  = array(
			'title' 		=> "Company Profile - Beezmode",
			'page_label'	=> "Company Profile",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('admin.gensettings.company_profile',$datatopass);
	}

	public function business_issue_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Business Issue - Beezmode",
			'page_label'	=> "Business Issue",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'business_issue' => ReportBusinessIssue::all(),
			'business_issue_count' => ReportBusinessIssue::count(),
			'solved_issue_count' => ReportBusinessIssue::where('status', 'Solved')->count(),
			'pending_issue_count' => ReportBusinessIssue::where('status', 'Pending')->count(),

		);
		return View::make('admin.report_issues.business_issue_list',$datatopass);
	}

	

	public function add_business_report($id)
	{
			$user_name		= strip_tags(Input::get("username1"));
			$user_email 	= strip_tags(Input::get("email1"));
			$date 			= strip_tags(Input::get("date1"));
			$message 		= strip_tags(Input::get("message1"));
			$image			= Input::file('image1');

			$validator = Validator::make(
		    array(
		        'user_name' 	=> $user_name,
		        'user_email' 	=> $user_email,
		        'date' 			=> $date,
		        'message' 		=> $message,
		        'image' 		=> $image,
		    ),
		    array(
		        'user_name'		=> 'regex:/^[(a-zA-Z\s)]+$/u',
		        'user_email' 	=> 'min:3',
		        'date' 			=> 'min:3',
		        'message' 		=> 'required|min:3',
		        'image' 		=> 'mimes:jpeg,jpg,bmp,png,ico|max:3072',
		    )
		);
		
		if($validator->passes())
		{
			if(Input::file('image1'))
				{
					$path = Input::file('image1')->getRealPath();
					$type = pathinfo($path, PATHINFO_EXTENSION);
					$data = file_get_contents($path);
					$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
				}

				$new_business_report = new ReportBusinessIssue;
				$new_business_report->company_id 			= $id;
				$new_business_report->user_name 			= $user_name;
				$new_business_report->user_email 			= $user_email;
				$new_business_report->date 					= $date;
				$new_business_report->message 				= $message;
				
				if(Input::file('image1'))
				{
					$new_business_report->image	=$base64;					
				}

				$new_business_report->save();

				$datatopass = array(
					'message' => "You have succesfully added a Business Report",
				);
				return Redirect::to(URL::previous())->with('business_message',$datatopass);
				}

				if($validator->fails())
				{
					return Redirect::to(URL::previous())->with('business_error',$validator->messages());
				}
	}

	public function update_business_report($issue_id)
	{
			$user_name	= strip_tags(Input::get("username1"));
			$user_email = strip_tags(Input::get("email1"));
			$reply		= strip_tags(Input::get("reply"));
			$status 	= strip_tags(Input::get("status"));

			//dd($reply);
			$validator = Validator::make(
		    array(
		    	'user_name' => $user_name,
		    	'user_email'=> $user_email,
		        'reply' 	=> $reply,
		        'status' 	=> $status,


		    ),
		    array(
		    	'user_name' => 'min:3',
		    	'user_email'=> 'min:3',
		        'reply'		=> 'regex:([0-9a-zA-Z])|min:3',
		        'status' 	=> 'min:3|required',
		    )
		);
		
		if($validator->passes())
		{
				$update_business_report = ReportBusinessIssue::find($issue_id);
				//dd($issue_id);
				$update_business_report->user_name = $user_name;
				$update_business_report->user_email = $user_email;
				$update_business_report->reply = $reply;
				$update_business_report->status = $status;		
				$update_business_report->save();

				//dd($user_email);
				Mail::queue('emails.business_report_email', array('user_name'=>$user_name,'reply' => $reply), function($message) use ($user_email,$user_name)
				{
				
        			$message->to($user_email, $user_name)
        					->subject('Beezmode Solutions');
    			});

				$datatopass = array(
					'message' => "You have succesfully replied",
				);
				return Redirect::to(URL::previous())->with('business_message',$datatopass);
				}

				if($validator->fails())
				{
					return Redirect::to(URL::previous())->with('business_error',$validator->messages());
				}
	}


	public function technical_issue_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Technical Issue - Beezmode",
			'page_label'	=> "Technical Issue",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'technical_issue' => ReportTechnicalIssue::all(),
			'technical_issue_count' => ReportTechnicalIssue::count(),
			'solved_issue_count' => ReportTechnicalIssue::where('status', 'Solved')->count(),
			'pending_issue_count' => ReportTechnicalIssue::where('status', 'Pending')->count(),
		);
		return View::make('admin.report_issues.technical_issue_list',$datatopass);
	}



	public function add_technical_report($id)
	{
			$user_name		= strip_tags(Input::get("username2"));
			$user_email 	= strip_tags(Input::get("email2"));
			$date 			= strip_tags(Input::get("date2"));
			$message 		= strip_tags(Input::get("message2"));
			$image			= Input::file('image2');

			$validator = Validator::make(
		    array(
		        'user_name' 	=> $user_name,
		        'user_email' 	=> $user_email,
		        'date' 			=> $date,
		        'message' 		=> $message,
		        'image' 		=> $image,
		    ),
		    array(
		        'user_name'		=> 'regex:/^[(a-zA-Z\s)]+$/u',
		        'user_email' 	=> 'min:3',
		        'date' 			=> 'min:3',
		        'message' 		=> 'required|min:3',
		        'image' 		=> 'mimes:jpeg,jpg,bmp,png,ico|max:3072',
		    )
		);
		
		if($validator->passes())
		{
			if(Input::file('image2'))
				{
					$path = Input::file('image2')->getRealPath();
					$type = pathinfo($path, PATHINFO_EXTENSION);
					$data = file_get_contents($path);
					$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
				}

				$new_business_report = new ReportTechnicalIssue;
				$new_business_report->company_id 			= $id;
				$new_business_report->user_name 			= $user_name;
				$new_business_report->user_email 			= $user_email;
				$new_business_report->date 					= $date;
				$new_business_report->message 				= $message;
				
				if(Input::file('image2'))
				{
					$new_business_report->image	=$base64;					
				}

				$new_business_report->save();

				$datatopass = array(
					'message' => "You have succesfully added a Business Report",
				);
				return Redirect::to(URL::previous())->with('business_message',$datatopass);
				}

				if($validator->fails())
				{
					return Redirect::to(URL::previous())->with('business_error',$validator->messages());
				}
	}


	public function update_technical_report($report_id)
	{
			$user_name	= strip_tags(Input::get("username2"));
			$user_email = strip_tags(Input::get("email2"));
			$reply		= strip_tags(Input::get("reply"));
			$status 	= strip_tags(Input::get("status"));


			//dd($reply);
			$validator = Validator::make(
		    array(
		        'user_name' => $user_name,
		    	'user_email'=> $user_email,
		        'reply' 	=> $reply,
		        'status' 	=> $status,

		    ),
		    array(
		        'user_name' => 'min:3',
		    	'user_email'=> 'min:3',
		        'reply'		=> 'regex:([0-9a-zA-Z])|min:3',
		        'status' 	=> 'min:3|required',
		    )
		);
		
		if($validator->passes())
		{
				$update_technical_report = ReportTechnicalIssue::find($report_id);
				//dd($issue_id);
				$update_technical_report->user_name = $user_name;
				$update_technical_report->user_email = $user_email;
				$update_technical_report->reply = $reply;
				$update_technical_report->status = $status;		
				$update_technical_report->save();

				Mail::queue('emails.technical_report_email', array('user_name'=>$user_name,'reply' => $reply), function($message) use ($user_email,$user_name)
				{
				
        			$message->to($user_email, $user_name)
        					->subject('Beezmode Solutions');
    			});

				$datatopass = array(
					'message' => "You have succesfully replied",
				);
				return Redirect::to(URL::previous())->with('business_message',$datatopass);
				}

				if($validator->fails())
				{
					return Redirect::to(URL::previous())->with('business_error',$validator->messages());
				}
	}
}

