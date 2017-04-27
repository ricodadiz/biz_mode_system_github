<?php

class UMGTController extends Controller {

	public function umgt_setup($id)
	{
		$datatopass  = array(
			'title' 		=> "Set Up - User Management - Beezmode",
			'page_label'	=> "UMGT Set Up",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('admin.umgtsettings.umgt_setup',$datatopass);
	}

	public function umgt_roles($id)
	{
		$datatopass  = array(
			'title' 		=> "Roles - User Management - Beezmode",
			'page_label'	=> "UMGT Roles",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user(),
			'roles'			=> Role::where('company_id',$id)->get(),
			'company_id'	=> $id
		);
		return View::make('admin.umgtsettings.umgt_roles',$datatopass);
	}

	public function umgt_profiles($id)
	{
		$datatopass  = array(
			'title' 		=> "Profiles - User Management - Beezmode",
			'page_label'	=> "UMGT Profiles",
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'user'			=> Confide::user()
		);
		return View::make('admin.umgtsettings.umgt_profiles',$datatopass);
	}

	public function umgt_permissions($id,$role_id)
	{
		$datatopass  = array(
			'title' 		=> "Roles - User Management - Beezmode",
			'page_label'	=> Role::find($role_id)->name.' Permissions ',
			'page_header' 	=> Companies::where('id',$id)->first()->company_name,
			'company' 		=> Companies::where('id',$id)->first(),
			'members_of_company' => CompanyMember::where('company_id',$id)->get(),
			'permission_for_roles' => DB::table('permission_role')->get(),
			'assigned_roles'=> DB::table('assigned_roles')->where('role_id',$role_id)->lists('user_id'),
			'user'			=> Confide::user(),
			'role'			=> Role::find($role_id),
			'permissions'	=> Permission::all(),
			'company_id'	=> $id
		);
		return View::make('admin.umgtsettings.umgt_permissions',$datatopass);
	}

	public function umgt_edit_permissions($role_id)
	{
		$permissions = Input::get('permissions');
		$role 		 = Role::find($role_id);
		
		if($permissions){
			$role->perms()->sync($permissions);
		}
		if($permissions == NULL)
		{
			DB::table('permission_role')->where('role_id',$role_id)->delete();
		}

		return Redirect::to(URL::previous());
	}

	public function umgt_edit_role_users($role_id)
	{
		$assigned_roles = DB::table('assigned_roles')->where('role_id',$role_id)->delete();
		$users = Input::get('users_to_add');
		if($users)
		{
			foreach ($users as $u) {
				$attach_role = User::find($u)->attachRole($role_id);
			}
		}
		return Redirect::to(URL::previous());
	}

	public function add_roles($id)
	{
		$role_name = strip_tags(Input::get("new_role"));
		
		$validator = Validator::make(
		    array(
		        'role_name' => $role_name,
		    ),
		    array(
		        'role_name' => 'required|unique:roles,name|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_role = new Role;
			$new_role->name 		= $role_name;
			$new_role->company_id 	= $id;
			$new_role->save();

			$datatopass = array(
				'message' => "You have succesfully added : <b>'".$role_name."'</b> as a new role, you may now edit permissions for this role.",
			);
			return Redirect::to(URL::previous())->with('message_add',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('add_error',$validator->messages());
		}
	}

	public function update_roles()
	{
		$role_id	= Input::get("role_id");
		$role_name 	= strip_tags(Input::get("new_role"));
		
		$validator = Validator::make(
		    array(
		        'role_name' => $role_name,
		    ),
		    array(
		        'role_name' => 'required|unique:roles,name|min:3',
		    )
		);
		
		if($validator->passes())
		{
			$new_role 			= Role::find($role_id);
			$prev 				= $new_role->name;
			$new_role->name 	= $role_name;
			$new_role->save();

			$datatopass = array(
				'message' => "You have succesfully changed : <b>'".$prev."'</b> to <b>'".$role_name."'</b>",
			);
			return Redirect::to(URL::previous())->with('message_update',$datatopass);
		}

		if($validator->fails())
		{
			return Redirect::to(URL::previous())->with('update_error',$validator->messages());
		}
	}

	public function delete_roles()
	{
		//dd(Input::all());
		$role_id 		= Input::get("role_id");

		$validator = Validator::make(
		    array(
		        'role_name' => $role_id,
		    ),
		    array(
		        'role_name' => 'required',
		    )
		);

		if($validator->passes())
		{
			$delete_roles 	= Role::find($role_id);
			$prev   		= $delete_roles->name;
			$delete_roles->delete();
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
}