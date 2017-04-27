<?php

class RolesTableSeeder extends Seeder {

    public function run()
    {
       	$owner = new Role;
		$owner->name = 'Owner';
		$owner->save();

		$super_admin = new Role;
		$super_admin->name = 'Super Admin';
		$super_admin->save();

		$inventory = new Role;
		$inventory->name = 'Company Member';
		$inventory->save();

		$finance = new Role;
		$finance->name = 'Finance';
		$finance->save();

		$marketing = new Role;
		$marketing->name = 'Marketing';
		$marketing->save();

		$accounting = new Role;
		$accounting->name = 'Accounting';
		$accounting->save();

		$purchasing = new Role;
		$purchasing->name = 'Purchasing';
		$purchasing->save();

		$human_resource = new Role;
		$human_resource->name = 'Human Resource';
		$human_resource->save();

		$inventory = new Role;
		$inventory->name = 'Inventory';
		$inventory->save();
    }

}