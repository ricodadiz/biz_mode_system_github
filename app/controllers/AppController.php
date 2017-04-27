<?php

class AppController extends BaseController {

	public function dashboard($id)
	{
		$username=Companies::find($id)->api_username;		//'nats'
		$password=Companies::find($id)->api_password;		//'09158577170'
		$URL=Companies::find($id)->api_link;				//'http://staroil.joytrademktg.com/api/von1/pos_data'

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$URL);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
		//$result=curl_exec ($ch);
		$result=null;
		curl_close ($ch);

		$days 		= array();
		$earnings 	= array();

		if($result !== null)
		{
			$i = 0;

			foreach (json_decode($result) as $r) {
				$i++;
				$date = new DateTime($r->salesdate);
				array_push($days, [$i, $i]);
			}

			$i = 0;
			foreach (json_decode($result) as $r) {
				$i++;
				array_push($earnings, [$i, (float)$r->total_amount]);
			}
		}
		else
		{
			$alt_sales = OrdersGeneric::all();
			$i = 0;
			foreach ($alt_sales as $s) {
				$i++;
				array_push($days, [$i, $i]);
				array_push($earnings, [$i, $s->paid]);
			}
		}
				

		$event = Calendar::where('user_id',Confide::user()->id)->first();
		if($event){
			$event = json_decode($event->calendar_object);
		}else{
			$event = "[]";
		}
		$datatopass  = array(
			'title' 		=> "Dashboard - Beezmode",
			'page_label'	=> "Dashboard",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'count_company_members'	=> CompanyMember::where('company_id',$id)->count(),
			'count_client'	=> Clients::count(),
			'count_unread_messages'	=> Messages::where('receiver',Confide::user()->id)->where('read_receipt',0)->count(),
			'count_event'	=> $event,
			'count_warehouse' => Warehouse::count(),
			'count_products'	=> Products::where('company_id',$id)->count(),
			'count_roles'	=> Role::where('company_id',$id)->count(),
			'count_delivery'=> Delivery::where('company_id',$id)->count(),
			'count_orders'  => OrdersGeneric::where('company_id',$id)->count(),
			'data_days'		=> json_encode($days),
			'data_earnings' => json_encode($earnings),
		);
		return View::make('in_app_views.dashboard',$datatopass);
	}

	public function company_profile($id)
	{
		$datatopass  = array(
			'title' 		=> "Company Profile - Beezmode",
			'page_label'	=> "Company Profile",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'members_of_company' => CompanyMember::where('company_id',$id)->get(),
			'member_count' 	=> CompanyMember::where('company_id',$id)->count(),
			'product_count' => Products::where('company_id',$id)->count(), 
			'products'		=> Products::where('company_id',$id)->paginate(15),
			// 'total_sales'   => OrdersGeneric::where('company_id',$id)->sum('sales'),
		);
		return View::make('app.company_profile',$datatopass);
	}

	public function company_members_list($id)
	{
		$members_of_company = CompanyMember::where("company_id",$id)->get();
		$company_code = Companies::where('id',$id)->first()->company_code;
		
		$datatopass  = array(
			'title' 				=> "Company Members - Beezmode",
			'page_label'			=> "Company Member List",
			'page_header' 			=> Companies::where('id',$id)->first()->company_name,
			'company' 				=> Companies::where('id',$id)->first(),
			'user'					=> Confide::user(),
			'members_of_company' 	=> $members_of_company,
			'new_users'				=> User::where('company_code',$company_code)->get(),
			'roles'			 		=> Role::where('company_id',$id)->lists('id'),
			'company_code'			=> $company_code
		);
		return View::make('app.company_members_list',$datatopass);
	}

	public function change_company_code($id)
	{
		$company_code = Input::get("company_code");
		$validator = Validator::make(
		    array(
		        'company_code' => $company_code,
		    ),
		    array(
		        'company_code' => 'required|unique:companies,company_code',
		    )
		);

		if($validator->passes())
		{
			$query = Companies::find(1);
			$query->company_code = $company_code;
			$query->save();

			$datatopass = array(
				'message_c_code' => "You Have sucessfully added the code!",
			);
			return Redirect::to(URL::previous());
		}

		if($validator->fails())
		{
			return Redirect::to('company_members_list')->with('error',$validator->messages());
		}
	}

 	public function add_company_members($id)
 	{
		$users_to_add = Input::get("users_to_add");
		if($users_to_add){
			foreach ($users_to_add as $u) {
				$add_member = new CompanyMember;
				$add_member->company_id = $id;
				$add_member->user_id	= $u;
				$add_member->save();
			}
			$datatopass = array(
				'message_add_member' => "You have sucessfully add new users!",
			);
			return Redirect::to(URL::previous())->with("message_add",$datatopass);
		}
		else
		{
			$datatopass = array(
				'message_add_member_error' => "Data Required!",
			);
			return Redirect::to(URL::previous())->with("message_add",$datatopass);	
		}
 	}

	public function company_list_view()
	{
			$check_membership = CompanyMember::where('user_id',Confide::user()->id)->lists('company_id');
			/*		Changed to Global IOC Procedures
					
					$company_code = Companies::where('company_code',Confide::user()->company_code)->first();
			        $owner_trial = User::find($company_code->owner_id)->trial_ends_at;
			        $owner_subscription_end = User::find($company_code->owner_id)->subscription_ends_at;

			        $checking_trial = $owner_trial->isFuture(); // true equals valid

			        if($owner_subscription_end == NULL){
			        	$checking_subscription = false;	
			        }
			        else
			        {
				        $checking_subscription = $owner_subscription_end->isFuture(); // true equals valid
			        }

			        $validity_of_usage = ($checking_trial || $checking_subscription);

			        if($validity_of_usage)
			        {*/
			$datatopass  = array(
				'companies' 	=> Companies::whereIn('id',$check_membership)->get(),
				'drag_order'	=> CompanyDragOrder::where('user_id',Confide::user()->id)->get(),
				
			);

			return View::make('app.company_list',$datatopass);
	       /* }
	        else
	        {
	        	return Redirect::to("pricing");
	        }*/
	}

	public function add_company(){

		$company_name = strip_tags(Input::get("company_name"));
		$company_code = strip_tags(Input::get("company_code"));

		$validator = Validator::make(
		    array(
		        'company_name' => $company_name,
		        'company_code' => $company_code,
		    ),
		    array(
		        'company_name' => 'required|min:3',
		        'company_code' => 'required|min:3',
		    )
		);

		if($validator->passes())
		{
			$query = new Companies;
			$query->owner_id 		= Confide::user()->id;
			$query->company_name 	= $company_name;
			$query->company_code 	= $company_code;
			$query->save();

			$company_member = new CompanyMember;
			$company_member->company_id = $query->id;
			$company_member->user_id	= Confide::user()->id;
			$company_member->save();

			$owner = new Role;
			$owner->name = 'Owner';
			$owner->company_id = $query->id;
			$owner->save();

			$user = User::where('id',Confide::user()->id)->first();
			$user->attachRole($owner);

			$owner->perms()->sync(array(1,2,3,4));

			$new_drag_order 				= new CompanyDragOrder;
			$new_drag_order->user_id 		= Confide::user()->id;
			$new_drag_order->company_id 	= $query->id;
			$new_drag_order->drag_order 	= -1;
			$new_drag_order->save();

			return Redirect::to('company');
		}

		$datatopass = array(
				'message' => "You have succesfully added a company.",
			);
			return Redirect::to('company')->with('message_success',$datatopass);

		if($validator->fails())
		{
			return Redirect::to('company')->with('error',$validator->messages());
		}
		
	}

	public function update_company($id)
	{
		$company_name = strip_tags(Input::get("company_name"));
		
		$validator = Validator::make(
		    array(
		        'company_name' => $company_name,
		    ),
		    array(
		        'company_name' => 'required|min:3',
		    )
		);

		if($validator->passes())
		{
			$query = Companies::find($id);
			$prev = Companies::find($id)->company_name;
			$query->company_name = $company_name;
			$query->save();

			$datatopass = array(
				'message' => "You Have sucessfully updated ".$prev." to ".$company_name,
				'id' => $id
			);
			return Redirect::to('company')->with('message_update',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to('company')->with('error',$validator->messages());
		}
	}

	public function delete_company($id)
	{
		$query = Companies::find($id);
		$query->delete();

		$company_member = CompanyMember::where('company_id',$id)->delete();
		$roles 			= Role::where('company_id',$id)->get();

		/*delete dependencies*/
		foreach ($roles as $r) {
			DB::table('assigned_roles')->where('role_id',$r->id)->delete();
		}
		$delete_roles = Role::where('company_id',$id)->delete();
		return Redirect::to('company')->with('message',"Sucessfully Deleted!");
	}

	public function company_drag_order()
	{
		$drag_order = Input::get("drag_order");
		$order_int 	= 1;
		$delete_old_order = CompanyDragOrder::where("user_id",Confide::user()->id)->delete();
		/*dd($drag_order);*/
		
		foreach ($drag_order as $d) {
			$new_drag_order 				= new CompanyDragOrder;
			$new_drag_order->user_id 		= Confide::user()->id;
			$new_drag_order->company_id 	= $d;
			$new_drag_order->drag_order 	= $order_int;
			$new_drag_order->save();
			$order_int++;
		}
	}

	public function user_profile($id,$username)
	{
		$datatopass  = array(
			'title' 		=> "User Profile - Beezmode",
			'page_label'	=> "User Profile",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'profile_view'  => User::where('username',$username)->first(),
		);
		return View::make('app.user_profile',$datatopass);
	}

	public function user_profile_settings($id)
	{

		$datatopass  = array(
			'title' 		=> "User Profile Settings - Beezmode",
			'page_label'	=> "User Profile Settings",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()

		);

		//dd(1);
		return View::make('app.user_profile_settings',$datatopass);
	}

	public function update_user_profile() {

			$user_fname 		= strip_tags(Input::get("profile-firstname"));
			$user_lname 		= strip_tags(Input::get("profile-lastname"));
			$user_position 		= strip_tags(Input::get("profile-position"));
			$user_bio 			= strip_tags(Input::get("profile-bio"));
			$user_location 		= strip_tags(Input::get("profile-city"));
			$user_age 			= strip_tags(Input::get("profile-age"));
			$user_profile_photo = Input::file('profile_photo');

			$validator = Validator::make(
			    array(
			        'first_name' 	=> $user_fname,
			        'last_name'		=> $user_lname,
			        'position'		=> $user_position,
			        'bio'			=> $user_bio,
			        'location'		=> $user_location,
			        'age'			=> $user_age,
			        'profile_photo' => $user_profile_photo,
			    ),
			    array(
			        'first_name' 	=> 'regex:/^[(a-zA-Z\s)]+$/u',
			        'last_name'		=> 'regex:/^[(a-zA-Z\s)]+$/u',
			        'position'		=> 'regex:([0-9a-zA-Z])',
			        'bio' 			=> 'regex:([0-9a-zA-Z])',
			        'location' 		=> 'regex:([a-zA-Z])',
			        'age' 			=> 'numeric',
			        'profile_photo' => 'mimes:jpeg,jpg,bmp,png,ico|max:3072'
			    )
			);

			if($validator->passes())
			{
				/*Image Process - converts locally uploaded file to base64 BLOB*/
				if(Input::file('profile_photo'))
				{
					$path = Input::file('profile_photo')->getRealPath();
					$type = pathinfo($path, PATHINFO_EXTENSION);
					$data = file_get_contents($path);
					$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
				}

					$add_user_profile = User::find(Confide::user()->id);
					$add_user_profile->user_firstname	=$user_fname;
					$add_user_profile->user_lastname	=$user_lname;
					$add_user_profile->user_position	=$user_position;
					$add_user_profile->user_bio			=$user_bio;
					$add_user_profile->user_address	    =$user_location;
					$add_user_profile->user_age			=$user_age;

				/*Image Process - Parallel*/
				if(Input::file('profile_photo'))
				{
					$add_user_profile->profile_photo	=$base64;					
				}

				/*Break Query Save*/
				$add_user_profile->save();

				$datatopass = array(
					'message' => "You have succesfully edited your profile!",
				);

				return Redirect::to(URL::previous())->with('profile_message',$datatopass);
			}

			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('profile_error',$validator->messages());
			}
	}

	public function update_company_profile($id){
			$company_photo = Input::file('company_logo');
			$validator = Validator::make(
			    array(
			        'company_logo' => $company_photo,
			    ),
			    array(
			        'company_logo' => 'image|mimes:jpeg,jpg,bmp,png,ico|max:3072'
			    )
			);
			if($validator->passes())
			{
				/*Image Process - converts locally uploaded file to base64 BLOB*/
				if(Input::file('company_logo'))
				{
					$path = Input::file('company_logo')->getRealPath();
					$type = pathinfo($path, PATHINFO_EXTENSION);
					$data = file_get_contents($path);
					$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
				}

				$add_company_profile = Companies::find($id);
				/*Image Process - Parallel*/
				if(Input::file('company_logo'))
				{
					$add_company_profile->company_photo	=$base64;					
				}

				/*Break Query Save*/
				$add_company_profile->save();

				$datatopass = array(
					'message' => "You have succesfully edited your company profile photo!",
				);

				return Redirect::to(URL::previous())->with('company_profile_message',$datatopass);
			}

			if($validator->fails())
			{	
				return Redirect::to(URL::previous())->with('company_profile_error',$validator->messages());
			}			

	}

	public function update_company_mission_vision($id){

			$company_mission = strip_tags(Input::get("company_mission"));
			$company_vision  = strip_tags(Input::get("company_vision"));

			$validator = Validator::make(
			    array(
			        'company_mission' 	=> $company_mission,
			        'company_vision'	=> $company_vision,
			    ),
			    array(
			        'company_mission' 	=> 'regex:([0-9a-zA-Z])',
			        'company_vision'	=> 'regex:([0-9a-zA-Z])',
			    )
			);

			if($validator->passes())
			{
				
				$update_company_mission_vision = Companies::find($id);
				$update_company_mission_vision->company_mission	=$company_mission;
				$update_company_mission_vision->company_vision	=$company_vision;
				$update_company_mission_vision->save();

				$datatopass = array(
					'message' => "You have succesfully edited your company mission and vision!",
				);

				return Redirect::to(URL::previous())->with('company_profile_mission_success',$datatopass);
			}
			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('company_profile_mission_error',$validator->messages());
			}		
		
	}

	public function update_company_summary($id){

			$company_summary = strip_tags(Input::get("company_summary"));

			$validator = Validator::make(
			    array(
			        'company_summary' 	=> $company_summary,
			    ),
			    array(
			        'company_summary' 	=> 'regex:([0-9a-zA-Z])',
			    )
			);

			if($validator->passes())
			{
				
				$update_company_summary = Companies::find($id);
				$update_company_summary->company_summary = $company_summary;
				$update_company_summary->save();

				$datatopass = array(
					'message' => "You have succesfully edited your company summary!",
				);

				return Redirect::to(URL::previous())->with('company_profile_success_summary',$datatopass);
			}
			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('company_profile_error_summary',$validator->messages());
			}	
	}

	public function update_company_address($id){

			$company_address = strip_tags(Input::get("company_address"));

			$validator = Validator::make(
			    array(
			        'company_address' 	=> $company_address,
			    ),
			    array(
			        'company_address' 	=> 'regex:([0-9a-zA-Z])',
			    )
			);

			if($validator->passes())
			{
				
				$update_company_address = Companies::find($id);
				$update_company_address->company_address = $company_address;
				$update_company_address->save();

				$datatopass = array(
					'message' => "You have succesfully edited your company address!",
				);

				return Redirect::to(URL::previous())->with('company_profile_success_address',$datatopass);
			}
			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('company_profile_error_address',$validator->messages());
			}
	}

	public function update_company_contact($id){

			$company_contact = strip_tags(Input::get("company_contact"));

			$validator = Validator::make(
			    array(
			        'company_contact' 	=> $company_contact,
			    ),
			    array(
			        'company_contact' 	=> 'regex:([0-9a-zA-Z])',
			    )
			);

			if($validator->passes())
			{
				
				$update_company_contact = Companies::find($id);
				$update_company_contact->company_contact = $company_contact;
				$update_company_contact->save();

				$datatopass = array(
					'message' => "You have succesfully edited your company contact!",
				);

				return Redirect::to(URL::previous())->with('company_profile_success_contact',$datatopass);
			}
			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('company_profile_error_contact',$validator->messages());
			}
	}

	public function gas_sales($id)
	{
		$username='nats';
		$password='09158577170';
		$URL='http://staroil.joytrademktg.com/api/von1/pos_data';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$URL);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
		$result=curl_exec ($ch);
		curl_close ($ch);

		$days 		= array();
		$earnings 	= array();

		$i = 0;
		foreach (json_decode($result) as $r) {
			$i++;
			$date = new DateTime($r->salesdate);
			array_push($days, [$i, $i]);
		}

		$i = 0;
		foreach (json_decode($result) as $r) {
			$i++;
			array_push($earnings, [$i, (float)$r->total_amount]);
		}

		$datatopass  = array(
			'title' 		=> "POS Sales - Beezmode",
			'page_label'	=> "POS Sales",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'pos_data'		=> json_decode($result),
			'data_days'		=> json_encode($days),
			'data_earnings' => json_encode($earnings)
		);

		return View::make('in_app_views.pos_api',$datatopass);
	}

	public function message($id){
		$datatopass  = array(
			'title' 		=> "Message - Beezmode",
			'page_label'	=> "Messages",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'inbox'			=> Messages::where('receiver',Confide::user()->id)->get(),
			'sent'			=> Messages::where('sender',Confide::user()->id)->get(),
			'members_of_company' => CompanyMember::where('company_id',$id)->get()
			//'sender'		=> User::where('username',$username)->first(),
			//'inbox'			=> Messages::where('receiver',Confide::user()->id)->distinct()->get()
		);

		return View::make('app.message',$datatopass);
	}

	public function send_message(){

		$message = strip_tags(Input::get("message"));
		$receiver = strip_tags(Input::get("receiver"));

		$validator = Validator::make(
		    array(
		        'message' 	=> $message,
		    ),
		    array(
		        'message' 	=> 'regex:([0-9a-zA-Z])',
		    )
		);

		if($validator->passes())
		{
			$send_message = new Messages;
			$send_message->content 	= $message;
			$send_message->sender  	= Confide::user()->id;
			$send_message->receiver = $receiver;
			$send_message->read_receipt = 0;
			$send_message->save();
		}
	}
	
	public function read_message(){
		$id = Input::get("msg_id");

		$read_message = Messages::find($id);
		$read_message->read_receipt = 1;
		$read_message->save();

		return 1;
	}

	public function get_your_message(){

		$sender		= Confide::user()->id;
		$receiver 	= strip_tags(Input::get("receiver"));

		$validator = Validator::make(
		    array(
		    	'sender'	=> $sender,
		        'receiver' 	=> $receiver
		    ),
		    array(
		    	'sender'	=> 'regex:([0-9a-zA-Z])',
		        'receiver' 	=> 'regex:([0-9a-zA-Z])'
		    )
		);

		if($validator->passes())
		{

			$message = Messages::where('sender',$sender)->where('receiver',$receiver)->get();
			return $message;
		}

	}

	public function get_notyour_message(){

		$sender		= strip_tags(Input::get("receiver"));
		$receiver 	= Confide::user()->id;

		$validator = Validator::make(
		    array(
		    	'sender'	=> $sender,
		        'receiver' 	=> $receiver
		    ),
		    array(
		    	'sender'	=> 'regex:([0-9a-zA-Z])',
		        'receiver' 	=> 'regex:([0-9a-zA-Z])'
		    )
		);

		if($validator->passes())
		{

			$message = Messages::where('sender',$sender)->where('receiver',$receiver)->get();
			return $message;
		}

	}
	
	public function payment() //Args ($id)
	{
		// TODO Put Condition if stripe, or DragonPay
		$user = Confide::user();
	
		$user->subscription('basic')->create(Input::get('stripeToken'));
		$user->trial_ends_at = Carbon::now();
		$user->subscription_ends_at = Carbon::now()->addDays(30);
		$user->save();

		return Redirect::to(URL::to('pricing'));

		/* OLD CODE!
		$datatopass  = array(
			'title' 		=> "Payment - Beezmode",
			'page_label'	=> "Payments",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
		);

		return View::make('app.payment',$datatopass);*/
	}

	public function login_encrypt()
	{
		return View::make("app.admin_management");
	}

	public function login_encryptor()
	{
		$username_hash = 'fibonacci';
		$password_hash = '11235813';

		$inp_un = Input::get('username');
		$inp_pw = Input::get('password');
		if($inp_un == $username_hash)
			if($inp_pw == $password_hash)
				Session::push('TPM1337s', 'ggmuthafuckas');
				$datatopass = array(
					'companies' => Companies::all(), 
				);
				return View::make('admin.pos_admin',$datatopass);
	}

	public function update_api_connection()
	{
		if(Session::has('TPM1337s'))
		{
			$update 				= Companies::find(Input::get('id'));
			$update->api_link 		= Input::get('api_link');
			$update->api_username 	= Input::get('api_username');
			$update->api_password 	= Input::get('api_password');
			$update->save();

			Session::forget('TPM1337s');

			return Redirect::to('/');
		}
		else
		{
			echo "Unauthorized!";
		}
	}
}