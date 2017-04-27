@extends('layout.in_app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if($user->can('add_roles') || Confide::user()->hasRole('Owner'))
            <div class="block block-themed">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        {{-- <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </li> --}}
                    </ul>
                    <h3 class="block-title">Add New Role</h3>
                </div>
                <div class="block-content">
                    @if(Session::get('add_error'))
                        <div class="alert alert-error alert-danger">
                        {{Session::get('add_error')->first("role_name")}}
                        </div>
                    @endif
                    @if(Session::get('message_add'))
                        <div class="alert alert-success">
                        {{Session::get('message_add')["message"]}}
                        </div>
                    @endif
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('umgtsettings/'.$company_id.'/add_roles')}}" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="new_role" name="new_role" placeholder="Enter New Role Name.." required>
                                    <label for="new_role">Role Name </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add New Role</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if($user->can('edit_roles') || Confide::user()->hasRole('Owner'))
            <div class="block block-themed">
                <div class="block-header bg-success">
                    <ul class="block-options">
                        {{-- <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </li> --}}
                    </ul>
                    <h3 class="block-title">Edit Role Name</h3>
                </div>
                <div class="block-content">
                    @if(Session::get('update_error'))
                        <div class="alert alert-error alert-danger">
                        {{Session::get('update_error')->first("role_name")}}
                        </div>
                    @endif
                    @if(Session::get('message_update'))
                        <div class="alert alert-success">
                        {{Session::get('message_update')["message"]}}
                        </div>
                    @endif
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('umgtsettings/'.$company_id.'/update_roles')}}" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <select class="form-control" id="existing_role" name="role_id" size="1">
                                        @if(count($roles) > 1)
                                            @foreach($roles as $r)
                                                @if($r->name !== "Owner")
                                                    <option value="{{$r->id}}">{{$r->name}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option selected disabled>Add More Roles!</option>
                                        @endif
                                    </select>
                                    <label for="existing_role">Choose Existing Role</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="new_role" name="new_role" placeholder="Enter New Role Name.." required>
                                    <label for="new_role">New Role Name </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit Role</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @if($user->can('delete_roles') || Confide::user()->hasRole('Owner'))
            <div class="block block-themed">
                <div class="block-header bg-danger">
                    <ul class="block-options">
                        {{-- <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                        <li>
                            <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                        </li> --}}
                    </ul>
                    <h3 class="block-title">Delete Role</h3>
                </div>
                <div class="block-content">
                     @if(Session::get('delete_error'))
                        <div class="alert alert-error alert-danger">
                        {{Session::get('delete_error')->first("role_name")}}
                        </div>
                    @endif
                    @if(Session::get('message_delete'))
                        <div class="alert alert-success">
                        {{Session::get('message_delete')["message"]}}
                        </div>
                    @endif
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('umgtsettings/'.$company_id.'/delete_roles')}}" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material">
                                    <select class="form-control" id="existing_role" name="role_id" size="1" required>
                                        @if(count($roles) > 1)
                                            @foreach($roles as $r)
                                                @if($r->name !== "Owner")
                                                    <option value="{{$r->id}}">{{$r->name}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option selected disabled>Add More Roles!</option>
                                        @endif
                                    </select>
                                    <label for="existing_role">Choose Existing Role</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-arrow-right push-5-r"></i>Delete Role</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-header">
                    <div class="block-options">
                        <small>*This will be the roles of your company</small>
                    </div>
                    <h3 class="block-title">{{$page_header}} - Roles</h3>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-borderless table-header-bg">
                        <thead>
                            <tr>
                                {{-- <th class="text-center" style="width: 50px;">#</th> --}}
                                <th>Role Name</th>
                                <th class="text-center" style="width: 15%;">Access</th>
                                @if($user->can('edit_roles'))
                                <th class="text-center" style="width: 15%;">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($roles) > 0)
                            @foreach($roles as $r)
                                <tr>
                                    {{-- <td class="text-center">{{$r->id}}</td> --}}
                                    <td>{{$r->name}}</td>
                                    <td class="text-center">
                                        <?php
                                        $associated_users = DB::table('assigned_roles')->where('role_id',$r->id)->get();
                                        ?>
                                        <button class="btn btn-xs btn-info" data-toggle="popover" title="" data-placement="bottom" data-content="<?php
                                            foreach ($associated_users as $au) {
                                                echo User::where('id',$au->user_id)->first()->username.",";
                                            }
                                        ?>" type="button" data-original-title="Privileged Users">Privileged Users</button>
                                    </td>
                                    @if($user->can('edit_roles') || Confide::user()->hasRole('Owner'))
                                    <td class="text-center">
                                        <a href="{{URL::to('umgtsettings/'.$company_id.'/permissions/'.$r->id)}}">
                                            <button class="btn btn-xs btn-success">Edit</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="4">No Data</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop