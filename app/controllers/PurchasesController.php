<?php

class PurchasesController extends \BaseController {

	public function bill_view($id)
		{
			$datatopass  = array(
				'title' 		=> "Bill - Beezmode",
				'page_label'	=> "Bill",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'bill'			=> Bills::all(),
				'bill_count'	=> Bills::count(),
			);
			return View::make('operations.purchases.bill_view',$datatopass);
		}

		public function retailer_view($id)
		{
			$datatopass  = array(
				'title' 		=> "Retailers - Beezmode",
				'page_label'	=> "Retailers",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'purchase'		=> Retailer::all(),
				'retailer_count'	=> Retailer::count(),
			);
			return View::make('operations.purchases.retailer_view',$datatopass);
		}

		public function products_services_view($id)
		{
			$datatopass  = array(
				'title' 		=> "Products & Services - Beezmode",
				'page_label'	=> "Products & Services",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'service'		=> ProductsServices::all(),
				'service_count'	=> ProductsServices::count(),
			);
			return View::make('operations.purchases.products_services_view',$datatopass);
		}

		public function add_bill_view($id)
		{
			$datatopass  = array(
				'title' 		=> "Add Bill - Beezmode",
				'page_label'	=> "Add Bill",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'purchase'		=> Retailer::where('company_id',$id)->get(),
				'service'		=> ProductsServices::all(),
				'bill_count'	=> Bills::count(),
			);
			return View::make('operations.purchases.add_bill_view',$datatopass);
		}

		public function add_retailer_view($id)
		{
			$datatopass  = array(
				'title' 		=> "Add Retailer - Beezmode",
				'page_label'	=> "Add Retailer",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'retailer_count'	=> Retailer::count(),
			);
			return View::make('operations.purchases.add_retailer_view',$datatopass);
		}

		public function edit_retailer_view($id,$retailer_id)
		{
			$datatopass  = array(
				'title' 		=> "Edit Retailers - Beezmode",
				'page_label'	=> "Edit Retailers",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'purchase'		=> Retailer::find($retailer_id),
				'retailer_count'	=> Retailer::count(),
			);
			return View::make('operations.purchases.edit_retailer_view',$datatopass);
		}

		public function add_retailer($id)
	{
		$retailer_name = strtoupper(strip_tags(Input::get("retailer-name")));
		$retailer_firstname = strtoupper(strip_tags(Input::get("retailer-firstname")));
		$retailer_lastname = strtoupper(strip_tags(Input::get("retailer-lastname")));
		$retailer_email = strtoupper(strip_tags(Input::get("retailer-email")));
		$retailer_contact = strtoupper(strip_tags(Input::get("retailer-contact")));
		
		$validator = Validator::make(
		    array(
		        'retailer_name' 				=> $retailer_name,
		        'retailer_firstname' 			=> $retailer_firstname,
		        'retailer_lastname' 			=> $retailer_lastname,
		        'retailer_email' 				=> $retailer_email,
		        'retailer_contact' 				=> $retailer_contact,
		      
		    ),
		    array(
		        'retailer_name'				=> 'required|min:3',
		        'retailer_firstname'		=> 'required|min:3',
		        'retailer_lastname'			=> 'required|min:3',
		        'retailer_email'			=> 'required|min:3',
		        'retailer_contact'			=> 'required|min:3',
		   
		    )
		);
		
		if($validator->passes())
		{
			$new_retailer = new Retailer;
			$new_retailer->retailer_name 				= $retailer_name;
			$new_retailer->company_id					= $id;
			$new_retailer->retailer_firstname 			= $retailer_firstname;
			$new_retailer->retailer_lastname 			= $retailer_lastname;
			$new_retailer->retailer_email 				= $retailer_email;
			$new_retailer->retailer_contact 			= $retailer_contact;
			$new_retailer->save();

			$datatopass = array(
				'message' => "You have succesfully added a Retailer, you may now edit the retailer info.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('add_error',$validator->messages());
		}
	}

	public function edit_retailer($id,$retailer_id)
	{
		$retailer_name = strtoupper(strip_tags(Input::get("retailer-name")));
		$retailer_firstname = strtoupper(strip_tags(Input::get("retailer-firstname")));
		$retailer_lastname = strtoupper(strip_tags(Input::get("retailer-lastname")));
		$retailer_email = strtoupper(strip_tags(Input::get("retailer-email")));
		$retailer_contact = strtoupper(strip_tags(Input::get("retailer-contact")));
		
		$validator = Validator::make(
		    array(
		        'retailer_name' 				=> $retailer_name,
		        'retailer_firstname' 			=> $retailer_firstname,
		        'retailer_lastname' 			=> $retailer_lastname,
		        'retailer_email' 				=> $retailer_email,
		        'retailer_contact' 				=> $retailer_contact,
		      
		    ),
		    array(
		        'retailer_name'				=> 'required|min:3',
		        'retailer_firstname'		=> 'required|min:3',
		        'retailer_lastname'			=> 'required|min:3',
		        'retailer_email'			=> 'required|min:3',
		        'retailer_contact'			=> 'required|min:3',
		   
		    )
		);
		
		if($validator->passes())
		{
			$new_retailer = Retailer::find($retailer_id);
			$new_retailer->retailer_name 				= $retailer_name;
			$new_retailer->retailer_firstname 			= $retailer_firstname;
			$new_retailer->retailer_lastname 			= $retailer_lastname;
			$new_retailer->retailer_email 				= $retailer_email;
			$new_retailer->retailer_contact 			= $retailer_contact;
			$new_retailer->save();

			$datatopass = array(
				'message' => "You have succesfully Edited.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('add_error',$validator->messages());
		}
	}

	public function retailer_delete($id,$retailer_id)
	{
		$validator = Validator::make(
		    array(
		        'retailer_delete' => $retailer_id,
		    ),
		    array(
		        'retailer_delete' => 'required',
		    )
		);

		if($validator->passes())
		{
			$retailer_delete 		= Retailer::find($retailer_id);
			$retailer_delete		->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted",
			);
			return Redirect::to(URL::previous())->with('message_delete',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_error',$validator->messages());
		}
	}

	public function add_services_view($id)
	{
		  $datatopass  = array(
			'title' 		=> "Add Products & Service - Beezmode",
			'page_label'	=> "Add Products & Service",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'vats'			=> Vats::where('company_id',$id)->get(),
			'income'		=> Accounts::where('category','Income')->get(),
			'expense'		=> Accounts::where('category','Expense')->get(),
			'service_count'	=> ProductsServices::count(),
			);
			return View::make('operations.purchases.add_services_view',$datatopass);
	}

	public function add_services($id)
	{
		$services_name = strtoupper(strip_tags(Input::get("services-name")));
		$services_price = strtoupper(strip_tags(Input::get("services-price")));
		$services_description = strtoupper(strip_tags(Input::get("services-description")));
		$services_income = strtoupper(strip_tags(Input::get("services-income")));
		$services_expense = strtoupper(strip_tags(Input::get("services-expense")));
		$services_tax = strtoupper(strip_tags(Input::get("services-tax")));
		
		$validator = Validator::make(
		    array(
		        'services_name' 			=> $services_name,
		        'services_description' 		=> $services_description,
		        'services_price' 			=> $services_price,
		        'services_income' 			=> $services_income,
		        'services_expense' 			=> $services_expense,
		        'services_tax'	 			=> $services_tax,
		    ),
		    array(
		        'services_name'				=> 'required|min:3',
		        'services_description'		=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'services_price'			=> 'required|min:2',
		        'services_income'			=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'services_expense'			=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'services_tax'				=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		    )
		);
		
		if($validator->passes())
		{
			$tax = $services_tax ? Vats::find($services_tax)->vat_value : 0;
			$new_services = new ProductsServices;
			$new_services->product_service 				= $services_name;
			$new_services->company_id					= $id;
			$new_services->product_service_description	= $services_description;
			$new_services->price 						= $services_price;
			$new_services->income_account 				= $services_income;
			$new_services->expense_account				= $services_expense;
			$new_services->sales_tax 					= $tax;
			
			$new_services->save();

			$datatopass = array(
				'message' => "You have succesfully added a Product or Service, you may now edit the product or services info.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('add_error',$validator->messages());
		}
	}

	public function service_delete($id,$service_id)
	{
		$validator = Validator::make(
		    array(
		        'service_delete' => $service_id,
		    ),
		    array(
		        'service_delete' => 'required',
		    )
		);

		if($validator->passes())
		{
			$service_delete 		= ProductsServices::find($service_id);
			$service_delete		->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted",
			);
			return Redirect::to(URL::previous())->with('message_delete',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_error',$validator->messages());
		}
	}

	public function edit_services_view($id,$service_id)
		{
			$datatopass  = array(
				'title' 		=> "Edit Product or Service - Beezmode",
				'page_label'	=> "Edit Product or Service",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'service'		=> ProductsServices::find($service_id),
				'vats'			=> Vats::where('company_id',$id)->get(),
				'income'		=> Accounts::where('category','Income')->get(),
				'expense'		=> Accounts::where('category','Expense')->get(),
				'service_count'	=> ProductsServices::count(),
			);
			return View::make('operations.purchases.edit_services_view',$datatopass);
		}


	public function edit_services($id,$service_id)
	{
		$services_name = strtoupper(strip_tags(Input::get("services-name")));
		$services_price = strtoupper(strip_tags(Input::get("services-price")));
		$services_description = strtoupper(strip_tags(Input::get("services-description")));
		$services_income = strtoupper(strip_tags(Input::get("services-income")));
		$services_expense = strtoupper(strip_tags(Input::get("services-expense")));
		$services_tax = strtoupper(strip_tags(Input::get("services-tax")));
		
		$validator = Validator::make(
		    array(
		        'services_name' 			=> $services_name,
		        'services_description' 		=> $services_description,
		        'services_price' 			=> $services_price,
		        'services_income' 			=> $services_income,
		        'services_expense' 			=> $services_expense,
		        'services_tax'	 			=> $services_tax,
		    ),
		    array(
		        'services_name'				=> 'required|min:3',
		        'services_description'		=> 'required|min:3',
		        'services_price'			=> 'required|min:2',
		        'services_income'			=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'services_expense'			=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'services_tax'				=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		    )
		);
		
		if($validator->passes())
		{
			$tax = $services_tax ? Vats::find($services_tax)->vat_value : 0;
			$new_services = ProductsServices::find($service_id);
			$new_services->product_service 				= $services_name;
			$new_services->product_service_description	= $services_description;
			$new_services->price 						= $services_price;
			$new_services->income_account 				= $services_income;
			$new_services->expense_account				= $services_expense;
			$new_services->sales_tax 					= $tax;
			$new_services->save();

			$datatopass = array(
				'message' => "You have succesfully Edited.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}
	}

	public function add_bill($id)
	{
		$bill_retailer =(Input::get("bill-retailer"));
		$bill_date =(Input::get("bill-date"));
		$bill_due_date =(Input::get("bill-due-date"));
		$bill_note =(Input::get("bill-note"));
		$bill_item =(Input::get("bill-item"));
		$bill_category =(Input::get("bill-category"));
		$bill_description =(Input::get("bill-description"));
		$bill_qty =(Input::get("bill-qty"));
		$bill_price =(Input::get("bill-price"));
		$bill_tax =(Input::get("bill-tax"));
		$bill_amount =(Input::get("bill-amount"));
		$bill_total_amount =(Input::get("bill-total-amount"));
		
		$validator = Validator::make(
		    array(
		        'bill_retailer' 				=> $bill_retailer,
		        'bill_date' 					=> $bill_date,
		        'bill_due_date' 				=> $bill_due_date,
		        'bill_note' 					=> $bill_note,
		       
		        ),
		    array(
		        'bill_retailer'				=> 'required',
		        'bill_date'					=> 'required',
		        'bill_due_date'				=> 'required',
		   		'bill_note'					=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		   		'bill_total_amount'			=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',

		   		
		    )
		);
		
		if($validator->passes())
		{
			$new_bill = new Bills;
			$new_bill->bill_retailer 				= Retailer::find($bill_retailer)->retailer_name;
			$new_bill->company_id					= $id;
			$new_bill->bill_date 					= $bill_date;
			$new_bill->bill_due_date 				= $bill_due_date;
			$new_bill->bill_note 					= $bill_note;
			$new_bill->bill_supertotal 				= $bill_total_amount;
				
			$new_bill->save();

			$i=0;
			foreach ($bill_item as $b) {
				$new_bill_child = new Bills2;
				$new_bill_child->bill_id 					= $new_bill->id;
				$new_bill_child->bill_item 					= ProductsServices::find($bill_item[$i])->product_service;
				$new_bill_child->bill_expense_category 		= $bill_category[$i];
				$new_bill_child->bill_description 			= $bill_description[$i];
				$new_bill_child->bill_qty 					= $bill_qty[$i];
				$new_bill_child->bill_price 				= $bill_price[$i];
				$new_bill_child->bill_tax 					= $bill_tax[$i];
				$new_bill_child->bill_amount 				= $bill_amount[$i];
				$new_bill_child->save();
				$i++;
			}

			$datatopass = array(
				'message' => "You have succesfully added a Bill, you may now edit the bill info.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('add_error',$validator->messages());
		}
	}

	public function bill_delete($id,$bill_id)
	{
		$validator = Validator::make(
		    array(
		        'bill_delete' => $bill_id,
		    ),
		    array(
		        'bill_delete' => 'required',
		    )
		);

		if($validator->passes())
		{
			$bill_delete 		= Bills::find($bill_id);
			$bill_delete		->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted",
			);
			return Redirect::to(URL::previous())->with('message_delete',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_error',$validator->messages());
		}
	}

	public function edit_bill_view($id,$bill_id)
		{
			$datatopass  = array(
				'title' 		=> "View Bill - Beezmode",
				'page_label'	=> "View Bill",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'bill'			=> Bills::where('id',$bill_id)->get(),
				'bill2' 		=> Bills2::where('bill_id',$bill_id)->get(),
				'bill_count'	=> Bills::count(),
			);
			return View::make('operations.purchases.edit_bill_view',$datatopass);
		}
}
