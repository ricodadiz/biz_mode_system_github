<?php

class WarehouseController extends Controller {

	public function warehouse_summary($id)
	{
		$datatopass  = array(
			'title' 		=> "Warehouse Summary - Beezmode",
			'page_label'	=> "Warehouse Summary",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('operations.warehouse.warehouse_summary',$datatopass);
	}

	public function manage_warehouse($id)
	{
		$datatopass  = array(
			'title' 		=> "Warehouse Set Up - Beezmode",
			'page_label'	=> "Warehouse Set Up",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'categories'	=> Categories::where('company_id',$id)->get(),
			'warehouse'		=> Warehouse::where('company_id',$id)->get(),
			'units'			=> Units::where('company_id',$id)->get(),
			'brands'		=> Brands::where('company_id',$id)->get()
		);
		return View::make('operations.warehouse.manage_warehouse',$datatopass);
	}

	// public function warehouse_list($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Warehouse List - Beezmode",
	// 		'page_label'	=> "Warehouse List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user(),
	// 		'warehouse'		=> Warehouse::where('company_id',$id)->get()

	// 	);
	// 	return View::make('operations.warehouse.manage.warehouse_list',$datatopass);
	// }

	public function add_warehouse($id)
	{
		$warehouse_name = strtoupper(strip_tags(Input::get("add-warehouse")));
		$warehouse_address = strtoupper(strip_tags(Input::get("add-warehouse-address")));
		$validator = Validator::make(
		    array(
		        'warehouse_name' => $warehouse_name,
		        'warehouse_address' => $warehouse_address,
		    ),
		    array(
		        'warehouse_name' => 'required|min:3',
		        'warehouse_address' => 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_warehouse = new Warehouse;
			$new_warehouse->warehouse_name 		= $warehouse_name;
			$new_warehouse->warehouse_address 	= $warehouse_address;
			$new_warehouse->company_id 			= $id;
			$new_warehouse->status 				= 'Active';
			$new_warehouse->save();

			$datatopass = array(
				'message' => "You have succesfully added : <b>'".$warehouse_name."'</b> as a new warehouse, you may now edit this warehouse.",
				'tab'	  => "#tab-warehouse"
			);
			return Redirect::to(URL::previous())->with('message_add_warehouse',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-warehouse"
			);
			return Redirect::to(URL::previous())->with('add_error_warehouse',$datatopass);
		}
	}

	public function edit_warehouse($id)
	{
		$warehouse_id			= Input::get("existing_warehouse");
		$warehouse_address_id	= Input::get("existing_warehouse_address");

		$warehouse_name 	= strtoupper(strip_tags(Input::get("new_warehouse")));
		
		$warehouse_address 	= strtoupper(strip_tags(Input::get("new_warehouse_address")));

		$validator = Validator::make(
		    array(
		        'warehouse_name' => $warehouse_name,
		        'warehouse_address' => $warehouse_address,
		    ),
		    array(
		        'warehouse_name' => 'required|min:3',
		        'warehouse_address' => 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_warehouse 								= Warehouse::find($warehouse_id);
			$prev_name 									= $new_warehouse->warehouse_name;
			$prev_address								= $new_warehouse->warehouse_address;
			$new_warehouse->warehouse_name 				= $warehouse_name;
			$new_warehouse->warehouse_address 			= $warehouse_address;
			$new_warehouse->save();

			$datatopass = array(
				'message' => "You have succesfully changed : <b>'".$prev_name."'</b> to <b>'".$warehouse_name."'</b>",
				'tab'	  => "#tab-warehouse"			
			);
			return Redirect::to(URL::previous())->with('message_edit_warehouse',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-warehouse"
			);
			return Redirect::to(URL::previous())->with('edit_error_warehouse',$datatopass);
		}
	}

	public function delete_warehouse($id)
	{
		//dd(Input::all());
		$id 		= Input::get("delete_warehouse");

		$validator = Validator::make(
		    array(
		        'warehouse_name' => $id,
		    ),
		    array(
		        'warehouse_name' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_warehouse 	= Warehouse::find($id);
			$prev   		= $delete_warehouse->warehouse_name;
			$delete_warehouse->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted : <b>'".$prev."'</b>",
				'tab'	  => "#tab-warehouse"	
			);
			return Redirect::to(URL::previous())->with('message_delete_warehouse',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-warehouse"
			);
			return Redirect::to(URL::previous())->with('delete_error_warehouse',$datatopass);
		}
	}

	// public function category_list($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Category List - Beezmode",
	// 		'page_label'	=> "Category List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user(),
	// 		'categories'	=> Categories::where('company_id',$id)->get()
	// 	);
	// 	return View::make('operations.warehouse.manage.category_list',$datatopass);
	// }

	public function add_category($id)
	{
		$category_name = strtoupper(strip_tags(Input::get("add-category")));
		$choose_unit   = strtoupper(strip_tags(Input::get("choose-unit")));
		
		$validator = Validator::make(
		    array(
		        'category_name' => $category_name,
		        'choose_unit' 	=> $choose_unit,
		    ),
		    array(
		        'category_name' => 'required|min:3',
		        'choose_unit' 	=> 'required'
		    )
		);
		
		if($validator->passes())
		{
			$new_category = new Categories;
			$new_category->category_name 	= $category_name;
			$new_category->choose_unit 		= $choose_unit;
			$new_category->company_id 		= $id;
			$new_category->status 			= 'Active';
			$new_category->save();

			$datatopass = array(
				'message' => "You have succesfully added : <b>'".$category_name."'</b> as a new category, you may now edit this category.",
				'tab'	  => "#tab-category"
			);
			return Redirect::to(URL::previous())->with('message_add_category',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-category"
			);
			return Redirect::to(URL::previous())->with('add_error_category',$datatopass);
		}
	}

	public function edit_category()
	{
		$id	= Input::get("existing_category");
		$category_name 	= strtoupper(strip_tags(Input::get("new_category")));
		
		$validator = Validator::make(
		    array(
		        'category_name' => $category_name,
		    ),
		    array(
		        'category_name' => 'required|unique:roles,name|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_category 					= Categories::find($id);
			$prev 							= $new_category->category_name;
			$new_category->category_name 	= $category_name;
			$new_category->save();

			$datatopass = array(
				'message' => "You have succesfully changed : <b>'".$prev."'</b> to <b>'".$category_name."'</b>",
				'tab'	  => "#tab-category"
			);
			return Redirect::to(URL::previous())->with('message_edit_category',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-category"
			);
			return Redirect::to(URL::previous())->with('edit_error_category',$datatopass);
		}
	}

	public function delete_category()
	{
		//dd(Input::all());
		$id 		= Input::get("delete_category");

		$validator = Validator::make(
		    array(
		        'category_name' => $id,
		    ),
		    array(
		        'category_name' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_category 	= Categories::find($id);
			$prev   		= $delete_category->category_name;
			$delete_category->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted : <b>'".$prev."'</b>",
				'tab'	  => "#tab-category"
			);
			return Redirect::to(URL::previous())->with('message_delete_category',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-category"
			);
			return Redirect::to(URL::previous())->with('delete_error_category',$datatopass);
		}
	}



	// public function brand_list($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Brand List - Beezmode",
	// 		'page_label'	=> "Brand List",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user(),
	// 		'brands'		=> Brands::where('company_id',$id)->get()
	// 	);
	// 	return View::make('operations.warehouse.manage.brand_list',$datatopass);
	// }

	public function add_brand($id)
	{
		$brand_name = strtoupper(strip_tags(Input::get("add-brand")));
		
		$validator = Validator::make(
		    array(
		        'brand_name' => $brand_name,
		    ),
		    array(
		        'brand_name' => 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_brand = new Brands;
			$new_brand->brand_name 	= $brand_name;
			$new_brand->company_id 	= $id;
			$new_brand->status 		= 'Active';
			$new_brand->save();

			$datatopass = array(
				'message' => "You have succesfully added : <b>'".$brand_name."'</b> as a new brand, you may now edit this brand.",
				'tab'	  => "#tab-brand"
			);
			return Redirect::to(URL::previous())->with('message_add_brand',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-brand"
			);
			return Redirect::to(URL::previous())->with('add_error_brand',$datatopass);
		}
	}

	public function edit_brand()
	{
		$id	= Input::get("existing_brand");
		$brand_name 	= strtoupper(strip_tags(Input::get("new_brand")));
		$brand_status 	= strtoupper(strip_tags(Input::get("new_brand_status")));

		$validator = Validator::make(
		    array(
		        'brand_name' => $brand_name,
		    ),
		    array(
		        'brand_name' => 'required|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_brand					= Brands::find($id);
			$prev 						= $new_brand->brand_name;
			$new_brand->brand_name 		= $brand_name;
			$new_brand->save();

			$datatopass = array(
				'message' => "You have succesfully changed : <b>'".$prev."'</b> to <b>'".$brand_name."'</b>",
				'tab'	  => "#tab-brand"
			);
			return Redirect::to(URL::previous())->with('message_edit_brand',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-brand"
			);
			return Redirect::to(URL::previous())->with('edit_error_brand',$datatopass);
		}
	}

	public function delete_brand()
	{
		//dd(Input::all());
		$id 		= Input::get("delete_brand");

		$validator = Validator::make(
		    array(
		        'brand_name' => $id,
		    ),
		    array(
		        'brand_name' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_brand 	= Brands::find($id);
			$prev   		= $delete_brand->brand_name;
			$delete_brand->delete();
			$datatopass = array(
				'message' => "You have succesfully deleted : <b>'".$prev."'</b>",
				'tab'	  => "#tab-brand"
			);
			return Redirect::to(URL::previous())->with('message_delete_brand',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'messages'=> $validator->messages(),
				'tab'	  => "#tab-brand"
			);
			return Redirect::to(URL::previous())->with('delete_error_brand',$datatopass);
		}
	}

	public function product_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Product List - Beezmode",
			'page_label'	=> "Product List",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'products'		=> Products::where('company_id',$id)->paginate(15),
			'products_count' => Products::where('company_id',$id)->count(),
			'instock_count' => Products::where('company_id',$id)->sum('in_stock'),
			'out_of_stock_count' => Products::where('in_stock',0) ->count(),
			
		);
		/*dd($datatopass);*/
		return View::make('operations.warehouse.inventory.product_list',$datatopass);
	}

	public function add_product_view($id)
	{
		$datatopass  = array(
			'title' 		=> "Add Product - Beezmode",
			'page_label'	=> "Add Product",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'products'		=> Products::where('company_id',$id)->get(),
			'categories'	=> Categories::where('company_id',$id)->get(),
			'warehouse'		=> Warehouse::where('company_id',$id)->get(),
			'brand'			=> Brands::where('company_id',$id)->get(),
			'product_count' => Products::where('company_id',$id)->count(),
			'instock_count' => Products::where('company_id',$id)->sum('in_stock'),
		);
		return View::make('operations.warehouse.inventory.add_product_view',$datatopass);
	}

	public function add_product($id)
	{
		$product_name = strtoupper(strip_tags(Input::get("add-product")));
		$product_code = strtoupper(strip_tags(Input::get("product-code")));
		$model_code = strtoupper(strip_tags(Input::get("model-code")));
		$supplier_code = strtoupper(strip_tags(Input::get("supplier-code")));
		$warranty = strtoupper(strip_tags(Input::get("warranty")));
		$product_stock = strtoupper(strip_tags(Input::get("stock-product")));
		$product_price = strtoupper(strip_tags(Input::get("price-product")));
		$product_category = strtoupper(strip_tags(Input::get("category-product")));
		$product_brand = strtoupper(strip_tags(Input::get("brand-product")));
		$product_warehouse = strtoupper(strip_tags(Input::get("warehouse-product")));
		$product_description = Input::get("description-product");

		$validator = Validator::make(
		    array(
		        'product_name' 			=> $product_name,
		        'product_stock' 		=> $product_stock,
		        'product_price'			=> $product_price,
		        'product_category' 		=> $product_category,
		        'product_brand' 		=> $product_brand,
		        'product_warehouse' 	=> $product_warehouse,
		        'product_description'	=> $product_description,
		        'product_code' 			=> $product_code,
		        'model_code' 			=> $model_code,
		        'supplier_code'			=> $supplier_code,
		        'warranty' 				=> $warranty,
		    ),
		    array(
		        'product_name' 			=> 'required|min:3',
		        'product_stock' 		=> 'required|numeric|min:0',
		        'product_price' 		=> 'required|numeric|min:0',
		        'product_category' 		=> 'required',
		        'product_brand' 		=> 'required',
		        'product_warehouse' 	=> 'required',
		        'product_description' 	=> 'required',
		        'product_code'		 	=> 'required',
		        'model_code'		 	=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'supplier_code'			=> 'required|regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'warranty'		 		=> 'required',
		    )
		);

		// dd($validator->passes());
		
		if($validator->passes())
		{	
			$new_product = new Products;
			$new_product->product_name 	= $product_name;
			$new_product->product_code 	= $product_code;
			$new_product->model_code 	= $model_code;
			$new_product->supplier_code = $supplier_code;
			$new_product->warranty	 	= $warranty;
			$new_product->in_stock 		= $product_stock;
			$new_product->product_price = $product_price;
			$new_product->category 		= $product_category;
			$new_product->brand			= $product_brand;
			$new_product->warehouse		= $product_warehouse;
			$new_product->description	= $product_description;
			$new_product->company_id 	= $id;
			$new_product->status 		= 'Active';
			$new_product->save();

			$datatopass = array(
				'message' => "You have succesfully added : <b>'".$product_name."'</b> as a new product, you may now edit this product.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('add_error',$validator->messages());
		}
	}

	public function update_product_view($id,$product_id)
	{
		$datatopass  = array(
			'title' 		=> "Update Product - Beezmode",
			'page_label'	=> "Update Product",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'product'		=> Products::where('id',$product_id)->first(),
			'categories'	=> Categories::where('company_id',$id)->get(),
			'warehouse'		=> Warehouse::where('company_id',$id)->get(),
			'brand'			=> Brands::where('company_id',$id)->get(),
			'products_count' => Products::where('company_id',$id)->count(),
			'instock_count' => Products::where('company_id',$id)->sum('in_stock'),
			'out_of_stock_count' => Products::where('in_stock',0) ->count(),
		);
		return View::make('operations.warehouse.inventory.update_product_view',$datatopass);
	}

	public function upload_image_product($id,$product_id)
	{
		$image_product = Input::file("file");
/*dd($image_product);*/
		$validator = Validator::make(
			    array(
			        'image_product' => $image_product,
			    ),
			    array(

			        'image_product' => 'mimes:jpeg,jpg,bmp,png,ico|max:3072'
			    )
			);
		if($validator->passes())
			{
				
					$path = Input::file("file")->getRealPath();
					$type = pathinfo($path, PATHINFO_EXTENSION);
					$data = file_get_contents($path);
					$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

					$new_product = Products::find($product_id);
					$new_product ->product_photo =$base64;
					$new_product->save();
				
			}
		if($validator->fails())
		{
			Response::make($validation->errors->first(), 400);
		}	
	}

	public function update_product($id,$product_id)
	{
		$product_name = strtoupper(strip_tags(Input::get("add-product")));
		$product_code = strtoupper(strip_tags(Input::get("product-code")));
		$model_code = strtoupper(strip_tags(Input::get("model-code")));
		$warranty = strtoupper(strip_tags(Input::get("warranty")));
		$product_stock = strtoupper(strip_tags(Input::get("stock-product")));
		$product_price = strtoupper(strip_tags(Input::get("price-product")));
		$product_category = strtoupper(strip_tags(Input::get("category-product")));
		$product_brand = strtoupper(strip_tags(Input::get("brand-product")));
		$product_warehouse = strtoupper(strip_tags(Input::get("warehouse-product")));
		$product_description = Input::get("description-product");

		$validator = Validator::make(
		    array(
		        'product_name' 			=> $product_name,
		        'product_stock' 		=> $product_stock,
		        'product_price'			=> $product_price,
		        'product_category' 		=> $product_category,
		        'product_brand' 		=> $product_brand,
		        'product_warehouse' 	=> $product_warehouse,
		        'product_description'	=> $product_description,
		        'product_code' 			=> $product_code,
		        'model_code' 			=> $model_code,
		        'warranty' 				=> $warranty,
		    ),
		    array(
		        'product_name' 			=> 'required|min:3',
		        'product_stock' 		=> 'required|numeric|min:0',
		        'product_price' 		=> 'required|numeric|min:0',
		        'product_category' 		=> 'required',
		        'product_brand' 		=> 'required',
		        'product_warehouse' 	=> 'required',
		        'product_description' 	=> 'required',
		        'product_code'		 	=> 'required',
		        'model_code'		 	=> 'regex:/^[(0-9a-zA-Z\s)]+$/u',
		        'warranty'		 		=> 'required',
		    )
		);

		// dd($validator->passes());
		
		if($validator->passes())
		{	
			$new_product = Products::find($product_id);
			$new_product->product_name 	= $product_name;
			$new_product->product_code 	= $product_code;
			$new_product->model_code 	= $model_code;
			$new_product->warranty	 	= $warranty;
			$new_product->in_stock 		= $product_stock;
			$new_product->product_price = $product_price;
			$new_product->category 		= $product_category;
			$new_product->brand			= $product_brand;
			$new_product->warehouse		= $product_warehouse;
			$new_product->description	= $product_description;
			$new_product->company_id 	= $id;
			$new_product->status 		= 'Active';
			$new_product->save();

			$datatopass = array(
				'message' => "You have succesfully Edited : <b>'".$product_name."'</b> product.",
			);
			return Redirect::to(URL::previous())->with('message_update',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('update_error',$validator->messages());
		}
	}

	public function delete_product($id,$product_id)
	{
		$validator = Validator::make(
		    array(
		        'delete_product' => $product_id,
		    ),
		    array(
		        'delete_product' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_product 	= Products::find($product_id);
			$delete_product		->delete();
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


	// public function incoming_shipments($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Incoming Shipments - Beezmode",
	// 		'page_label'	=> "Incoming Shipments",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.documents.incoming_shipments',$datatopass);
	// }

	// public function outgoing_shipments($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Outgoing Shipments - Beezmode",
	// 		'page_label'	=> "Outgoing Shipments",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.documents.outgoing_shipments',$datatopass);
	// }

	// public function inventory_adjustments($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Inventory Adjustments - Beezmode",
	// 		'page_label'	=> "Inventory Adjustments",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.documents.inventory_adjustments',$datatopass);
	// }

	// public function reports_warehouse($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Warehouse Reports - Beezmode",
	// 		'page_label'	=> "Warehouse Reports",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.documents.reports_warehouse',$datatopass);
	// }

	// public function product_cost($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Warehouse Product Cost - Beezmode",
	// 		'page_label'	=> "Warehouse Product Cost",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.product_cost',$datatopass);
	// }

	// public function current_inventory($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Warehouse Current Inventory - Beezmode",
	// 		'page_label'	=> "Current Inventory",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.inventory.current_inventory',$datatopass);
	// }

	// public function stock_movement($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Stock Movement - Beezmode",
	// 		'page_label'	=> "Stock Movement",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.inventory.stock_movement',$datatopass);
	// }

	// public function product_movement($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Product Movement - Beezmode",
	// 		'page_label'	=> "Product Movement",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.inventory.product_movement',$datatopass);
	// }

	// public function reports_inventory_warehouse($id)
	// {
	// 	$datatopass  = array(
	// 		'title' 		=> "Inventory Reports - Beezmode",
	// 		'page_label'	=> "Inventory Reports",
	// 		'page_header' 	=> Companies::where('id',$id)->first()->company_name,
	// 		'company' 		=> Companies::where('id',$id)->first(),
	// 		'user'			=> Confide::user()
	// 	);
	// 	return View::make('operations.warehouse.inventory.reports_inventory_warehouse',$datatopass);
	// }
}

