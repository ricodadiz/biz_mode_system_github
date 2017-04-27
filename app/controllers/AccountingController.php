<?php

class AccountingController extends Controller {

	public function transaction_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Transactions - Beezmode",
			'page_label'	=> "Transactions",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'transaction'	=> Transactions::all(),
			'income_count'  => Transactions::count(),
			'category'		=> array_reverse(Accounts::distinct()->orderBy('category','desc')->lists('category')),
			'account'		=> array_reverse(Accounts::distinct()->orderBy('category','desc')->lists('category')),
			'account_name'	=> Accounts::orderBy('category','desc')->get(),
		);
		return View::make('operations.accounting.transactions',$datatopass);
	}

	public function add_transac($id)
	{
		$transac_date = strip_tags(Input::get("date"));
		$transac_category = strip_tags(Input::get("category"));
		$transac_type = strip_tags(Input::get("type"));
		$transac_amount = strip_tags(Input::get("amount"));
		$transac_description = strip_tags(Input::get("description"));
		$transac_account = strip_tags(Input::get("account"));

		$validator = Validator::make(
		    array(
		        'date' => $transac_date,
		        'category' => $transac_category,
		        'type'	=> $transac_type,
		        'amount' => $transac_amount,
		        'description' => $transac_description,
		        'account' => $transac_account,
		    ),
		    array(
		        'date' => 'required',
		        'category' => 'required',
		        'type'	=> 'required',
		        'amount' => 'required',
		        'description' => 'regex:/^[(a-zA-Z\s)]+$/u|min:3',
		        'account' => 'required',
		    )
		);
		
		if($validator->passes())
		{
			$add_transac = new Transactions;
			$add_transac->company_id = $id;
			$add_transac->date  	= $transac_date;
			$add_transac->category 	= $transac_category;
			$add_transac->type 		= $transac_type;
			$add_transac->amount 	= $transac_amount;
			$add_transac->description= $transac_description;
			$add_transac->account 	= $transac_account;
			$add_transac->save();

			$datatopass = array(
				'message' => "You have succesfully added new transaction!"
			);
			return Redirect::to(URL::previous())->with('message_add_transac',$datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'message'=> $validator->messages(),
			);
			return Redirect::to(URL::previous())->with('message_error_transac',$datatopass);
		}
	}

	public function delete_transac($id,$transac_id)
	{

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_transac 	= Transactions::find($transac_id);
			$prev   			= $delete_transac->$id;
			$delete_transac		->delete();
			$datatopass 		= array(
				'message' => "You have succesfully deleted your income",
			);
			return Redirect::to(URL::previous())->with('message_delete',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_error',$validator->messages());
		}
	}

	public function accounts_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Accounts - Beezmode",
			'page_label'	=> "Accounts",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'asset'			=> Accounts::where('category','Asset')->get(),
			'liability'		=> Accounts::where('category','Liability')->get(),
			'income'		=> Accounts::where('category','Income')->get(),
			'expense'		=> Accounts::where('category','Expense')->get(),
			'equity'		=> Accounts::where('category','Equity')->get(),


		);
		return View::make('operations.accounting.accounts',$datatopass);
	}

	public function add_account($id)
	{
		$account_category = strip_tags(Input::get("account_category"));
		$account_name = strip_tags(Input::get("account_name"));
		$account_payment = (Input::has("account_payment")) ? true : false;

		$validator = Validator::make(
		    array(
		        'category' 			=> $account_category,
		        'name' 				=> $account_name,
		        'payment_account'	=> $account_payment,
		     ),
		    array(
		        'category' 			=> 'required',
		        'name' 				=> 'required',
		        
		     )
		);
		
		if($validator->passes())
		{
			$add_account = new Accounts;
			$add_account->company_id 			= $id;
			$add_account->category 				= $account_category;
			$add_account->name 					= $account_name;
			$add_account->payment_account 		= $account_payment;
			$add_account->save();

			$datatopass = array(
				'message' => "You have succesfully added new account!"
			);
			return Redirect::to(URL::previous())->with('message_add', $datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'message'=> $validator->messages(),
			);
			return Redirect::to(URL::previous())->with('message_error', $datatopass);
		}
	}

	public function delete_asset_account($id,$asset_id)
	{

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_asset 		= Accounts::find($asset_id);
			$prev   			= $delete_asset->$id;
			$delete_asset		->delete();
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

	public function delete_liability_account($id,$liab_id)
	{

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_liab 		= Accounts::find($liab_id);
			$prev   			= $delete_liab->$id;
			$delete_liab		->delete();
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

	public function delete_income_account($id,$income_id)
	{

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_inc 		= Accounts::find($income_id);
			$prev   			= $delete_inc->$id;
			$delete_inc			->delete();
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

	public function delete_expense_account($id,$exp_id)
	{

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_exp 		= Accounts::find($exp_id);
			$prev   			= $delete_exp->$id;
			$delete_exp			->delete();
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

	public function delete_equity_account($id,$equ_id)
	{

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_equ 		= Accounts::find($equ_id);
			$prev   			= $delete_equ->$id;
			$delete_equ			->delete();
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

	public function journal_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Journal Transactions - Beezmode",
			'page_label'	=> "Journal Transactions",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'journal_transac' => JournalTransactions::all(),
			'journal_transac_count' => JournalTransactions::count(),

		);
		return View::make('operations.accounting.journal_transactions',$datatopass);
	}

	public function view_journal_transactions($id,$jt)
	{
		$datatopass  = array(
			'title' 		=> "Journal Transaction Information - Beezmode",
			'page_label'	=> "Journal Transaction Information",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'journal_transac' => JournalTransactions::where('id',$jt)->get(),
			'journal_account' => JournalAccounts::where('account_id',$jt)->get()
		);
		return View::make('operations.accounting.view_journal_transactions',$datatopass);
	}


	public function add_journal_transactions($id)
	{

		$datatopass  = array(
			'title' 		=> "Add Journal Transactions - Beezmode",
			'page_label'	=> "Add Journal Transactions",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'asset'			=> Accounts::where('category','Asset')->get(),
			'liability'		=> Accounts::where('category','Liability')->get(),
			'income'		=> Accounts::where('category','Income')->get(),
			'expense'		=> Accounts::where('category','Expense')->get(),
			'equity'		=> Accounts::where('category','Equity')->get(),
			'category'		=> array_reverse(Accounts::distinct()->orderBy('category','desc')->lists('category')),
			'account_name'	=> Accounts::orderBy('category','desc')->get(),
		);
		return View::make('operations.accounting.add_journal_transactions',$datatopass);
	}

	public function add_journal($id)
	{
		$journal_name = strip_tags(Input::get("journal_name"));
		$journal_date = strip_tags(Input::get("date"));

		$journal_account = (Input::get("account_name"));
		$journal_description = (Input::get("description"));
		$journal_debit = (Input::get("debit"));
		$journal_credit = (Input::get("credit"));

		$journal_total_debit =(Input::get("total_debit"));
		$journal_total_credit =(Input::get("total_credit"));

		$validator = Validator::make(
		    array(
		        'name' 			=> $journal_name,
		        'date' 			=> $journal_date,
		        'total_debit'	=> $journal_debit,
		        'total_credit'	=> $journal_credit
		     ),
		    array(
		        'name' 			=> 'required',
		        'date' 			=> 'required',
		        'total_debit' 	=> 'required',
		        'total_credit' 	=> 'required',
		        
		     )
		);
		
		if($validator->passes())
		{

			$add_journal_transac = new JournalTransactions;
			$add_journal_transac->company_id 	=$id;
			$add_journal_transac->name 			=$journal_name;
			$add_journal_transac->date 			=$journal_date;
			$add_journal_transac->total_debit	=$journal_total_debit;
			$add_journal_transac->total_credit 	=$journal_total_credit;
			$add_journal_transac->save();


			$i=0;
			foreach($journal_account as $ja)
			{
				$add_journal_account = new JournalAccounts;
				$add_journal_account->account_id 	= $add_journal_transac->id;
				$add_journal_account->account_name 	= $journal_account[$i];
				$add_journal_account->description 	= $journal_description[$i];
				$add_journal_account->debit 	  	= $journal_debit[$i];
				$add_journal_account->credit 	  	= $journal_credit[$i];
				$add_journal_account->save();
				$i++;
			}
			$datatopass = array(
				'message' => "You have succesfully added new journal transaction!"
			);
			return Redirect::to(URL::previous())->with('message_add', $datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'message'=> $validator->messages(),
			);
			return Redirect::to(URL::previous())->with('message_error', $datatopass);
		}
	}

	public function delete_journal($id,$jid){

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_journal 	= JournalTransactions::find($jid);
			$prev   			= $delete_journal->$id;
			$delete_journal		->delete();
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

	public function balance_list($id)
	{
		$datatopass  = array(
			'title' 		=> "Balances - Beezmode",
			'page_label'	=> "Balances",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'balance_list'	=> AccountBalances::all(),
			'current_debit' => AccountBalances::sum('total_debit'),
			'current_credit' => AccountBalances::sum('total_credit'),

		);
		return View::make('operations.accounting.balances',$datatopass);
	}

	public function view_balance($id,$vb)
	{
		$datatopass  = array(
			'title' 		=> "Balance Information - Beezmode",
			'page_label'	=> "Balance Information",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'balance_list'	=> AccountBalances::where('id',$vb)->get(),
			'balance_info'	=> AccountBalancesTwos::where('account_id',$vb)->get(),
			// 'journal_transac' => JournalTransactions::where('id',$jt)->get(),
			// 'journal_account' => JournalAccounts::where('account_id',$jt)->get()
		);
		return View::make('operations.accounting.view_balances',$datatopass);
	}

	public function add_account_balance($id)
	{
		$datatopass  = array(
			'title' 		=> "Add Account Balances - Beezmode",
			'page_label'	=> "Add Account Balances",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'category'		=> array_reverse(Accounts::distinct()->orderBy('category','desc')->lists('category')),
			'account'		=> array_reverse(Accounts::distinct()->orderBy('category','desc')->lists('category')),
			'account_name'	=> Accounts::orderBy('category','desc')->get(),
		);
		return View::make('operations.accounting.add_account_balances',$datatopass);
	}

	public function add_account_balances($id)
	{
		$account_balance_name= strip_tags(Input::get("account_balance_name"));
		$account_balance_date = strip_tags(Input::get("date"));
		$account_balance_account = (Input::get("account_name"));

		$account_balance_credit = (Input::get("credit"));
		$account_balance_debit = (Input::get("debit"));

		$account_balance_total_credit =(Input::get("total_credit"));
		$account_balance_total_debit =(Input::get("total_debit"));


		$validator = Validator::make(
		    array(
		        'name' 			=> $account_balance_name,
		        'date' 			=> $account_balance_date,
		        'total_credit'	=> $account_balance_credit,
		        'total_debit'	=> $account_balance_debit,

		     ),
		    array(
		        'name' 			=> 'required',
		        'date' 			=> 'required',
		        'total_credit' 	=> 'required',
		       	'total_debit' 	=> 'required',

		     )
		);
		
		if($validator->passes())
		{

			$add_account_balances = new AccountBalances;
			$add_account_balances->company_id 		=$id;
			$add_account_balances->name				=$account_balance_name;
			$add_account_balances->date 			=$account_balance_date;
			$add_account_balances->total_credit		=$account_balance_total_credit;
			$add_account_balances->total_debit		=$account_balance_total_debit;
			$add_account_balances->save();

			$i=0;

			foreach($account_balance_account  as $ab)
			{
				$add_account_balances_child = new AccountBalancesTwos;
				$add_account_balances_child->account_id   	= $add_account_balances->id;
				$add_account_balances_child->account_name 	= $account_balance_account[$i];
				$add_account_balances_child->credit 	  	= $account_balance_credit[$i];
				$add_account_balances_child->debit 	  		= $account_balance_debit[$i];
				$add_account_balances_child->save();
				$i++;
			}
			$datatopass = array(
				'message' => "You have succesfully added new starting balance!"
			);
			return Redirect::to(URL::previous())->with('message_add', $datatopass);
		}

		if($validator->fails())
		{
			$datatopass = array(
				'message'=> $validator->messages(),
			);
			return Redirect::to(URL::previous())->with('message_error', $datatopass);
		}
	}

	public function delete_balance($id,$vb)
	{

		$validator = Validator::make(
		    array(
		        'id' => $id,
		    ),
		    array(
		        'id' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_balance 	= AccountBalances::find($vb);
			$prev   			= $delete_balance->$id;
			$delete_balance		->delete();
			$datatopass 		= array(
				'message' => "You have succesfully deleted your balance",
			);
			return Redirect::to(URL::previous())->with('message_delete',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('delete_error',$validator->messages());
		}
	}


}

