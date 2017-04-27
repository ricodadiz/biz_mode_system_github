@extends('layout.in_app')
@section('content')
    <div class="row">
        <div class="col-md-6">
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
                    <h3 class="block-title">Edit Privileges for '{{$role->name}}'</h3>
                </div>
                <div class="block-content">
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('umgt_edit_permissions/'.$role->id)}}" method="post">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <h3>List of Permissions</h3>
                                <div id="user_display" class="form-material">
                                    @foreach($permissions as $p)
                                        <div class="checkbox">
                                            <label for="user_chkbox_{{$p->id}}">
                                                <input type="checkbox" id="user_chkbox_{{$p->id}}" name="permissions[]" value="{{$p->id}}"
                                                    <?php
                                                        foreach ($permission_for_roles as $pfr) {
                                                            if($pfr->permission_id == $p->id && $pfr->role_id == $role->id)
                                                            {
                                                                echo "checked";
                                                            }
                                                        }
                                                    ?>
                                                >
                                            {{$p->display_name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Update '{{$role->name}}' Privilieges</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
                    <h3 class="block-title">Edit Users for '{{$role->name}}'</h3>
                </div>
                <div class="block-content">
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('umgt_edit_role_users/'.$role->id)}}" method="post">
                        <div class="form-material">
                            <input class="form-control" type="email" id="search_user" placeholder="Enter email to Add..">
                            <label for="register2-email">Search by E-mail</label>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <h3>List of Users</h3>
                                <div id="user_display" class="form-material">
                                    @foreach($members_of_company as $moc)
                                        <div class="checkbox-search">
                                            <label for="user_chkbox_{{$moc->id}}">
                                                <input type="checkbox" id="user_chkbox_{{$moc->id}}" name="users_to_add[]" value="{{$moc->id}}" 
                                                    <?php
                                                        if(in_array($moc->user_id, $assigned_roles))
                                                        {
                                                            echo 'checked';
                                                        }
                                                    ?>
                                                >
                                                {{User::find($moc->user_id)->email}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Update Users as '{{$role->name}}(s)'</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#search_user').keyup(function(event) {
            $search_string = $(this).val();
            $("div.checkbox-search").css("display","none");
            $("div.checkbox-search>label").each(function(index, el) {
                $this_text = $(this).text();
                if($this_text.search($search_string)>=0)
                {
                    $(this).parent().show();
                }
            });
        });
    </script>
@stop