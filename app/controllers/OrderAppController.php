<?php

class OrderAppController extends BaseController {

		public function process_order($id)
		{
			$datatopass  = array(
				'title' 		=> "Process Order - Beezmode",
				'page_label'	=> "Process Order",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user()
			);
			return View::make('operations.sales.order.process_order',$datatopass);
		}


		public function view_order($id,$order_id)
		{
			//dd($order_id);
			$name 		= OrdersGeneric::where('order_id',$order_id)->first()->customer_name;
			// $vat_type 	= OrdersGeneric::where('order_id',$order_id)->first()->vat;
			// $vat_value	= Vats::find($vat_type)->vat_value;
			//dd($vat_value);
			//dd($name);
			$datatopass  = array(
				'title' 		=> "View Order - Beezmode",
				'page_label'	=> "View Order",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'products'		=> Products::where('id',$id)->get(),
				'orders_product' => OrdersProduct::where('id',$order_id)->get(),
				'orders_generic' => OrdersGeneric::where('order_id',$order_id)->get(),
				// 'clients'		=> Clients::where('client_customer_name',$name)->first(),
				// // 'vat'			=> $vat_value/100,
				// 'product_in_orders'	=> OrdersProduct::where('id',$id)->get(),
			);

			return View::make('operations.sales.order.view_order',$datatopass);
		}

		public function invoice_order($id,$order_id)
		{
			$name 		= OrdersGeneric::where('order_id',$order_id)->first()->recipient_name;
			$vat_type 	= OrdersGeneric::where('order_id',$order_id)->first()->vat;
			$vat_value	= Vats::find($vat_type)->vat_value;
			//dd($vat_value);
			//dd($name);
			$datatopass  = array(
				'title' 		=> "Invoice Order - Beezmode",
				'page_label'	=> "Invoice Order",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'products'		=> Products::where('company_id',$id)->get(),
				'order'			=> OrdersGeneric::where('order_id',$order_id)->first(),
				'clients'		=> Clients::where('client_name',$name)->first(),
				'vat'			=> $vat_value/100,
				'product_in_orders'	=> OrdersProduct::where('order_id',$order_id)->get()
			);
			return View::make('operations.sales.order.invoice_order',$datatopass);
		}

		public function order_list_generic($id)
		{
			$datatopass  = array(
				'title' 		=> "Generic Order List - Beezmode",
				'page_label'	=> "Generic Order List",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'orders'		=> OrdersGeneric::where('company_id',$id)->get(),
				'orders_count'  => OrdersGeneric::where('company_id',$id)->count(),
				'products'		=> Products::where('company_id',$id)->get(),
			);
			return View::make('operations.sales.order.order_list_generic',$datatopass);
		}



		public function order_generic($id)
		{
			$datatopass  = array(
				'title' 		=> "Product Order - Beezmode",
				'page_label'	=> "Product Order",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'orders'		=> OrdersGeneric::where('company_id',$id)->get(),
				'products'		=> Products::all(),
				'vats'			=> Vats::where('company_id',$id)->get(),
				'payments'		=> Payments::where('company_id',$id)->get(),
				'warehouse'		=> Warehouse::where('company_id',$id)->get(),
				'orders_count'  => OrdersGeneric::where('company_id',$id)->count(),
				'instock_count' => Products::where('company_id',$id)->sum('in_stock'),
				'clients'		=> Clients::where('company_id',$id)->get(),
				'in_stock' 		=> Products::where('in_stock','>',0) ->get(),
			);
			return View::make('operations.sales.order.order_generic',$datatopass);
		}

