<?php

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
    	$view_company = new Permission;
		$view_company->name = 'view_company';
		$view_company->display_name = 'View Company';
		$view_company->save();
    		
       	$add_company = new Permission;
		$add_company->name = 'add_company';
		$add_company->display_name = 'Add Company';
		$add_company->save();

		$edit_company = new Permission;
		$edit_company->name = 'edit_company';
		$edit_company->display_name = 'Edit Company';
		$edit_company->save();

		$delete_company = new Permission;
		$delete_company->name = 'delete_company';
		$delete_company->display_name = 'Delete Company';
		$delete_company->save();

		/*UMGT*/
		$view_roles = new Permission;
		$view_roles->name = 'view_roles';
		$view_roles->display_name = 'View Roles';
		$view_roles->save();

		$add_roles = new Permission;
		$add_roles->name = 'add_roles';
		$add_roles->display_name = 'Add Roles';
		$add_roles->save();
    		
       	$edit_roles = new Permission;
		$edit_roles->name = 'edit_roles';
		$edit_roles->display_name = 'Edit Roles';
		$edit_roles->save();

		$delete_roles = new Permission;
		$delete_roles->name = 'delete_roles';
		$delete_roles->display_name = 'Delete Roles';
		$delete_roles->save();
		/*END - UMGT*/

		$view_company_member = new Permission;
		$view_company_member->name = 'view_company_member';
		$view_company_member->display_name = 'View Company Member';
		$view_company_member->save();

		$add_company_member = new Permission;
		$add_company_member->name = 'add_company_member';
		$add_company_member->display_name = 'Add Company Member';
		$add_company_member->save();

		$delete_company_member = new Permission;
		$delete_company_member->name = 'delete_company_member';
		$delete_company_member->display_name = 'Delete Company Member';
		$delete_company_member->save();

		$view_brand = new Permission;
		$view_brand->name = 'view_brand';
		$view_brand->display_name = 'View Brand';
		$view_brand->save();

		$add_brand = new Permission;
		$add_brand->name = 'add_brand';
		$add_brand->display_name = 'Add Brand';
		$add_brand->save();

		$edit_brand = new Permission;
		$edit_brand->name = 'edit_brand';
		$edit_brand->display_name = 'Edit Brand';
		$edit_brand->save();
		
		$delete_brand = new Permission;
		$delete_brand->name = 'delete_brand';
		$delete_brand->display_name = 'Delete Brand';
		$delete_brand->save();

		$view_category = new Permission;
		$view_category->name = 'view_category';
		$view_category->display_name = 'View Category';
		$view_category->save();

		$add_category = new Permission;
		$add_category->name = 'add_category';
		$add_category->display_name = 'Add Category';
		$add_category->save();

		$edit_category = new Permission;
		$edit_category->name = 'edit_category';
		$edit_category->display_name = 'Edit Category';
		$edit_category->save();
		
		$delete_category = new Permission;
		$delete_category->name = 'delete_category';
		$delete_category->display_name = 'Delete Category';
		$delete_category->save();

		$view_warehouse = new Permission;
		$view_warehouse->name = 'view_warehouse';
		$view_warehouse->display_name = 'View Warehouse';
		$view_warehouse->save();

		$add_warehouse = new Permission;
		$add_warehouse->name = 'add_warehouse';
		$add_warehouse->display_name = 'Add Warehouse';
		$add_warehouse->save();

		$edit_warehouse = new Permission;
		$edit_warehouse->name = 'edit_warehouse';
		$edit_warehouse->display_name = 'Edit Warehouse';
		$edit_warehouse->save();
		
		$delete_warehouse = new Permission;
		$delete_warehouse->name = 'delete_warehouse';
		$delete_warehouse->display_name = 'Delete Warehouse';
		$delete_warehouse->save();

        $view_unit = new Permission;
        $view_unit->name = 'view_unit';
        $view_unit->display_name = 'View Unit';
        $view_unit->save();

        $add_unit = new Permission;
        $add_unit->name = 'add_unit';
        $add_unit->display_name = 'Add Unit';
        $add_unit->save();

        $edit_unit = new Permission;
        $edit_unit->name = 'edit_unit';
        $edit_unit->display_name = 'Edit Unit';
        $edit_unit->save();
        
        $delete_unit = new Permission;
        $delete_unit->name = 'delete_unit';
        $delete_unit->display_name = 'Delete Unit';
        $delete_unit->save();

        $view_vat = new Permission;
        $view_vat->name = 'view_vat';
        $view_vat->display_name = 'View Vat';
        $view_vat->save();

        $add_vat = new Permission;
        $add_vat->name = 'add_vat';
        $add_vat->display_name = 'Add Vat';
        $add_vat->save();

        $edit_vat = new Permission;
        $edit_vat->name = 'edit_vat';
        $edit_vat->display_name = 'Edit Vat';
        $edit_vat->save();
        
        $delete_vat = new Permission;
        $delete_vat->name = 'delete_vat';
        $delete_vat->display_name = 'Delete Vat';
        $delete_vat->save();

        $view_payment = new Permission;
        $view_payment->name = 'view_payment';
        $view_payment->display_name = 'View Payment';
        $view_payment->save();

        $add_payment = new Permission;
        $add_payment->name = 'add_payment';
        $add_payment->display_name = 'Add Payment';
        $add_payment->save();

        $edit_payment = new Permission;
        $edit_payment->name = 'edit_payment';
        $edit_payment->display_name = 'Edit Payment';
        $edit_payment->save();
        
        $delete_payment = new Permission;
        $delete_payment->name = 'delete_payment';
        $delete_payment->display_name = 'Delete Payment';
        $delete_payment->save();

		$view_order = new Permission;
		$view_order->name = 'view_order';
		$view_order->display_name = 'View Order';
		$view_order->save();

		$add_order = new Permission;
		$add_order->name = 'add_order';
		$add_order->display_name = 'Add Order';
		$add_order->save();

		$edit_order = new Permission;
		$edit_order->name = 'edit_order';
		$edit_order->display_name = 'Edit Order';
		$edit_order->save();

		$delete_order = new Permission;
		$delete_order->name = 'delete_order';
		$delete_order->display_name = 'Delete Order';
		$delete_order->save();

		$view_product = new Permission;
		$view_product->name = 'view_product';
		$view_product->display_name = 'View Product';
		$view_product->save();

		$add_product = new Permission;
		$add_product->name = 'add_product';
		$add_product->display_name = 'Add Product';
		$add_product->save();

		$edit_product = new Permission;
		$edit_product->name = 'edit_product';
		$edit_product->display_name = 'Edit Product';
		$edit_product->save();

		$delete_product = new Permission;
		$delete_product->name = 'delete_product';
		$delete_product->display_name = 'Delete Product';
		$delete_product->save();

		$view_delivery = new Permission;
		$view_delivery->name = 'view_delivery';
		$view_delivery->display_name = 'View Delivery';
		$view_delivery->save();

		$add_delivery = new Permission;
		$add_delivery->name = 'add_delivery';
		$add_delivery->display_name = 'Add Delivery';
		$add_delivery->save();
		
		$delete_delivery = new Permission;
		$delete_delivery->name = 'delete_delivery';
		$delete_delivery->display_name = 'Delete Delivery';
		$delete_delivery->save();

		$view_service = new Permission;
		$view_service->name = 'view_service';
		$view_service->display_name = 'View Service';
		$view_service->save();

		$add_service = new Permission;
		$add_service->name = 'add_service';
		$add_service->display_name = 'Add Service';
		$add_service->save();
		
		$delete_service = new Permission;
		$delete_service->name = 'delete_service';
		$delete_service->display_name = 'Delete Service';
		$delete_service->save();

		$view_report = new Permission;
		$view_report->name = 'view_report';
		$view_report->display_name = 'View Report';
		$view_report->save();

		$view_sales = new Permission;
		$view_sales->name = 'view_sales';
		$view_sales->display_name = 'View Sales';
		$view_sales->save();

		$view_sales_summary = new Permission;
		$view_sales_summary->name = 'view_sales_summary';
		$view_sales_summary->display_name = 'View Sales Summary';
		$view_sales_summary->save();

		$view_sales_setup = new Permission;
		$view_sales_setup->name = 'view_sales_setup';
		$view_sales_setup->display_name = 'View Sales Setup';
		$view_sales_setup->save();

		$view_client = new Permission;
		$view_client->name = 'view_client';
		$view_client->display_name = 'View Client';
		$view_client->save();

		$add_client = new Permission;
		$add_client->name = 'add_client';
		$add_client->display_name = 'Add Client';
		$add_client->save();

		$view_purchase = new Permission;
		$view_purchase->name = 'view_purchase';
		$view_purchase->display_name = 'View Purchase';
		$view_purchase->save();

		$view_bill = new Permission;
		$view_bill->name = 'view_bill';
		$view_bill->display_name = 'View Bill List';
		$view_bill->save();

		$view_add_bill = new Permission;
		$view_add_bill->name = 'view_add_bill';
		$view_add_bill->display_name = 'View Add Bill';
		$view_add_bill->save();

		$view_retailer = new Permission;
		$view_retailer->name = 'view_retailer';
		$view_retailer->display_name = 'View Retailer List';
		$view_retailer->save();

		$view_add_retailer = new Permission;
		$view_add_retailer->name = 'view_add_retailer';
		$view_add_retailer->display_name = 'View Add Retailer';
		$view_add_retailer->save();

		$view_product_service = new Permission;
		$view_product_service->name = 'view_product_service';
		$view_product_service->display_name = 'View Products & Services';
		$view_product_service->save();

		$view_add_service = new Permission;
		$view_add_service->name = 'view_add_service';
		$view_add_service->display_name = 'View Add Products & Services';
		$view_add_service->save();

		$view_accounting = new Permission;
		$view_accounting->name = 'view_accounting';
		$view_accounting->display_name = 'View Accounting';
		$view_accounting->save();

		$view_trasaction_list = new Permission;
		$view_trasaction_list->name = 'view_trasaction_list';
		$view_trasaction_list->display_name = 'View Transaction List';
		$view_trasaction_list->save();

		$view_accounts_list = new Permission;
		$view_accounts_list->name = 'view_accounts_list';
		$view_accounts_list->display_name = 'View Account List';
		$view_accounts_list->save();

		$view_journal = new Permission;
		$view_journal->name = 'view_journal';
		$view_journal->display_name = 'View Journal Transaction';
		$view_journal->save();

		$view_add_journal = new Permission;
		$view_add_journal->name = 'view_add_journal';
		$view_add_journal->display_name = 'View Add Journal Transaction';
		$view_add_journal->save();

		$view_balances = new Permission;
		$view_balances->name = 'view_balances';
		$view_balances->display_name = 'View Starting Balances';
		$view_balances->save();

		$view_add_balances = new Permission;
		$view_add_balances->name = 'view_add_balances';
		$view_add_balances->display_name = 'View Add Starting Balances';
		$view_add_balances->save();


    }

} 