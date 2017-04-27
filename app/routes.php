<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','WebPageController@index');
Route::get('features', 'WebPageController@features');
Route::get('pricing', 'WebPageController@pricing');
Route::get('contact', 'WebPageController@contact');
//

// Confide routes - Auth Routes
Route::get('users/create', 'UsersController@create'); //DONE
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login'); //DONE
Route::post('users/login', 'UsersController@doLogin'); 
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword'); //DONE
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword'); //DONE
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');


//App Routes
Route::get('company', array('before' => 'auth|view_company', 'uses' => 'AppController@company_list_view'));
Route::post('add_company', array('before' => 'auth|add_company', 'uses' => 'AppController@add_company'));
Route::post('change_company_code/{id}', array('before' => 'auth|add_company', 'uses' => 'AppController@change_company_code'));
Route::post('update_company/{id}', array('before' => 'auth|edit_company', 'uses' => 'AppController@update_company'));
Route::get('delete_company/{id}', array('before' => 'auth|delete_company', 'uses' => 'AppController@delete_company'));
Route::get('dashboard/{id}', array('before' => 'auth', 'uses' => 'AppController@dashboard'));
Route::get('user_profile/{id}/{username}', array('before' => 'auth', 'uses' => 'AppController@user_profile'));
Route::get('user_profile_settings/{id}', array('before' => 'auth', 'uses' => 'AppController@user_profile_settings'));
Route::post('update_user_profile',array('before' => 'auth', 'uses' => 'AppController@update_user_profile'));
Route::get('company_profile/{id}', array('before' => 'auth', 'uses' => 'AppController@company_profile'));
Route::post('update_company_profile/{id}', array('before' => 'auth', 'uses' => 'AppController@update_company_profile'));
Route::post('update_company_mission_vision/{id}', array('before' => 'auth', 'uses' => 'AppController@update_company_mission_vision'));
Route::post('update_company_summary/{id}', array('before' => 'auth', 'uses' => 'AppController@update_company_summary'));
Route::post('update_company_address/{id}', array('before' => 'auth', 'uses' => 'AppController@update_company_address'));
Route::post('update_company_contact/{id}', array('before' => 'auth', 'uses' => 'AppController@update_company_contact'));
Route::get('message/{id}',array('before' => 'auth', 'uses' => 'AppController@message'));
Route::post('send_message',array('before' => 'auth', 'uses' => 'AppController@send_message'));
Route::post('read_message',array('before' => 'auth', 'uses' => 'AppController@read_message'));
Route::get('get_your_message',array('before' => 'auth', 'uses' => 'AppController@get_your_message'));
Route::get('get_notyour_message',array('before' => 'auth', 'uses' => 'AppController@get_notyour_message'));

/*Company Members*/
Route::get('company_members_list/{id}', array('before' => 'auth|view_company_member', 'uses' => 'AppController@company_members_list'));

Route::post('add_company_members/{id}',array('before' => 'auth', 'uses' => 'AppController@add_company_members'));

Route::post('add_company_members/{id}',array('before' => 'auth|add_company_member', 'uses' => 'AppController@add_company_members'));

Route::post('company_drag_order', array('before' => 'auth', 'uses' => 'AppController@company_drag_order'));

