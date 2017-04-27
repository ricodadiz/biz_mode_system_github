<?php

class AppModController extends BaseController {
// ========== SALES MODULE ==========
	public function sales_summary()
	{
		return View::make('sales.sales_summary');
	}

	public function alldocs_sales()
	{
		return View::make('sales.documents.alldocs_sales');
	}

	public function approval_sales()
	{
		return View::make('sales.documents.approval_sales');
	}

	public function payment_sales()
	{
		return View::make('sales.documents.payment_sales');
	}

	public function invoice_sales()
	{
		return View::make('sales.documents.invoice_sales');
	}

	public function reports_sales()
	{
		return View::make('sales.documents.reports_sales');
	}

	public function prospect_clients()
	{
		return View::make('sales.clients.prospect_clients');
	}

// ========== SALES MODULE ==========
}
