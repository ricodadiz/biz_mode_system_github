<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
		$user = new User;
        $user->email = 'johndoe@site.dev';
        $user->username = 'test';
        $user->password = 'test';
        $user->password_confirmation = 'test';
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->company_code = '1234';
        $user->confirmed = 1;
        $user->trial_ends_at = Carbon::now()->addDays(30);
        $user->save();

        /*Initial Test Data*/
        $query = new Companies;
        $query->owner_id        = $user->id;
        $query->company_name    = 'Test Company';
        $query->company_code    = '1234';
        $query->api_username    = 'nats';
        $query->api_password    = '09158577170';
        $query->api_link        = 'http://staroil.joytrademktg.com/api/von1/pos_data';
        $query->save();

        $company_member = new CompanyMember;
        $company_member->company_id = $query->id;
        $company_member->user_id    = $user->id;
        $company_member->save();

        $owner = new Role;
        $owner->name = 'Owner';
        $owner->company_id = $query->id;
        $owner->save();

        $user = User::where('id',$user->id)->first();
        $user->attachRole($owner);

        $owner->perms()->sync(array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69));

        $new_drag_order                 = new CompanyDragOrder;
        $new_drag_order->user_id        = $user->id;
        $new_drag_order->company_id     = $query->id;
        $new_drag_order->drag_order     = -1;
        $new_drag_order->save();
    }

}