//===== OPERATIONS - SALES =====
Route::get('sales/{id}/sales_summary', array('before' => 'auth', 'uses' =>'SalesController@sales_summary'));
Route::get('sales/{id}/sales_settings', array('before' => 'auth|view_sales_setup', 'uses' =>'SalesController@sales_settings'));
Route::post('sales/{id}/add_unit', array('before' => 'auth|add_unit', 'uses' =>'SalesController@add_unit'));
Route::post('sales/{id}/edit_unit', array('before' => 'auth|edit_unit', 'uses' =>'SalesController@edit_unit'));
Route::post('sales/{id}/delete_unit', array('before' => 'auth|delete_unit', 'uses' =>'SalesController@delete_unit'));
Route::post('sales/{id}/add_vat', array('before' => 'auth|add_vat', 'uses' =>'SalesController@add_vat'));
Route::post('sales/{id}/edit_vat', array('before' => 'auth|edit_vat', 'uses' =>'SalesController@edit_vat'));
Route::post('sales/{id}/delete_vat', array('before' => 'auth|delete_vat', 'uses' =>'SalesController@delete_vat'));
Route::post('sales/{id}/add_payment', array('before' => 'auth|add_payment', 'uses' =>'SalesController@add_payment'));
Route::post('sales/{id}/edit_payment', array('before' => 'auth|edit_payment', 'uses' =>'SalesController@edit_payment'));
Route::post('sales/{id}/delete_payment', array('before' => 'auth|delete_payment', 'uses' =>'SalesController@delete_payment'));
Route::get('sales/{id}/process_order', array('before' => 'auth', 'uses' =>'OrderAppController@process_order'));
Route::get('sales/{id}/view_order/{order_id}', array('before' => 'auth', 'uses' =>'OrderAppController@view_order'));
Route::get('sales/{id}/invoice_order/{order_id}', array('before' => 'auth', 'uses' =>'OrderAppController@invoice_order'));
Route::get('sales/{id}/order_list_generic', array('before' => 'auth|view_order', 'uses' =>'OrderAppController@order_list_generic'));
Route::get('sales/{id}/order_generic', array('before' => 'auth|add_order', 'uses' =>'OrderAppController@order_generic'));
Route::get('sales/{id}/add_product_order_view', array('before' => 'auth|add_order', 'uses' =>'OrderAppController@add_product_order_view'));
Route::post('sales/{id}/add_order', array('before' => 'auth', 'uses' =>'OrderAppController@add_order'));
Route::post('sales/{id}/get_products', array('before' => 'auth', 'uses' =>'OrderAppController@get_products'));
Route::get('sales/{id}/order_update_generic_view/{order_id}', array('before' => 'auth', 'uses' =>'OrderAppController@order_update_generic_view'));
Route::post('sales/{id}/order_update_generic/{order_id}', array('before' => 'auth', 'uses' =>'OrderAppController@order_update_generic'));
Route::get('sales/{id}/delete_order/{order_id}', array('before' => 'auth', 'uses' =>'OrderAppController@delete_order'));
Route::get('sales/{id}/alldocs_sales', array('before' => 'auth', 'uses' =>'SalesController@alldocs_sales'));
Route::get('sales/{id}/approval_sales', array('before' => 'auth', 'uses' =>'SalesController@approval_sales'));
Route::get('sales/{id}/payment_sales', array('before' => 'auth', 'uses' =>'SalesController@payment_sales'));
Route::get('sales/{id}/invoice_sales', array('before' => 'auth', 'uses' =>'SalesController@invoice_sales'));
//Route::get('sales/{id}/reports_sales', array('before' => 'auth', 'uses' =>'SalesController@reports_sales'));
Route::get('sales/{id}/prospect_clients', array('before' => 'auth', 'uses' =>'SalesController@prospect_clients'));
Route::get('sales/{id}/list_clients', array('before' => 'auth', 'uses' =>'SalesController@list_clients'));
Route::get('sales/{id}/client_list', array('before' => 'auth|view_client', 'uses' =>'SalesController@client_list'));
Route::get('sales/{id}/client_list_dynamic', array('before' => 'auth', 'uses' =>'SalesController@client_list_dynamic'));
Route::get('sales/{id}/client_edit_view/{client_id}', array('before' => 'auth', 'uses' =>'SalesController@client_edit_view'));
Route::get('sales/{id}/add_client_view', array('before' => 'auth|view_client', 'uses' =>'SalesController@add_client_view'));
Route::post('sales/{id}/add_client_view', array('before' => 'auth|add_client', 'uses' =>'SalesController@add_client'));
Route::get('sales/{id}/client_delete/{client_id}', array('before' => 'auth', 'uses' =>'SalesController@client_delete'));
Route::post('sales/{id}/client_edit/{client_id}', array('before' => 'auth', 'uses' =>'SalesController@client_edit'));
Route::post('sales/{id}/delete_client', array('before' => 'auth', 'uses' =>'SalesController@delete_client'));
//Route::get('sales/{id}/reports_clients', array('before' => 'auth', 'uses' =>'SalesController@reports_clients'));
Route::get('sales/{id}/list_products', array('before' => 'auth', 'uses' =>'SalesController@list_products'));
Route::get('sales/{id}/list_price', array('before' => 'auth', 'uses' =>'SalesController@list_price'));
Route::get('sales/{id}/product_lots', array('before' => 'auth', 'uses' =>'SalesController@product_lots'));
//Route::get('sales/{id}/reports_products', array('before' => 'auth', 'uses' =>'SalesController@reports_products'));