		public function add_order($id)
		{

			$form_data = Session::flash('add_order_form_data', Input::all());
			$customer_name = Input::get("customer-name");
			$order_date = Input::get("order-date");
			$order_id = Input::get("order-id");
			$order_products = Input::get("product-name");
			$order_warehouse = Input::get("order-warehouse");
			$order_category = Input::get("order-category");
			$order_qty = Input::get("order-qty");
			$order_price = Input::get("order-price");
			$order_vat = Input::get("order-vat");
			$order_amount = Input::get("order-amount");
			$order_status = Input::get("order-status");
			$payment_name = Input::get("payment-name");
			$order_terms = Input::get("order-terms");
			$order_due_date = Input::get("order-due-date");
			$order_amount_paid = Input::get("amount-paid");
			$order_total_amount = Input::get("order-total-amount");

//dd($order_products);
			$validator = Validator::make(
			    array(
			        'customer-name' 			=> $customer_name,
			        'order-date' 				=> $order_date,
			        'order-id' 					=> $order_id,
			        'order-products' 			=> $order_products,
			        'order-warehouse' 			=> $order_warehouse,
			        'order-category' 			=> $order_category,
			      	'order-qty' 				=> $order_qty,
			      	'order-price'				=> $order_price,
			      	'order-vat'					=> $order_vat,
			      	'order-amount'				=> $order_amount,
			      	'order-status'				=> $order_status,
			      	'order-terms'				=> $order_terms,
			      	'payment-name'				=> $payment_name,
			      	'order-due_date'			=> $order_due_date,
			      	'order-amount-paid'			=> $order_amount_paid,
			      	'order-total-amount'		=> $order_total_amount,
			    	),
			    array(
			    	'customer-name' 			=> 'required',
			        'order-date' 				=> 'required',
			        'order-id'					=> 'min:1',
			        'order-products' 			=> 'array',
			        'order-warehouse' 			=> 'array',
			        'order-category' 			=> 'array',
			      	'order-qty' 				=> 'array',
			      	'order-price'				=> 'array',
			      	'order-vat'					=> 'array',
			      	'order-amount'				=> 'array',
			      	'order-status'				=> 'min:1',
			      	'order-terms'				=> 'min:1',
			      	'payment-name'				=> 'min:1',
			      	'order-due_date'			=> 'min:1',
			      	'order-amount-paid'			=> 'min:1',
			      	'order-total-amount'		=> 'min:1',
			         )
		       
			);

			if($validator->passes())
			{	
				
				$new_order = new OrdersGeneric;
				$new_order->company_id 		= $id;
				$new_order->customer_name 	= $customer_name;
				$new_order->date_order 		= $order_date;
				$new_order->order_id 		= $order_id;
				$new_order->status			= $order_status;
				$new_order->terms 			= $order_terms;
				$new_order->payment_name	= $payment_name;
				$new_order->due_date 		= $order_due_date;
				$new_order->amount_paid 	= $order_amount_paid;
				$new_order->total_amount	= $order_total_amount;
				$new_order->save();

				$i = 0; //Iterator
				foreach ($order_products as $op) {
					$product_in_orders = new OrdersProduct;
					$product_in_orders->product_order_id 	= $new_order->id;
					$product_in_orders->product_id 			= $op;
					// $product_in_orders->product_id 	= $op_value;
					$product_in_orders->products			= $order_products[$i];
					$product_in_orders->warehouse 			= $order_warehouse[$i];
					$product_in_orders->category			= $order_category[$i];
					$product_in_orders->quantity 			= $order_qty[$i];
					$product_in_orders->price				= $order_price[$i];
					$product_in_orders->vat					= $order_vat[$i];
					$product_in_orders->amount				= $order_amount[$i];
					$product_in_orders->save();
				// $reduce_quantity = Products::find($op_value);
				// $reduce_quantity->in_stock -= $order_qty[$op_key];
				// $reduce_quantity->save();
					$i++;
				}

				// $sales = OrdersProduct::where("order_id",$new_order->id)->get();
				// $total_sales = 0;

				// foreach ($sales as $s) {
				// 	$total_sales = ($s->qty * Products::find($s->product_id)->product_price)+$total_sales;

				// }

				// $update_sales = OrdersGeneric::find($new_order->id);
				// $update_sales ->sales = $total_sales;
				// $update_sales -> save();
				

				$datatopass = array(
					'message' => "You have succesfully added new order.",
				);
				Session::forget('add_order_form_data');
				return Redirect::to(URL::previous())->with('message_add',$datatopass);
			}

			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('add_error',$validator->messages());
			}


		}

		public function order_update_generic_view($id,$order_id)
		{
			$datatopass  = array(
				'title' 		=> "Update Order - Beezmode",
				'page_label'	=> "Update Order",
				'page_header' 	=> Companies::where('id',$id)->first()->company_name,
				'company' 		=> Companies::where('id',$id)->first(),
				'user'			=> Confide::user(),
				'products'		=> Products::where('company_id',$id)->get(),
				'order'			=> OrdersGeneric::where('id',$order_id)->first(),
			);
			return View::make('operations.sales.order.order_update_generic_view',$datatopass);
		}

		public function order_update_generic($id,$order_id)
		{
			$order_name = strtoupper(strip_tags(Input::get("order-name")));
			$order_date = strtoupper(strip_tags(Input::get("order-date")));
			$order_terms = strtoupper(strip_tags(Input::get("order-terms")));
			$order_address = strtoupper(strip_tags(Input::get("order-address")));
			$order_tin = strtoupper(strip_tags(Input::get("order-tin")));
			$order_pwd = strtoupper(strip_tags(Input::get("order-pwd")));
			$order_products = strtoupper(strip_tags(Input::get("order-products")));
			$order_qty = strtoupper(strip_tags(Input::get("order-qty")));
			$order_total = strtoupper(strip_tags(Input::get("order-total")));
			$order_business_style = strtoupper(strip_tags(Input::get("order-business-style")));
			$order_sub_total = strtoupper(strip_tags(Input::get("order-sub-total")));
			$order_vat = strtoupper(strip_tags(Input::get("order-vat")));
			$order_discount = strtoupper(strip_tags(Input::get("order-discount")));
			$order_net_total = strtoupper(strip_tags(Input::get("order-net-total")));
			$order_paid = strtoupper(strip_tags(Input::get("order-paid")));
			$order_due = strtoupper(strip_tags(Input::get("order-due")));
			$order_unit = strtoupper(strip_tags(Input::get("order-unit")));
			$order_payment = strtoupper(strip_tags(Input::get("order-payment")));

			$validator = Validator::make(
			    array(
			        'order-name' 			=> $order_name,
			        'order-date' 			=> $order_date,
			        'order-terms' 			=> $order_terms,
			        'order-tin' 			=> $order_tin,
			        'order-address' 		=> $order_address,
			        'order-pwd' 			=> $order_pwd,
			        'order-products' 		=> $order_products,
			      	'order-qty' 			=> $order_qty,
			      	'order-total' 			=> $order_total,
			      	'order-business-style'  => $order_business_style,
			      	'order-sub-total'		=> $order_sub_total,
			      	'order-vat'				=> $order_vat,
			      	'order-discount'		=> $order_discount,
			      	'order-net-total'		=> $order_net_total,
			      	'order-paid'			=> $order_paid,
			      	'order-due'				=> $order_due,
			      	'order-unit'			=> $order_unit,
			      	'order-payment'			=> $order_payment,
			    	),
			    array(
			        'order-name' 			=> 'required|min:3',
			        'order-date' 			=> 'required',
			        'order-terms'			=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
			        'order-address' 		=> 'required|min:3',
			        'order-tin'				=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
			        'order-pwd'				=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
			        'order-products'		=> 'required',
			        'order-qty' 			=> 'required|numeric|min:0',
			        'order-total' 			=> 'required|numeric|min:0',
			        'order-business-style'	=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
			        'order-sub-total' 		=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
			        'order-vat'		 		=> 'required|numeric|min:0',
			        'order-discount' 		=>'regex:/^[(0-9a-zA-Z\s)]+$/u',
			        'order-net-total' 		=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
			        'order-paid' 			=> 'required|numeric|min:0',
			        'order-unit' 			=> 'required|min:2',
			        'order-payment' 		=> 'required',
			         )
		       
			);

			if($validator->passes())
			{	
				$new_order = OrdersGeneric::find($order_id);
				$new_order->recipient_name 		= $order_name;
				$new_order->date_order 			= $order_date;
				$new_order->terms 				= $order_terms;
				$new_order->shipping_address 	= $order_address;
				$new_order->tin 				= $order_tin;
				$new_order->pwd_id_no			= $order_pwd;
				$new_order->products			= $order_products;
				$new_order->qty					= $order_qty;
				$new_order->total				= $order_total;
				$new_order->business_style		= $order_business_style;
				$new_order->sub_total			= $order_sub_total;
				$new_order->vat					= $order_vat;
				$new_order->discount			= $order_discount;
				$new_order->net_total			= $order_net_total;
				$new_order->paid 				= $order_paid;
				$new_order->due 				= $order_due;
				$new_order->unit 				= $order_unit;
				$new_order->payment_type 		= $order_payment;

				$new_order->company_id 	= $id;
				$new_order->order_id	= uniqid();
				$new_order->save();

				$datatopass = array(
					'message' => "You have succesfully added : <b>'".$order_name."'</b> as a new order.",
				);
				return Redirect::to(URL::previous())->with('message_add',$datatopass);
			}

			if($validator->fails())
			{
				return Redirect::to(URL::previous())->with('add_error',$validator->messages());
			}




		}

		public function delete_order($id,$order_id)
	{
		$validator = Validator::make(
		    array(
		        'delete_order' => $order_id,
		    ),
		    array(
		        'delete_order' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_order 		= OrdersGeneric::find($order_id);
			$delete_order		->delete();
			$datatopass 		= array(
				'message' => "You have succesfully deleted",
			);
			return Redirect::to(URL::previous())->with('message_delete',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_error',$validator->messages());
		}
	}

	public function get_products()
	{
		$product = Products::find(Input::get("product_id"));
		$unit 	 = Units::all();
		$datatopass = array(
			'product' => $product,
			'unit'	  => $unit
		);
		return $datatopass;
	}
}