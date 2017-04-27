<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('users/login')->with('error',"Unauthorized action, please login.");
		}
	}
	else
	{
		$check_membership = CompanyMember::where('user_id',Confide::user()->id)->lists('company_id');
		if(Confide::user()->company_code != 'owner')
		{
			$company_code = Companies::where('company_code',Confide::user()->company_code)->first();
	        $owner_trial = User::find($company_code->owner_id)->trial_ends_at;
	        $owner_subscription_end = User::find($company_code->owner_id)->subscription_ends_at;  
		}
		else
		{
	        $owner_trial = Confide::user()->trial_ends_at;
	        $owner_subscription_end = Confide::user()->subscription_ends_at;
		}

		$checking_trial = $owner_trial->isFuture(); // true equals valid
        if($owner_subscription_end == NULL){
        	$checking_subscription = false;	
        }
        else
        {
	        $checking_subscription = $owner_subscription_end->isFuture(); // true equals valid
        }

        $validity_of_usage = ($checking_trial || $checking_subscription);
        if(!$validity_of_usage)
        {
        	return Redirect::to("pricing");
        }
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


Route::filter('view_company_member', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can('view_company_member'))
	{
		return Redirect::to(URL::previous());
	}
});

/*Custom Route Filters - UMGT*/
Route::filter('view_company', function(){
	if(Confide::user()->company_code != 'owner')
	{
		if(!Confide::user()->can("view_company") || Confide::user()->company_code == 'owner')
		{
			return Redirect::to(URL::previous());
		}
	}
});

Route::filter('add_company', function(){
	if(Confide::user()->company_code != 'owner')
	{
		if(!Confide::user()->can("add_company") || !Confide::user()->hasRole('Owner'))
		{
			return Redirect::to(URL::previous());
		}
	}
});

Route::filter('edit_company', function(){
	if(Confide::user()->company_code != 'owner')
	{
		if(!Confide::user()->can("edit_company") || !Confide::user()->hasRole('Owner'))
		{
			return Redirect::to(URL::previous());
		}
	}
});

Route::filter('delete_company', function(){
	if(Confide::user()->company_code != 'owner')
	{
		if(!Confide::user()->can("delete_company") || !Confide::user()->hasRole('Owner'))
		{
			return Redirect::to(URL::previous());
		}
	}
});


Route::filter('view_roles', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can("view_roles"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_roles', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can("add_roles"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('edit_roles', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can("edit_roles"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('delete_roles', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can("delete_roles"))
	{
		return Redirect::to(URL::previous());
	}
});


Route::filter('view_company_member', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can("view_company_member"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_company_member', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can("add_company_member"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('delete_company_member', function(){
	if(!Confide::user()->hasRole('Owner'))
	if(!Confide::user()->can("delete_company_member"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_brand', function(){
	if(!Confide::user()->can("view_brand"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_brand', function(){
	if(!Confide::user()->can("add_brand"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('edit_brand', function(){
	if(!Confide::user()->can("edit_brand"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('delete_brand', function(){
	if(!Confide::user()->can("delete_brand"))
	{
		return Redirect::to(URL::previous());
	}
});


Route::filter('view_category', function(){
	if(!Confide::user()->can("view_category"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_category', function(){
	if(!Confide::user()->can("add_category"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('edit_category', function(){
	if(!Confide::user()->can("edit_category"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('delete_category', function(){
	if(!Confide::user()->can("delete_category"))
	{
		return Redirect::to(URL::previous());
	}
});


Route::filter('view_warehouse', function(){
	if(!Confide::user()->can("view_warehouse"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_warehouse', function(){
	if(!Confide::user()->can("add_warehouse"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('edit_warehouse', function(){
	if(!Confide::user()->can("edit_warehouse"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('delete_warehouse', function(){
	if(!Confide::user()->can("delete_warehouse"))
	{
		return Redirect::to(URL::previous());
	}
});


Route::filter('view_product', function(){
	if(!Confide::user()->can("view_product"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_product', function(){
	if(!Confide::user()->can("add_product"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('edit_product', function(){
	if(!Confide::user()->can("edit_product"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('delete_product', function(){
	if(!Confide::user()->can("delete_product"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_delivery', function(){
	if(!Confide::user()->can("view_delivery"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_delivery', function(){
	if(!Confide::user()->can("add_delivery"))
	{
		return Redirect::to(URL::previous());
	}
});
Route::filter('delete_delivery', function(){
	if(!Confide::user()->can("delete_delivery"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_service', function(){
	if(!Confide::user()->can("view_service"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_service', function(){
	if(!Confide::user()->can("add_service"))
	{
		return Redirect::to(URL::previous());
	}
});
Route::filter('delete_service', function(){
	if(!Confide::user()->can("delete_service"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_report', function(){
	if(!Confide::user()->can("view_report"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_order', function(){
	if(!Confide::user()->can("view_order"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_order', function(){
	if(!Confide::user()->can("add_order"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('edit_order', function(){
	if(!Confide::user()->can("edit_order"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('delete_order', function(){
	if(!Confide::user()->can("delete_order"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_sales_summary', function(){
	if(!Confide::user()->can("view_sales_summary"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_sales_setup', function(){
	if(!Confide::user()->can("view_sales_setup"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_client', function(){
	if(!Confide::user()->can("view_client"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('add_client', function(){
	if(!Confide::user()->can("add_client"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_purchase', function(){
	if(!Confide::user()->can("view_purchase"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_bill', function(){
	if(!Confide::user()->can("view_bill"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_add_bill', function(){
	if(!Confide::user()->can("view_add_bill"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_retailer', function(){
	if(!Confide::user()->can("view_retailer"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_add_retailer', function(){
	if(!Confide::user()->can("view_add_retailer"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_product_service', function(){
	if(!Confide::user()->can("view_product_service"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_add_service', function(){
	if(!Confide::user()->can("view_add_service"))
	{
		return Redirect::to(URL::previous());
	}
});


Route::filter('view_accounting', function(){
	if(!Confide::user()->can("view_accounting"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_transaction_list', function(){
	if(!Confide::user()->can("view_transaction_list"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_accounts_list', function(){
	if(!Confide::user()->can("view_accounts_list"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_journal', function(){
	if(!Confide::user()->can("view_journal"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_add_journal', function(){
	if(!Confide::user()->can("view_add_journal"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_balances', function(){
	if(!Confide::user()->can("view_balances"))
	{
		return Redirect::to(URL::previous());
	}
});

Route::filter('view_add_balances', function(){
	if(!Confide::user()->can("view_add_balances"))
	{
		return Redirect::to(URL::previous());
	}
});