Route::get('sales/{id}/service_list', array('before' => 'auth|view_service', 'uses' =>'SalesController@service_list'));
Route::get('sales/{id}/spare_part', array('before' => 'auth|view_service', 'uses' =>'SalesController@spare_part'));
Route::get('sales/{id}/technician_allowance', array('before' => 'auth|view_service', 'uses' =>'SalesController@technician_allowance'));
Route::get('sales/{id}/new_service_list', array('before' => 'auth|add_service', 'uses' =>'SalesController@new_service_list'));
Route::get('sales/{id}/add_spare_part_view', array('before' => 'auth|add_service', 'uses' =>'SalesController@add_spare_part_view'));
Route::get('sales/{id}/add_technician_allowance_view', array('before' => 'auth|add_service', 'uses' =>'SalesController@add_technician_allowance_view'));
Route::get('sales/{id}/add_service', array('before' => 'auth|add_service', 'uses' =>'SalesController@add_service'));
Route::get('sales/{id}/view_service_list/{service_id}', array('before' => 'auth|view_service', 'uses' =>'SalesController@view_service_list'));
Route::get('sales/{id}/update_service/{service_id}', array('before' => 'auth|view_service', 'uses' =>'SalesController@update_service'));
Route::post('sales/{id}/add_service_list', array('before' => 'auth|add_service', 'uses' =>'SalesController@add_service_list'));
Route::post('sales/{id}/add_service_report', array('before' => 'auth|add_service', 'uses' =>'SalesController@add_service_report'));
Route::post('sales/{id}/add_sparepart', array('before' => 'auth|add_service', 'uses' =>'SalesController@add_sparepart'));
Route::get('sales/{id}/delete_service_list/{service_id}', array('before' => 'auth|delete_service', 'uses' =>'SalesController@delete_service_list'));

// Route::get('sales/{id}/service_list_price', array('before' => 'auth', 'uses' =>'SalesController@service_list_price'));
Route::get('sales/{id}/delivery_list', array('before' => 'auth|view_delivery', 'uses' =>'SalesController@delivery_list'));
Route::get('sales/{id}/view_delivery_list/{delivery_list}', array('before' => 'auth|view_delivery', 'uses' =>'SalesController@view_delivery_list'));
Route::get('sales/{id}/new_delivery_list', array('before' => 'auth|add_delivery', 'uses' =>'SalesController@new_delivery_list'));
Route::post('sales/{id}/add_delivery', array('before' => 'auth|add_delivery', 'uses' =>'SalesController@add_delivery'));
Route::post('sales/{id}/edit_delivery', array('before' => 'auth|edit_delivery', 'uses' =>'SalesController@edit_delivery'));
Route::get('sales/{id}/delete_delivery/{delivery_id}', array('before' => 'auth|delete_delivery', 'uses' =>'SalesController@delete_delivery'));
Route::post('sales/{id}/get_quantity', array('before' => 'auth|view_delivery', 'uses' =>'SalesController@get_quantity'));
//Route::get('sales/{id}/reports_services', array('before' => 'auth', 'uses' =>'SalesController@reports_services'));

//===== OPERATIONS - SALES =====
Route::get('warehouse/{id}/warehouse_summary', array('before' => 'auth', 'uses' =>'WarehouseController@warehouse_summary'));
Route::get('warehouse/{id}/manage_warehouse', array('before' => 'auth|view_warehouse', 'uses' =>'WarehouseController@manage_warehouse'));
// Route::get('warehouse/{id}/warehouse_list', array('before' => 'auth|view_warehouse', 'uses' =>'WarehouseController@warehouse_list'));
Route::post('warehouse/{id}/add_warehouse', array('before' => 'auth|add_warehouse', 'uses' =>'WarehouseController@add_warehouse'));
Route::post('warehouse/{id}/edit_warehouse', array('before' => 'auth|edit_warehouse', 'uses' =>'WarehouseController@edit_warehouse'));
Route::post('warehouse/{id}/delete_warehouse', array('before' => 'auth|delete_warehouse', 'uses' =>'WarehouseController@delete_warehouse'));
// Route::get('warehouse/{id}/category_list', array('before' => 'auth|view_category', 'uses' =>'WarehouseController@category_list'));
Route::post('warehouse/{id}/add_category', array('before' => 'auth|add_category', 'uses' =>'WarehouseController@add_category'));
Route::post('warehouse/{id}/edit_category', array('before' => 'auth|edit_category', 'uses' =>'WarehouseController@edit_category'));
Route::post('warehouse/{id}/delete_category', array('before' => 'auth|delete_category', 'uses' =>'WarehouseController@delete_category'));
// Route::get('warehouse/{id}/brand_list', array('before' => 'auth|view_brand', 'uses' =>'WarehouseController@brand_list'));
Route::post('warehouse/{id}/add_brand', array('before' => 'auth|add_brand', 'uses' =>'WarehouseController@add_brand'));
Route::post('warehouse/{id}/edit_brand', array('before' => 'auth|edit_brand', 'uses' =>'WarehouseController@edit_brand'));
Route::post('warehouse/{id}/delete_brand', array('before' => 'auth|delete_brand', 'uses' =>'WarehouseController@delete_brand'));

