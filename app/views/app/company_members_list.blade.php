@extends('layout.in_app')
@section('content')
    <div class="row">
        <div class="col-md-<?php
            if($user->can('add_company_member'))
            {
                echo 8;
            }
            else
            {
                echo 12;
            }
        ?>">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Company Members</h3>
                </div>
                <div class="block-content">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                    <!-- <script src="assets/js/pages/base_tables_datatables.js"></script> -->
                    <table class="table table-bordered table-striped js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th style="width: 25%";>Name</th>
                                <th class="hidden-xs" style="width: 20%;">Email</th>
                                <th class="hidden-xs" style="width: 25%;">Position</th>
                                <th class="hidden-xs" style="width: 25%;">Access Role</th>
                                <th class="text-center" style="width: 10%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members_of_company as $moc)
                            <tr>
                                <td class="text-center">{{$moc->user_id}}</td>
                                <td class="font-w600">{{User::find($moc->user_id)->user_firstname. " " .User::find($moc->user_id)->user_lastname}}</td>
                                <td class="hidden-xs"><a href="{{URL::to('user_profile/'.$company->id.'/'.User::find($moc->user_id)->username)}}">{{User::find($moc->user_id)->email}}</a></td>
                                <td class="hidden-xs">{{User::find($moc->user_id)->user_position}}</td>
                                <td class="hidden-xs">
                                <?php
                                    $assigned_roles = DB::table("assigned_roles")->where("user_id",$moc->user_id)->get();
                                ?>
                                    @foreach($assigned_roles as $ar)
                                        @if(in_array($ar->role_id, $roles))
                                        <span class="label label-primary">{{Role::find($ar->role_id)->name}}</span>
                                        @endif
                                    @endforeach                                       
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        @if($moc->user_id != Confide::user()->id)
                                        <a href="{{URL::to('message/'.$company->id)}}">
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Message Member"><i class="fa fa-envelope"></i></button>
                                        </a>
                                        @endif
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Member"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>
        @if($user->can('add_company_member'))
        <div class="col-md-4">
        <div class="block block-themed">
                <div class="block-header bg-success">
                    <ul class="block-options">
                    </ul>
                    <h3 class="block-title">Change Company Company Code</h3>
                </div>
                <div class="block-content">
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('change_company_code/'.$company->id)}}" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div id="company_code" class="form-material" style="">
                                    <input class="form-control" type="text" name="company_code" id="company_code" value="{{$company_code}}" placeholder="Company Code" 
                                    @if($company_code)
                                    {{'disabled'}}
                                    @endif
                                    >
                                    <label for="register2-email">Company Code: </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Change Company Code</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                    <h3 class="block-title">Add New Members</h3>
                </div>
                <div class="block-content">
                    <div class="form-material">
                        <input class="form-control" type="email" id="search_user" placeholder="Enter email to Add..">
                        <label for="register2-email">Search by E-mail</label>
                    </div>
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('add_company_members/'.$company->id)}}" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div id="user_display" class="form-material" style="height:120px;overflow-y: scroll">  
                                    @foreach($new_users as $n)
                                        @if(!in_array($n->id, $members_of_company->lists('user_id')))
                                            <div class="checkbox">
                                                <label for="user_chkbox_{{$n->id}}"><input type="checkbox" id="user_chkbox_{{$n->id}}" name="users_to_add[]" value="{{$n->id}}">{{$n->email}}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add New Users</button>
                            </div>
                        </div>
                    </form>
                    <script type="text/javascript">
                        $('#search_user').keyup(function(event) {
                            $search_string = $(this).val();
                            $("div.checkbox").css("display","none");
                            $("div.checkbox>label").each(function(index, el) {
                                $this_text = $(this).text();
                                if($this_text.search($search_string)>=0)
                                {
                                    $(this).parent().show();
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        @endif
    </div>
@stop