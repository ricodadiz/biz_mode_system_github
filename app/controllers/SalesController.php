<?php

class SalesController extends Controller {

//===== SALES =====
	public function sales_summary($id)
	{
		$datatopass  = array(
			'title' 		=> "Sales Summary - Beezmode",
			'page_label'	=> "Sales Summary",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('operations.sales.sales_summary',$datatopass);
	}

	public function sales_settings($id)
	{
		$datatopass  = array(
			'title' 		=> "Sales Settings - Beezmode",
			'page_label'	=> "Sales Settings",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'units'			=> Units::where('company_id',$id)->get(),
			'vats'			=> Vats::where('company_id',$id)->get(),
			'payments'		=> Payments::where('company_id',$id)->get()
		);
		return View::make('operations.sales.sales_settings',$datatopass);
	}

    public function add_unit($id)
    {
        $unit_name = strtoupper(strip_tags(Input::get("add-unit")));
        
        $validator = Validator::make(
            array(
                'unit_name' => $unit_name,
            ),
            array(
                'unit_name' => 'required|min:3',
            )
        );
        
        if($validator->passes())
        {
            $new_unit = new Units;
            $new_unit->unit_name    = $unit_name;
            $new_unit->company_id       = $id;
            $new_unit->status           = 'Active';
            $new_unit->save();

            $datatopass = array(
                'message' => "You have succesfully added : <b>'".$unit_name."'</b> as a new unit, you may now edit this unit.",
                'tab'     => "#tab-unit"
            );
            return Redirect::to(URL::previous())->with('message_add_unit',$datatopass);
        }

        if($validator->fails())
        {
            $datatopass = array(
                'messages'=> $validator->messages(),
                'tab'     => "#tab-unit"
            );
            return Redirect::to(URL::previous())->with('add_error_unit',$datatopass);
        }
    }

    public function edit_unit()
    {
        $id = Input::get("existing_unit");
        $unit_name  = strtoupper(strip_tags(Input::get("new_unit")));
        
        $validator = Validator::make(
            array(
                'unit_name' => $unit_name,
            ),
            array(
                'unit_name' => 'required|min:3',
            )
        );
        
        if($validator->passes())
        {
            $new_unit               = Units::find($id);
            $prev                   = $new_unit->unit_name;
            $new_unit->unit_name    = $unit_name;
            $new_unit->save();

            $datatopass = array(
                'message' => "You have succesfully changed : <b>'".$prev."'</b> to <b>'".$unit_name."'</b>",
                'tab'     => "#tab-unit"
            );
            return Redirect::to(URL::previous())->with('message_edit_unit',$datatopass);
        }

        if($validator->fails())
        {
            $datatopass = array(
                'messages'=> $validator->messages(),
                'tab'     => "#tab-unit"
            );
            return Redirect::to(URL::previous())->with('edit_error_unit',$datatopass);
        }
    }

    public function delete_unit()
    {
        //dd(Input::all());
        $id         = Input::get("delete_unit");

        $validator = Validator::make(
            array(
                'unit_name' => $id,
            ),
            array(
                'unit_name' => 'required',
            )
        );

        if($validator->passes())
        {
            $delete_unit    = Units::find($id);
            $prev           = $delete_unit->unit_name;
            $delete_unit->delete();
            $datatopass = array(
                'message' => "You have succesfully deleted : <b>'".$prev."'</b>",
                'tab'     => "#tab-unit"
            );
            return Redirect::to(URL::previous())->with('message_delete_unit',$datatopass);
        }

        if($validator->fails())
        {
            $datatopass = array(
                'messages'=> $validator->messages(),
                'tab'     => "#tab-unit"
            );
            return Redirect::to(URL::previous())->with('delete_error_unit',$datatopass);
        }
    }

	public function add_vat($id)
	{
		$vat_value = strtoupper(strip_tags(Input::get("add-vat")));
		
		$validator = Validator::make(
		    array(
		        'vat_value' => $vat_value,
		    ),
		    array(
		        'vat_value' => 'required|regex:([0-9])',
		    )
		);
		
		if($validator->passes())
		{
			$new_vat = new Vats;
			$new_vat->vat_value 	= $vat_value;
			$new_vat->company_id 	= $id;
			$new_vat->status 		= 'Active';
			$new_vat->save();

			$datatopass = array(
				'message' => "You have succesfully added : <b>'".$vat_value."'</b> as a new vat, you may now edit this vat.",
				'tab'	  => "#tab-vat"
			);
			return Redirect::to(URL::previous())->with('message_add_vat',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-vat"
			);
			return Redirect::to(URL::previous())->with('add_error_vat',$datatopass);
		}
	}

	public function edit_vat()
	{
		$id	= Input::get("existing_vat");
		$vat_value 	= strtoupper(strip_tags(Input::get("new_vat")));
		
		$validator = Validator::make(
		    array(
		        'vat_value' => $vat_value,
		    ),
		    array(
		        'vat_value' => 'required|regex:([0-9])',
		    )
		);
		
		if($validator->passes())
		{
			$new_vat 				= Vats::find($id);
			$prev 					= $new_vat->vat_value;
			$new_vat->vat_value 	= $vat_value;
			$new_vat->save();

			$datatopass = array(
				'message' => "You have succesfully changed : <b>'".$prev."'</b> to <b>'".$vat_value."'</b>",
				'tab'	  => "#tab-vat"
			);
			return Redirect::to(URL::previous())->with('message_edit_vat',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-vat"
			);
			return Redirect::to(URL::previous())->with('edit_error_vat',$datatopass);
		}
	}

	public function delete_vat()
	{
		//dd(Input::all());
		$id 		= Input::get("delete_vat");

		$validator = Validator::make(
		    array(
		        'vat_value' => $id,
		    ),
		    array(
		        'vat_value' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_vat 	= Vats::find($id);
			$prev   		= $delete_vat->vat_value;
			$delete_vat->delete();
			$datatopass	= array(
				'message' => "You have succesfully deleted : <b>'".$prev."'</b>",
				'tab'	  => "#tab-vat"
			);
			return Redirect::to(URL::previous())->with('message_delete_vat',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-vat"
			);
			return Redirect::to(URL::previous())->with('delete_error_vat',$datatopass);
		}
	}

	public function add_payment($id)
	{
		$payment_name = strtoupper(strip_tags(Input::get("add-payment")));
		
		$validator = Validator::make(
		    array(
		        'payment_name' => $payment_name,
		    ),
		    array(
		        'payment_name' => 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_payment = new Payments;
			$new_payment->payment_name 		= $payment_name;
			$new_payment->company_id 		= $id;
			$new_payment->status 			= 'Active';
			$new_payment->save();

			$datatopass = array(
				'message' => "You have succesfully added : <b>'".$payment_name."'</b> as a new payment, you may now edit this payment.",
				'tab'	  => "#tab-payment"
			);
			return Redirect::to(URL::previous())->with('message_add_payment',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-payment"
			);
			return Redirect::to(URL::previous())->with('add_error_payment',$datatopass);
		}
	}

	public function edit_payment()
	{
		$id	= Input::get("existing_payment");
		$payment_name 	= strtoupper(strip_tags(Input::get("new_payment")));
		
		$validator = Validator::make(
		    array(
		        'payment_name' => $payment_name,
		    ),
		    array(
		        'payment_name' => 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_payment 					= Payments::find($id);
			$prev 							= $new_payment->payment_name;
			$new_payment->payment_name 		= $payment_name;
			$new_payment->save();

			$datatopass = array(
				'message' => "You have succesfully changed : <b>'".$prev."'</b> to <b>'".$payment_name."'</b>",
				'tab'	  => "#tab-payment"
			);
			return Redirect::to(URL::previous())->with('message_edit_payment',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-payment"
			);
			return Redirect::to(URL::previous())->with('edit_error_payment',$datatopass);
		}
	}

	public function delete_payment()
	{
		//dd(Input::all());
		$id 		= Input::get("delete_payment");

		$validator = Validator::make(
		    array(
		        'payment_name' => $id,
		    ),
		    array(
		        'payment_name' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_payment 	= Payments::find($id);
			$prev   		= $delete_payment->payment_name;
			$delete_payment->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted : <b>'".$prev."'</b>",
				'tab'	  => "#tab-payment"
			);
			return Redirect::to(URL::previous())->with('message_delete_payment',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-payment"
			);
			return Redirect::to(URL::previous())->with('delete_error_payment',$datatopass);
		}
	}


	public function alldocs_sales($id)
	{
		$datatopass  = array(
			'title' 		=> "Sales Documents - Beezmode",
			'page_label'	=> "All Documents",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('operations.sales.documents.alldocs_sales',$datatopass);
	}

	public function approval_sales($id)
	{
		$datatopass  = array(
			'title' 		=> "For Approval - Beezmode",
			'page_label'	=> "Waiting for Approval",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('operations.sales.documents.approval_sales',$datatopass);
	}

	public function payment_sales($id)
	{
		$datatopass  = array(
			'title' 		=> "For Payment - Beezmode",
			'page_label'	=> "Waiting for Payments",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('operations.sales.documents.payment_sales',$datatopass);
	}

	public function invoice_sales($id)
	{
		$datatopass  = array(
			'title' 		=> "Repeating Invoice - Beezmode",
			'page_label'	=> "Repeating Invoice",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('operations.sales.documents.invoice_sales',$datatopass);
	}

	public function reports_sales($id)
	{
		$datatopass  = array(
			'title' 		=> "Sales Report - Beezmode",
			'page_label'	=> "Sales Report",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('operations.sales.documents.reports_sales',$datatopass);
	}

	public function client_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Client List - Beezmode",
			'page_label'	=> "Client List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'client'		=> Clients::where('company_id',$id)->get(),
			'client_count'	=> Clients::where('company_id', $id)->count(),
			'client_order_count' => OrdersGeneric::where('company_id',$id)->count(),
		);
		return View::make('operations.sales.clients.client_list',$datatopass);
	}

	public function client_edit_view($id,$client_id)
	{
		$datatopass  = array(
			'title' 		=> "Update Client - Beezmode",
			'page_label'	=> "Update Client",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'client'		=> Clients::where('company_id',$id)->where('id',$client_id)->get(),
			'client_count'  => Clients::where('company_id', $id)->count(),

		);
		return View::make('operations.sales.clients.client_edit_view',$datatopass);
	}

	public function client_delete($id,$client_id)
	{
		$validator = Validator::make(
		    array(
		        'client_delete' => $client_id,
		    ),
		    array(
		        'client_delete' => 'required',
		    )
		);

		if($validator->passes())
		{
			$client_delete 		= Clients::find($client_id);
			$client_delete		->delete();
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

	public function add_client_view($id)
	{
		$datatopass  = array(
			'title' 		=> "Add Client - Beezmode",
			'page_label'	=> "Add Client",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'client'		=> Clients::where('company_id',$id)->get(),
			'client_count'  => Clients::where('company_id' , $id)->count(),
		);
		return View::make('operations.sales.clients.add_client_view',$datatopass);
	}

	public function add_client($id)
	{
		$client_company_name = strtoupper(strip_tags(Input::get("company-name")));
		$client_customer_name = strtoupper(strip_tags(Input::get("customer-name")));
		$client_billing_address = strtoupper(strip_tags(Input::get("client-billing")));
		$client_shipping_address = strtoupper(strip_tags(Input::get("client-shipping")));
		$client_contact_number = strtoupper(strip_tags(Input::get("client-contact")));
		$client_contact_person = strtoupper(strip_tags(Input::get("client-contact-person")));
		$client_email_address = strtoupper(strip_tags(Input::get("client-email")));
		
		$validator = Validator::make(
		    array(
		        'client_company_name' 		=> $client_company_name,
		        'client_customer_name' 		=> $client_customer_name,
		        'client_billing_address' 	=> $client_billing_address,
		        'client_shipping_address' 	=> $client_shipping_address,
		        'client_contact_number' 	=> $client_contact_number,
		        'client_contact_person' 	=> $client_contact_person,
		        'client_email_address' 		=> $client_email_address,
		    ),
		    array(
		    	'client_company_name' 		=> 'required|min:3',
		        'client_customer_name' 		=> 'required|min:3',
		        'client_billing_address' 	=> 'required|min:3',
		        'client_shipping_address' 	=> 'required|min:3',
		        'client_contact_number' 	=> 'required|min:3',
		        'client_contact_person' 	=> 'required|min:3',
		        'client_email_address' 		=> 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_client = new Clients;
			$new_client->client_company_name 		= $client_company_name;
			$new_client->client_customer_name 		= $client_customer_name;
			$new_client->client_billing_address 	= $client_billing_address;
			$new_client->client_shipping_address 	= $client_shipping_address;
			$new_client->client_contact_number 		= $client_contact_number;
			$new_client->client_contact_person 		= $client_contact_person;
			$new_client->client_email_address 		= $client_email_address;
			$new_client->company_id 				= $id;
			$new_client->status 					= 'Active';
			$new_client->save();

			$datatopass = array(
				'message' => "You have succesfully added a Client, you may now edit the client info.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('add_error',$validator->messages());
		}
	}

	public function client_edit($id,$client_id)
	{
		$client_company_name = strtoupper(strip_tags(Input::get("company-name")));
		$client_customer_name = strtoupper(strip_tags(Input::get("customer-name")));
		$client_billing_address = strtoupper(strip_tags(Input::get("client-billing")));
		$client_shipping_address = strtoupper(strip_tags(Input::get("client-shipping")));
		$client_contact_number = strtoupper(strip_tags(Input::get("client-contact")));
		$client_contact_person = strtoupper(strip_tags(Input::get("client-contact-person")));
		$client_email_address = strtoupper(strip_tags(Input::get("client-email")));
		
		$validator = Validator::make(
		    array(
		        'client_company_name' 		=> $client_company_name,
		        'client_customer_name' 		=> $client_customer_name,
		        'client_billing_address' 	=> $client_billing_address,
		        'client_shipping_address' 	=> $client_shipping_address,
		        'client_contact_number' 	=> $client_contact_number,
		        'client_contact_person' 	=> $client_contact_person,
		        'client_email_address' 		=> $client_email_address,
		    ),
		    array(
		    	'client_company_name' 		=> 'required|min:3',
		        'client_customer_name' 		=> 'required|min:3',
		        'client_billing_address' 	=> 'required|min:3',
		        'client_shipping_address' 	=> 'required|min:3',
		        'client_contact_number' 	=> 'required|min:3',
		        'client_contact_person' 	=> 'required|min:3',
		        'client_email_address' 		=> 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_client = Clients::find($client_id);
			$new_client->client_company_name 		= $client_company_name;
			$new_client->client_customer_name 		= $client_customer_name;
			$new_client->client_billing_address 	= $client_billing_address;
			$new_client->client_shipping_address 	= $client_shipping_address;
			$new_client->client_contact_number 		= $client_contact_number;
			$new_client->client_contact_person 		= $client_contact_person;
			$new_client->client_email_address 		= $client_email_address;
			$new_client->company_id 				= $id;
			$new_client->status 					= 'Active';
			$new_client->save();

			$datatopass = array(
				'message' => "You have succesfully Edited.",
			);
			return Redirect::to(URL::previous())->with('message_edit',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('edit_error',$validator->messages());
		}
	}

	public function delete_client()
	{
		//dd(Input::all());
		$id 		= Input::get("delete_client");

		$validator = Validator::make(
		    array(
		        'client_name' => $id,
		    ),
		    array(
		        'client_name' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_client 	= Clients::find($id);
			$prev   		= $delete_client->client_name;
			$delete_client->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted : <b>'".$prev."'</b>",
			);
			return Redirect::to(URL::previous())->with('message_delete',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_error',$validator->messages());
		}
	}

	public function client_list_dynamic($id)
	{
		$datatopass  = array(
			'title' 		=> "Client List - Beezmode",
			'page_label'	=> "Client List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'client'		=> Clients::where('company_id',$id)->get()
		);
		return View::make('operations.sales.clients.client_list_dynamic',$datatopass);
	}

	public function delivery_list($id)
	{
		$datatopass  = array(

			'title' 		=> "Delivery List - Beezmode",
			'page_label'	=> "Delivery List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			// 'deliveries'	=> Delivery::where('company_id',$id)->get(),
			// 'deliveries_count' => Delivery::where('company_id',$id)->count(),
			'clients'        => Clients::where('company_id',$id)->first(),
			'products'		=> Products::where('company_id',$id)->get(),
			// 'delivery_count' => OrdersGeneric::where('delivery_status','YES')->count(),

		);
		return View::make('operations.sales.services.delivery_list',$datatopass);
	}

	public function view_delivery_list($id,$delivery_id)
	{
		$datatopass  = array(
			'title' 		=> "Delivery Information - Beezmode",
			'page_label'	=> "Delivery Information",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'deliveries'	=> Delivery::where('company_id',$id)->where('id',$delivery_id)->first(),
			'clients'       => Clients::where('company_id',$id)->first(),
			'products'		=> Products::where('company_id',$id)->first(),
			'product_deliveries' => ProductDeliveries::where('delivery_id',$delivery_id)->get(),
			'order'			=> OrdersGeneric::where('company_id',$id)->first(),
		);
		//dd($datatopass);
		return View::make('operations.sales.services.view_delivery_list',$datatopass);
	}


	public function new_delivery_list($id)
	{
		$datatopass  = array(
			'title' 		=> "New Delivery List - Beezmode",
			'page_label'	=> "New Delivery List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'deliveries'	=> Delivery::where('company_id',$id)->get(),
			'clients'       => Clients::where('company_id',$id)->get(),
			'products'		=> Products::where('company_id',$id)->get(),
			'order'			=> OrdersGeneric::where('company_id',$id)->get(),
			'orders'		=> OrdersGeneric::where('company_id',$id)->get(),
			'units'			=> Units::where('company_id',$id)->get(),
			'product_in_orders'	=> OrdersProduct::where('order_id',$id)->get(),
			'clients'		=> Clients::where('company_id',$id)->get(),
			'in_stock' 		=> Products::where('in_stock','>',0) ->get(),
			

		);
		return View::make('operations.sales.services.new_delivery_list',$datatopass);
	}

	public function add_delivery($id)
	{
		//dd(Input::get("delivery_product"));
		$delivered_to = strtoupper(strip_tags(Input::get("delivered_to")));
		// $delivery_address = strtoupper(strip_tags(Input::get("delivery_address")));
		$delivery_product = Input::get("delivery_product");
		$delivery_quantity = Input::get("delivery_quantity");
		$delivery_unit = Input::get("delivery_unit");
		$delivery_date = strtoupper(strip_tags(Input::get("delivery_date")));

		//dd($delivery_quantity);
		$validator = Validator::make(
		    array(
		        'delivered_to' => $delivered_to,
		        // 'delivery_address' => $delivery_address,
		        'delivery_date' => $delivery_date,
		        'delivery_product' => $delivery_product,
		        'delivery_quantity' => $delivery_quantity,
		        'delivery_unit' =>$delivery_unit,
		    ),
		    array(
		        'delivered_to' => 'required|min:3',
		        // 'delivery_address' => 'min:4',
		        'delivery_product' => 'required|array',
		        'delivery_quantity' => 'required|array',
		        'delivery_unit' =>'required|array',
		        'delivery_date' => 'required',
		    )
		);

		if($validator->passes())
		{
			$new_delivery = new Delivery;
			$new_delivery->company_id 		= $id;
			$new_delivery->delivered_to 	= $delivered_to;
			$new_delivery->delivery_date 	= $delivery_date;
			//$new_delivery->product_name 	= $delivery_product;
			//$new_delivery->quantity 		= $delivery_quantity;
			//$new_delivery->unit 			= $delivery_unit;
			//$new_delivery->description 		= $delivery_description;
			$new_delivery->delivery_code	= uniqid();
			$new_delivery->save();

			$x = 0; //for index
			// dd('$delivery_product as $dp');
			foreach ($delivery_product as $dp) {
				$product_delivery = new ProductDeliveries;
				$product_delivery->delivery_id = $new_delivery->id;
				$product_delivery->product_id = $dp;
				$product_delivery->quantity = $delivery_quantity[$x];
				$product_delivery->unit 	= $delivery_unit[$x];
				$product_delivery->save();

				// $reduce_quantity = Products::find($dp);
				// $reduce_quantity->in_stock -= $delivery_quantity[$x];
				// $reduce_quantity->save();
				// $x++;
			}

			$datatopass = array(
				'message' => "You have succesfully added this delivery ",
			);
			return Redirect::to(URL::previous())->with('deliver_message_success',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('deliver_message_fail',$validator->messages());
		}
	}

	public function delete_delivery($id,$delivery_id)
	{
		//dd(Input::all());
		$validator = Validator::make(
		    array(
		        'delivery_id' => $delivery_id,
		    ),
		    array(
		        'delivery_id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_delivery_list = Delivery::find($delivery_id);
			$prev   			= 	$delete_delivery_list->$id;
			$delete_delivery_list->	delete();
			$datatopass = array(

				'message' => "You have succesfully deleted this item",
			);
			return Redirect::to(URL::previous())->with('delete_delivery_list_success',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_delivery_list_error',$validator->messages());
		}	
	}

	public function get_quantity()
	{
		$get_quantity = Products::find(Input::get('product_id'));
		return $get_quantity;
	}
	public function service_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Service List - Beezmode",
			'page_label'	=> "Service List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'services' 		=> Service::where('company_id',$id)->get(),
			'services_count' => Service::where('company_id',$id)->count()
		);
		return View::make('operations.sales.services.service_list',$datatopass);
	}

	public function spare_part($id)
	{
		$datatopass  = array(
			'title' 		=> "Spare Part - Beezmode",
			'page_label'	=> "Spare Part",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'sparepart'		=> Spareparts::where('company_id',$id)->get(),
			'services_count' => Service::where('company_id',$id)->count()
		);
		return View::make('operations.sales.services.spare_part',$datatopass);
	}

	public function technician_allowance($id)
	{
		$datatopass  = array(
			'title' 		=> "Technician Allowance - Beezmode",
			'page_label'	=> "Technician Allowance",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'services' 		=> Service::where('company_id',$id)->get(),
			'services_count' => Service::where('company_id',$id)->count()
		);
		return View::make('operations.sales.services.technician_allowance',$datatopass);
	}

	public function new_service_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Add Service List - Beezmode",
			'page_label'	=> "Add Service List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'products'		=> Products::where('company_id',$id)->get()

		);
		return View::make('operations.sales.services.new_service_list',$datatopass);
	}

		public function add_service($id)
	{
		$datatopass  = array(
			'title' 		=> "Add Service Report - Beezmode",
			'page_label'	=> "Add Service Report",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'products'		=> Products::where('company_id',$id)->get()

		);
		return View::make('operations.sales.services.add_service',$datatopass);
	}

	public function add_spare_part_view($id)
	{
		$datatopass  = array(
			'title' 		=> "Add Spare Parts - Beezmode",
			'page_label'	=> "Add Spare Parts",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'products'		=> Products::where('company_id',$id)->get()

		);
		return View::make('operations.sales.services.add_spare_part_view',$datatopass);
	}

	public function add_technician_allowance_view($id)
	{
		$datatopass  = array(
			'title' 		=> "Add Technician Allowance - Beezmode",
			'page_label'	=> "Add Technician Allowance",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'products'		=> Products::where('company_id',$id)->get()

		);
		return View::make('operations.sales.services.add_technician_allowance_view',$datatopass);
	}

	public function view_service_list($id,$service_id)
	{
		$datatopass  = array(
			'title' 		=> "View Service List - Beezmode",
			'page_label'	=> "View Service List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'services' 		=> Service::where('company_id',$id)->where('id',$service_id)->first(),
		);
		return View::make('operations.sales.services.view_service_list',$datatopass);

	}

	public function update_service($id,$service_id)
	{
		$datatopass  = array(
			'title' 		=> "View or Update Service Report - Beezmode",
			'page_label'	=> "View or Update Service Report",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'services' 		=> Service::where('company_id',$id)->where('id',$service_id)->first(),
		);
		return View::make('operations.sales.services.update_service',$datatopass);

	}

	public function add_service_list($id){

			$report_type = strip_tags(Input::get("report_type"));
			$station_location = strip_tags(Input::get("station_location"));
			$contact_person  = strip_tags(Input::get("contact_person"));
			$contact_nos     = strip_tags(Input::get("contact_nos"));
			$service_date    = strip_tags(Input::get("service_date"));
			$pump_phone_in_concern = strip_tags(Input::get("pump_phone_in_concern"));
			$phone_in_by = strip_tags(Input::get("phone_in_by"));
			$call_slip_no  = strip_tags(Input::get("call_slip_no"));
			$time_start     = strip_tags(Input::get("time_start"));
			$time_end    = strip_tags(Input::get("time_end"));			
			$pump_manufacturer = strip_tags(Input::get("pump_manufacturer"));
			$pump_model  = strip_tags(Input::get("pump_model"));
			$pump_serial_no     = strip_tags(Input::get("pump_serial_no"));
			$service_by    = strip_tags(Input::get("service_by"));
			$pump_no = strip_tags(Input::get("pump_no"));
			$hose_no = strip_tags(Input::get("hose_no"));
			$product  = Input::get("product");
			$totalizer_before_service     = strip_tags(Input::get("totalizer_before_service"));
			$totalizer_after_service    = strip_tags(Input::get("totalizer_after_service"));
			$total_ltrs_used = strip_tags(Input::get("total_ltrs_used"));
			$pump_condition_before_repair = strip_tags(Input::get("pump_condition_before_repair"));
			$work_details  = strip_tags(Input::get("work_details"));
			$remarks_result     = strip_tags(Input::get("remarks_result"));
			$final_counter_measure    = strip_tags(Input::get("final_counter_measure"));
			$ten_ltrs_calibration_check = strip_tags(Input::get("ten_ltrs_calibration_check"));
			$one_ltr_calibration_check = strip_tags(Input::get("one_ltr_calibration_check"));
			$qty_unit = strip_tags(Input::get("qty_unit"));
			$replace_parts  = strip_tags(Input::get("replace_parts"));
			$unit_cost     = strip_tags(Input::get("unit_cost"));
			$unit_total    = strip_tags(Input::get("unit_total"));
			$under_warranty = strip_tags(Input::get("under_warranty"));
			$charge_to  = strip_tags(Input::get("charge_to"));
			$conforme     = strip_tags(Input::get("conforme"));
			$service_charge    = strip_tags(Input::get("service_charge"));
			$service_total = strip_tags(Input::get("service_total"));

			$validator = Validator::make(
			    array(
			    	'report_type'		=>$report_type,
			        'station_location' 	=> $station_location,
			        'contact_person'	=> $contact_person,
			        'contact_nos'		=> $contact_nos,
			        'service_date'		=> $service_date,
			        'pump_phone_in_concern'	=> $pump_phone_in_concern,
			        'phone_in_by' 		=> $phone_in_by,
			        'call_slip_no'		=> $call_slip_no,
			        'time_start'		=> $time_start,
			        'time_end'			=> $time_end,
			        'pump_manufacturer' 	=> $pump_manufacturer,
			        'pump_model'	=> $pump_model,
			        'pump_serial_no'		=> $pump_serial_no,
			        'service_by'		=> $service_by,
			        'pump_no'	=> $pump_no,
			        'hose_no'		=> $hose_no,
			        'product'		=> $product,
			        'totalizer_before_service'	=> $totalizer_before_service,
			        'totalizer_after_service'	=> $totalizer_after_service,
			        'total_ltrs_used'	=> $total_ltrs_used,
			        'pump_condition_before_repair'	=> $pump_condition_before_repair,
			        'work_details'	=> $work_details,
			        'remarks_result'	=> $remarks_result,
			        'final_counter_measure'	=> $final_counter_measure,
			        'ten_ltrs_calibration_check' => $ten_ltrs_calibration_check,
			        'one_ltr_calibration_check' => $one_ltr_calibration_check,
			        'qty_unit'	=> $qty_unit,
			        'replace_parts'	=> $replace_parts,
			        'unit_cost'	=> $unit_cost,
			        'unit_total'	=> $unit_total,
			        'under_warranty' => $under_warranty,
			        'charge_to'	=> $charge_to,
			        'conforme'	=> $conforme,
			        'service_charge'	=> $service_charge,
			        'service_total'	=> $service_total,
			    ),
			    array(
			    	'report_type'		=>'required|regex:([0-9a-zA-Z])',
			        'station_location' 	=>'required|regex:([0-9a-zA-Z])',
			        'contact_person'	=>'required|regex:([0-9a-zA-Z])',
			        'contact_nos'		=>'required|regex:([0-9a-zA-Z])',
			        'service_date'		=> 'regex:([0-9a-zA-Z])',
			        'pump_phone_in_concern' => 'regex:([0-9a-zA-Z])',
			        'phone_in_by'		=> 'regex:([0-9a-zA-Z])',
			        'call_slip_no'		=> 'min:3',
			        'time_start'		=> 'date_format:H:i',
			        'time_end'			=> 'date_format:H:i|after:time_start',
			        'pump_manufacturer' 	=> 'regex:([0-9a-zA-Z])',
			        'pump_model'	=> 'required|regex:([0-9a-zA-Z])',
			        'pump_serial_no'		=> 'required|regex:([0-9a-zA-Z])',
			        'service_by'		=> 'regex:([0-9a-zA-Z])',
			        'pump_no'	=> 'required|regex:([0-9a-zA-Z])',
			        'hose_no'		=> 'min:3',
			        'product'		=> 'required|array',
			        'totalizer_before_service'	=> 'regex:([0-9a-zA-Z])',
			        'totalizer_after_service'	=> 'regex:([0-9a-zA-Z])',
			        'total_ltrs_used'	=> 'regex:([0-9a-zA-Z])',
			        'pump_condition_before_repair'	=> 'regex:([0-9a-zA-Z])',
			        'work_details'	=> 'regex:([0-9a-zA-Z])',
			        'remarks_result'	=> 'regex:([0-9a-zA-Z])',
			        'final_counter_measure'	=> 'regex:([0-9a-zA-Z])',
			        'ten_ltrs_calibration_check' => 'regex:([0-9a-zA-Z])',
			        'one_ltr_calibration_check' => 'regex:([0-9a-zA-Z])',
			        'qty_unit'	=> 'min:1',
			        'replace_parts'	=> 'regex:([0-9a-zA-Z])',
			        'unit_cost'	=> 'min:1',
			        'unit_total'	=> 'min:1',
			        'under_warranty' => 'regex:([0-9a-zA-Z])',
			        'charge_to'	=> 'regex:([0-9a-zA-Z])',
			        'conforme'	=> 'regex:([0-9a-zA-Z])',
			        'service_charge'	=> 'regex:([0-9a-zA-Z])',
			        'service_total'	=> 'min:1',
			    )
			);

			if($validator->passes())
			{
				
				$add_service_list = new Service;
				$add_service_list->company_id =$id;
				$add_service_list->service_code	= uniqid();
				$add_service_list->report_type	=$report_type;
				$add_service_list->station_location	=$station_location;
				$add_service_list->contact_person	=$contact_person;
				$add_service_list->contact_nos		=$contact_nos;
				$add_service_list->service_date		=$service_date;
				$add_service_list->pump_phone_in_concern =$pump_phone_in_concern;
				$add_service_list->phone_in_by		=$phone_in_by;
				$add_service_list->call_slip_no		=$call_slip_no;
				$add_service_list->time_start		=$time_start;
				$add_service_list->time_end			=$time_end;
				$add_service_list->pump_manufacturer 	= $pump_manufacturer;
			    $add_service_list->pump_model	= $pump_model;
			    $add_service_list->pump_serial_no		= $pump_serial_no;
			    $add_service_list->service_by		= $service_by;
			    $add_service_list->pump_no	= $pump_no;
			    $add_service_list->hose_no		= $hose_no;
			    $add_service_list->product		= json_encode($product);
			    $add_service_list->totalizer_before_service	= $totalizer_before_service;
			    $add_service_list->totalizer_after_service	= $totalizer_after_service;
			    $add_service_list->total_ltrs_used	= $total_ltrs_used;
			    $add_service_list->pump_condition_before_repair	= $pump_condition_before_repair;
			    $add_service_list->work_details	=$work_details;
			    $add_service_list->remarks_result	= $remarks_result;
			    $add_service_list->final_counter_measure	= $final_counter_measure;
			    $add_service_list->ten_ltrs_calibration_check = $ten_ltrs_calibration_check;
			    $add_service_list->one_ltr_calibration_check = $one_ltr_calibration_check;
			    $add_service_list->qty_unit	= $qty_unit;
			    $add_service_list->replace_parts	= $replace_parts;
			    $add_service_list->unit_cost	= $unit_cost;
			   	$add_service_list->unit_total	= $unit_total;
			    $add_service_list->under_warranty = $under_warranty;
			    $add_service_list->charge_to	= $charge_to;
			    $add_service_list->conforme	= $conforme;
			    $add_service_list->service_charge	= $service_charge;
			    $add_service_list->service_total	= $service_total;	
				$add_service_list->save();

				$datatopass = array(
					'message' => "You have succesfully saved your service list!",
				);

				return Redirect::to(URL::previous())->with('add_service_list_success',$datatopass);
			}
			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('add_service_list_error',$validator->messages());
			}
	}

	public function add_service_report($id){

			$station_location	 = strip_tags(Input::get("station_location"));
			$contact_person 	 = strip_tags(Input::get("contact_person"));	
			$service_date		 = strip_tags(Input::get("service_date"));
			$service_total 		 = strip_tags(Input::get("service_total"));

			$validator = Validator::make(
			    array(
			        'station_location' 	=> $station_location,
			        'contact_person'	=> $contact_person,
			        'service_date'		=> $service_date,
			        'service_total'		=> $service_total,
			    ),
			    array(
			    	
			        'station_location' 	=>'required|regex:([0-9a-zA-Z])',
			        'contact_person'	=>'required|regex:([0-9a-zA-Z])',
			        'service_date'		=>'regex:([0-9a-zA-Z])',
			        'service_total'		=>'required|regex:([0-9a-zA-Z])',
			    )
			);

			if($validator->passes())
			{
				
				$add_service_list = new Service;
				$add_service_list->company_id		=$id;
				$add_service_list->service_code		= uniqid();
				$add_service_list->station_location	=$station_location;
				$add_service_list->contact_person	=$contact_person;
				$add_service_list->service_date		=$service_date;
			    $add_service_list->service_total	= $service_total;	
				$add_service_list->save();

				$datatopass = array(
					'message' => "You have succesfully saved your service list!",
				);

				return Redirect::to(URL::previous())->with('add_service_list_success',$datatopass);
			}
			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('add_service_list_error',$validator->messages());
			}
	}

	public function add_sparepart($id){

			$date	 		 = strip_tags(Input::get("date"));
			$account_name 	 = strip_tags(Input::get("account_name"));	
			$product		 = strip_tags(Input::get("product"));
			$amount 		 = strip_tags(Input::get("amount"));
			$qty 			 = strip_tags(Input::get("qty"));
			$total 			 = strip_tags(Input::get("total"));

			$validator = Validator::make(
			    array(
			        'date' 				=> $date,
			        'account_name'		=> $account_name,
			        'product'			=> $product,
			        'amount'			=> $amount,
			        'qty'				=> $qty,
			        'total'				=> $total,
			    ),
			    array(
			    	
			        'date' 			=>'required|regex:([0-9a-zA-Z])',
			        'account_name'	=>'required|regex:([0-9a-zA-Z])',
			        'product'		=>'required|regex:([0-9a-zA-Z])',
			        'amount'		=>'required|regex:([0-9a-zA-Z])',
			        'qty'			=>'required|regex:([0-9a-zA-Z])',
			        'total'			=>'required|regex:([0-9a-zA-Z])',
			    )
			);

			if($validator->passes())
			{
				
				$add_sparepart = new Spareparts;
				$add_sparepart->company_id		=$id;
				$add_sparepart->date			=$date;
				$add_sparepart->account_name	=$account_name;
				$add_sparepart->product			=$product;
				$add_sparepart->amount			=$amount;
				$add_sparepart->qty				=$qty;
				$add_sparepart->total			=$total;
				$add_sparepart->save();

				$datatopass = array(
					'message' => "You have succesfully saved your Spare Parts list!",
				);

				return Redirect::to(URL::previous())->with('add_spareparts_success',$datatopass);
			}
			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('add_spareparts_error',$validator->messages());
			}
	}


	public function delete_service_list($id,$service_id)
	{

		$validator = Validator::make(
		    array(
		        'service_id' => $service_id,
		    ),
		    array(
		        'service_id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_service_list = Service::find($service_id);
			$prev   			= $delete_service_list->$id;
			$delete_service_list->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted service",
			);
			return Redirect::to(URL::previous())->with('delete_service_list_success',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_service_list_error',$validator->messages());
		}	
	}

	// public function prospect_clients($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Prospect Clients - Beezmode",
	// 		'page_label'	=> "Prospect Clients",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.clients.prospect_clients',$datatopass);
	// }

	// public function list_clients($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Client List - Beezmode",
	// 		'page_label'	=> "Client List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.clients.list_clients',$datatopass);
	// }

	// public function reports_clients($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Client Reports - Beezmode",
	// 		'page_label'	=> "Client Reports",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.clients.reports_clients',$datatopass);
	// }

	// public function list_products($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Product List - Beezmode",
	// 		'page_label'	=> "Product List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.products.list_products',$datatopass);
	// }

	// public function list_price($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Product Price List - Beezmode",
	// 		'page_label'	=> "Product Price List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.products.list_price',$datatopass);
	// }

	// public function product_lots($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Product Lots - Beezmode",
	// 		'page_label'	=> "Product Lots",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.products.product_lots',$datatopass);
	// }

	// public function reports_products($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Product Reports - Beezmode",
	// 		'page_label'	=> "Product Reports",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.products.reports_products',$datatopass);
	// }

	// public function list_service($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Service List - Beezmode",
	// 		'page_label'	=> "Service List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.services.list_service',$datatopass);
	// }

	// public function service_list_price($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Service Price List - Beezmode",
	// 		'page_label'	=> "Service Price List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.services.service_list_price',$datatopass);
	// }

	// public function reports_services($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Service Reports - Beezmode",
	// 		'page_label'	=> "Service Reports",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.sales.services.reports_services',$datatopass);
	// }

}