// Route::get('warehouse/{id}/product_list', array('before' => 'auth|view_product', 'uses' =>'WarehouseController@product_list'));
Route::get('warehouse/{id}/add_product_view', array('before' => 'auth', 'uses|add_product' =>'WarehouseController@add_product_view'));

Route::get('warehouse/{id}/product_list', array('before' => 'auth|view_product', 'uses' =>'WarehouseController@product_list'));
Route::get('warehouse/{id}/add_product_view', array('before' => 'auth|add_product', 'uses' =>'WarehouseController@add_product_view'));

Route::get('warehouse/{id}/update_product_view/{product_id}', array('before' => 'auth|edit_product', 'uses' =>'WarehouseController@update_product_view'));
Route::post('warehouse/{id}/add_product', array('before' => 'auth|add_product', 'uses' =>'WarehouseController@add_product'));
Route::post('warehouse/{id}/update_product/{product_id}', array('before' => 'auth|edit_product', 'uses' =>'WarehouseController@update_product'));
Route::post('warehouse/{id}/upload_image_product/{product_id}', array('before' => 'auth|edit_product', 'uses' =>'WarehouseController@upload_image_product'));
Route::get('warehouse/{id}/delete_product/{product_id}', array('before' => 'auth|delete_product', 'uses' =>'WarehouseController@delete_product'));
// Route::get('warehouse/{id}/incoming_shipments', array('before' => 'auth', 'uses' =>'WarehouseController@incoming_shipments'));
// Route::get('warehouse/{id}/outgoing_shipments', array('before' => 'auth', 'uses' =>'WarehouseController@outgoing_shipments'));
// Route::get('warehouse/{id}/inventory_adjustments', array('before' => 'auth', 'uses' =>'WarehouseController@inventory_adjustments'));
// Route::get('warehouse/{id}/reports_warehouse', array('before' => 'auth', 'uses' =>'WarehouseController@reports_warehouse'));
// Route::get('warehouse/{id}/product_cost', array('before' => 'auth', 'uses' =>'WarehouseController@product_cost'));
// Route::get('warehouse/{id}/current_inventory', array('before' => 'auth', 'uses' =>'WarehouseController@current_inventory'));
// Route::get('warehouse/{id}/stock_movement', array('before' => 'auth', 'uses' =>'WarehouseController@stock_movement'));
// Route::get('warehouse/{id}/product_movement', array('before' => 'auth', 'uses' =>'WarehouseController@product_movement'));
// Route::get('warehouse/{id}/reports_inventory_warehouse', array('before' => 'auth', 'uses' =>'WarehouseController@reports_inventory_warehouse'));


// OPERATION -- ACCOUNTING
Route::get('accounting/{id}/transaction_list', array('before' => 'auth|view_transaction_list', 'uses' =>'AccountingController@transaction_list'));

Route::post('accounting/{id}/add_transac', array('before' => 'auth', 'uses' =>'AccountingController@add_transac'));

Route::get('accounting/{id}/delete_transac/{transac_id}', array('before' => 'auth', 'uses' =>'AccountingController@delete_transac'));

Route::get('accounting/{id}/journal_list', array('before' => 'auth|view_journal', 'uses' =>'AccountingController@journal_list'));
Route::post('accounting/{id}/add_journal', array('before' => 'auth', 'uses' =>'AccountingController@add_journal'));

Route::get('accounting/{id}/add_journal_transactions', array('before' => 'auth|view_add_journal', 'uses' =>'AccountingController@add_journal_transactions'));

Route::get('accounting/{id}/view_journal_transactions/{jt}', array('before' => 'auth', 'uses' =>'AccountingController@view_journal_transactions'));

Route::get('accounting/{id}/delete_journal/{jid}', array('before' => 'auth', 'uses' =>'AccountingController@delete_journal'));

Route::post('accounting/{id}/add_account', array('before' => 'auth', 'uses' =>'AccountingController@add_account'));

Route::get('accounting/{id}/delete_asset_account/{asset_id}', array('before' => 'auth', 'uses' =>'AccountingController@delete_asset_account'));

Route::get('accounting/{id}/delete_liability_account/{liab_id}', array('before' => 'auth', 'uses' =>'AccountingController@delete_liability_account'));

Route::get('accounting/{id}/delete_income_account/{income_id}', array('before' => 'auth', 'uses' =>'AccountingController@delete_liability_account'));

Route::get('accounting/{id}/delete_expense_account/{exp_id}', array('before' => 'auth', 'uses' =>'AccountingController@delete_expense_account'));

Route::get('accounting/{id}/delete_equity_account/{equ_id}', array('before' => 'auth', 'uses' =>'AccountingController@delete_equity_account'));

Route::get('accounting/{id}/accounts_list', array('before' => 'auth|view_accounts_list', 'uses' =>'AccountingController@accounts_list'));

Route::get('accounting/{id}/balance_list', array('before' => 'auth|view_balances', 'uses' =>'AccountingController@balance_list'));
Route::get('accounting/{id}/view_balance/{vb}', array('before' => 'auth', 'uses' =>'AccountingController@view_balance'));

Route::get('accounting/{id}/add_account_balance', array('before' => 'auth|view_add_balances', 'uses' =>'AccountingController@add_account_balance'));

Route::post('accounting/{id}/add_account_balances', array('before' => 'auth', 'uses' =>'AccountingController@add_account_balances'));

Route::get('accounting/{id}/delete_balance/{vb}', array('before' => 'auth', 'uses' =>'AccountingController@delete_balance'));

// PURCHASESS

Route::get('purchases/{id}/bill_view', array('before' => 'auth|view_bill', 'uses' =>'PurchasesController@bill_view'));
Route::get('purchases/{id}/retailer_view', array('before' => 'auth|view_retailer', 'uses' =>'PurchasesController@retailer_view'));
Route::get('purchases/{id}/add_retailer_view', array('before' => 'auth|view_add_retailer', 'uses' =>'PurchasesController@add_retailer_view'));
Route::get('purchases/{id}/products_services_view', array('before' => 'auth|view_product_service', 'uses' =>'PurchasesController@products_services_view'));
Route::get('purchases/{id}/add_bill_view', array('before' => 'auth|view_add_bill', 'uses' =>'PurchasesController@add_bill_view'));
Route::post('purchases/{id}/add_retailer_view', array('before' => 'auth', 'uses' =>'PurchasesController@add_retailer'));
Route::get('purchases/{id}/retailer_delete/{retailer_id}', array('before' => 'auth', 'uses' =>'PurchasesController@retailer_delete'));
Route::get('purchases/{id}/edit_retailer_view/{retailer_id}', array('before' => 'auth', 'uses' =>'PurchasesController@edit_retailer_view'));
Route::post('purchases/{id}/edit_retailer/{retailer_id}', array('before' => 'auth', 'uses' =>'PurchasesController@edit_retailer'));
Route::get('purchases/{id}/add_services_view', array('before' => 'auth|view_add_service', 'uses' =>'PurchasesController@add_services_view'));
Route::post('purchases/{id}/add_services_view', array('before' => 'auth', 'uses' =>'PurchasesController@add_services'));
Route::get('purchases/{id}/service_delete/{service_id}', array('before' => 'auth', 'uses' =>'PurchasesController@service_delete'));
Route::get('purchases/{id}/edit_services_view/{service_id}', array('before' => 'auth', 'uses' =>'PurchasesController@edit_services_view'));
Route::post('purchases/{id}/edit_services/{service_id}', array('before' => 'auth', 'uses' =>'PurchasesController@edit_services'));
Route::post('purchases/{id}/add_bill_view', array('before' => 'auth', 'uses' =>'PurchasesController@add_bill'));
Route::get('purchases/{id}/bill_delete/{bill_id}', array('before' => 'auth', 'uses' =>'PurchasesController@bill_delete'));
Route::get('purchases/{id}/edit_bill_view/{bill_id}', array('before' => 'auth', 'uses' =>'PurchasesController@edit_bill_view'));


//===== ADMIN - GENERAL SETTINGS =====
Route::get('gensettings/{id}/customer_support', array('before' => 'auth', 'uses' =>'GenSetController@customer_support'));
Route::get('gensettings/{id}/account_settings', array('before' => 'auth', 'uses' =>'GenSetController@account_settings'));
Route::get('gensettings/{id}/company_profile', array('before' => 'auth', 'uses' =>'GenSetController@company_profile'));

//Report Issue 
Route::get('report_issues/{id}/business_issue_list', array('before' => 'auth|view_report', 'uses' =>'GenSetController@business_issue_list'));
Route::post('add_business_report/{id}',array('before' => 'auth', 'uses' => 'GenSetController@add_business_report'));
Route::post('update_business_report/{issue_id}',array('before' => 'auth', 'uses' => 'GenSetController@update_business_report'));
Route::post('add_technical_report/{id}',array('before' => 'auth', 'uses' => 'GenSetController@add_technical_report'));
Route::post('update_technical_report/{report_id}',array('before' => 'auth', 'uses' => 'GenSetController@update_technical_report'));
Route::get('report_issues/{id}/technical_issue_list', array('before' => 'auth|view_report', 'uses' =>'GenSetController@technical_issue_list'));



Route::get('umgtsettings/{id}/umgt_setup', array('before' => 'auth', 'uses' =>'UMGTController@umgt_setup'));
Route::get('umgtsettings/{id}/umgt_roles', array('before' => 'auth|view_roles', 'uses' =>'UMGTController@umgt_roles'));
Route::get('umgtsettings/{id}/umgt_profiles', array('before' => 'auth', 'uses' =>'UMGTController@umgt_profiles'));


//UMGT - Permissions
Route::get('umgtsettings/{id}/permissions/{role_id}', array('before' => 'auth|edit_roles', 'uses' =>'UMGTController@umgt_permissions'));

//CRUD UMGT
Route::post('umgtsettings/{id}/add_roles', array('before' => 'auth|add_roles', 'uses' =>'UMGTController@add_roles'));
Route::post('umgtsettings/{id}/update_roles', array('before' => 'auth|edit_roles', 'uses' =>'UMGTController@update_roles'));
Route::post('umgtsettings/{id}/delete_roles', array('before' => 'auth|update_roles', 'uses' =>'UMGTController@delete_roles'));

//UMGT - Permissions
Route::post('umgt_edit_permissions/{role_id}', array('before' => 'auth|edit_roles', 'uses' =>'UMGTController@umgt_edit_permissions'));
Route::post('umgt_edit_role_users/{role_id}', array('before' => 'auth|edit_roles', 'uses' =>'UMGTController@umgt_edit_role_users'));

//===== SYSAPP =====
Route::get('sysapp/{id}/calendar', array('before' => 'auth', 'uses' =>'SysAppController@calendar'));
Route::post('sysapp/{id}/update_calendar',array('before' => 'auth', 'uses' =>'SysAppController@update_calendar'));
Route::get('sysapp/{id}/get_events',array('before' => 'auth', 'uses' =>'SysAppController@get_events'));

//API POS
Route::get('pos_sales/{id}', array('before' => 'auth|view_sales_summary', 'uses' =>'AppController@gas_sales'));

/*Payment*/
Route::post('payment', array('before' => 'auth', 'uses' =>"AppController@payment"));

/*Branch Management Module*/
Route::get('bm_manage', array('before' => 'guest', 'uses' =>'AppController@login_encrypt'));
Route::post('encryptor', array('before' => 'guest', 'uses' =>'AppController@login_encryptor'));
Route::post('update_api_connection', array('before' => 'guest', 'uses' =>'AppController@update_api_connection'));

/*Test*/
Route::post('test',function(){
	
	//feel free to use this :* -- Niko
	

	$user->subscription('basic')->create(Input::get('stripeToken'));
	$user->trial_ends_at = Carbon::now();
	$user->subscription_ends_at = Carbon::now()->addDays(30);
	$user->save();
});



