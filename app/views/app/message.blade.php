@extends('layout.in_app')
@section('content')
<div class="row">
    <div class="col-md-2">
        <!-- Collapsible Inbox Navigation (using Bootstrap collapse functionality) -->
                            <button class="btn btn-block btn-primary visible-xs push" data-toggle="collapse" data-target="#inbox-nav" type="button">Action</button>
                            <div class="collapse navbar-collapse remove-padding" id="inbox-nav">
                                <!-- Inbox Menu -->
                                <div class="block">
                                    <div class="block-header bg-gray-lighter">
                                        <ul class="block-options">
                                            
                                        </ul>
                                        <h3 class="block-title">Actions</h3>
                                    </div>
                                    <div class="block-content">
                                        <ul class="nav nav-pills nav-stacked push">
                                            <li>
                                                <a data-toggle="modal" data-target="#modal-compose" type="button"><i class="fa fa-pencil"></i> New Message</a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                </div>
                                </div>
                                <!-- END Inbox Menu -->
    </div>
    <div class="col-md-5">
            <div class="block">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                       
                        <li>
                            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                        </li>
                    </ul>
                    <div class="block-title text-normal">
                        Messages
                        
                    </div>
                </div>
                <div class="block-content">
                    <!-- Messages Options -->
                    <div class="push">
                        
                    </div>
                    <!-- END Messages Options -->

                    <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                    <div class="pull-r-l" style="height: 550px;overflow-y: scroll;">
                        <table class="js-table-checkable table table-hover table-vcenter">
                            <tbody>
                            @foreach($inbox as $i)
                                <?php
                                    $class = "";
                                    if($i->read_receipt == 0)
                                    {
                                        $class = "success";
                                    }
                                    else
                                    {
                                        $class = "primary";
                                    }
                                ?>
                                <tr class="{{$class}}">
                                    <td class="text-center" style="width: 70px;">
                                        <label class="css-input css-checkbox css-checkbox-primary">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </td>
                                    <td class="hidden-xs font-w600" style="width: 140px;">{{User::where('id',$i->sender)->first()->username}}</td>
                                    <td>
                                        <div class="text-muted push-5-t">{{substr($i->content,0,20).'...'}}</div>
                                        <a msg-id="{{$i->id}}" class="font-w100" data-toggle="modal" data-target="#modal-message{{$i->id}}" href="#">See More</a>
                                    </td>
                                    <td class="visible-lg text-muted" style="width: 80px;">
                                        
                                    </td>
                                    <td class="visible-lg text-muted" style="width: 200px;">
                                        <em>{{$i->created_at}}</em>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-message{{$i->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-popout">
                                        <div class="modal-content">
                                            <div class="block block-themed block-transparent remove-margin-b">
                                                <div class="block-header bg-primary-dark">
                                                    <ul class="block-options">
                                                        <li>
                                                            <button data-toggle="tooltip" data-placement="left" title="Reply" type="button"><i class="si si-action-undo"></i></button>
                                                        </li>
                                                        <li>
                                                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                        </li>
                                                    </ul>
                                                    <h3 class="block-title">{{User::where('id',$i->sender)->first()->username}}'s Message</h3>
                                                </div>
                                                <div class="block-content block-content-full bg-image text-center" style="background-image: url('{{URL::to('assets/img/photos/photo7.jpg')}}');">
                                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{User::where('id',$i->sender)->first()->profile_photo}}" alt="">
                                                </div>
                                                <div class="block-content block-content-full block-content-mini bg-gray-lighter">
                                                    <span class="font-s13 text-muted pull-right"><em>{{$i->created_at}}</em></span>
                                                    <a class="font-s13" href="javascript:void(0)">{{User::where('id',$i->sender)->first()->email}}</a>
                                                </div>
                                                <div class="block-content">
                                                    {{$i->content}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Messages -->
                </div>
            </div>
        
    </div>
    <div class="col-md-5">
        <div class="block">
                <div class="block-header bg-gray-lighter">
                    <ul class="block-options">
                        
                        <li>
                            <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                        </li>
                    </ul>
                    <div class="block-title text-normal">
                        Sent
                        
                    </div>
                </div>
                <div class="block-content">
                    <!-- Messages Options -->
                    <div class="push">
                        
                    </div>
                    <!-- END Messages Options -->

                    <!-- Messages & Checkable Table (.js-table-checkable class is initialized in App() -> uiHelperTableToolsCheckable()) -->
                    <div class="pull-r-l" style="height: 550px;overflow-y: scroll;">
                        <table class="js-table-checkable table table-hover table-vcenter">
                            <tbody>
                            @foreach($sent as $s)
                                <tr>
                                    <td class="text-center" style="width: 70px;">
                                        <label class="css-input css-checkbox css-checkbox-primary">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </td>
                                    <td class="hidden-xs font-w600" style="width: 140px;">{{User::where('id',$s->receiver)->first()->username}}</td>
                                    <td>
                                        <div class="text-muted push-5-t">{{substr($s->content,0,20).'...'}}</div>
                                        <a class="font-w100 to-read" data-toggle="modal" data-target="#modal-message{{$s->id}}" href="#">See More</a>
                                    </td>
                                    <td class="visible-lg text-muted" style="width: 80px;">
                                        
                                    </td>
                                    <td class="visible-lg text-muted" style="width: 200px;">
                                        <em>{{$s->created_at}}</em>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-message{{$s->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-popout">
                                        <div class="modal-content">
                                            <div class="block block-themed block-transparent remove-margin-b">
                                                <div class="block-header bg-primary-dark">
                                                    <ul class="block-options">
                                                        <li>
                                                            <button data-toggle="tooltip" data-placement="left" title="Reply" type="button"><i class="si si-action-undo"></i></button>
                                                        </li>
                                                        <li>
                                                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                        </li>
                                                    </ul>
                                                    <h3 class="block-title">You sent a message</h3>
                                                </div>
                                                <div class="block-content block-content-full bg-image text-center" style="background-image: url('{{URL::to('assets/img/photos/photo7.jpg')}}');">
                                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{User::where('id',$s->receiver)->first()->profile_photo}}" alt="">
                                                </div>
                                                <div class="block-content block-content-full block-content-mini bg-gray-lighter">
                                                    <span class="font-s13 text-muted pull-right"><em>{{$s->created_at}}</em></span>
                                                    <a class="font-s13" href="javascript:void(0)">{{User::where('id',$s->receiver)->first()->email}}</a>
                                                </div>
                                                <div class="block-content">
                                                    {{$s->content}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Messages -->
                </div>
            </div>
    </div>
</div>
<div class="modal fade" id="modal-compose" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-success">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><i class="fa fa-pencil"></i> New Message</h3>
                </div>
                <div class="block-content">
                    <form id="send_message_form" class="form-horizontal push-10-t push-10">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-success floating input-group">
                                    <select class="form-control" id="message-email" name="receiver" size="1">
                                    @foreach($members_of_company as $moc)
                                        @if($moc->user_id != Confide::user()->id)
                                            <option value="{{$moc->user_id}}">{{User::find($moc->user_id)->email}}</option>
                                        @endif
                                    @endforeach
                                    </select>
                                    <span class="input-group-addon"><i class="si si-envelope-open"></i></span>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-success floating">
                                    <textarea class="form-control" id="message-msg" name="message" rows="6"></textarea>
                                    <label for="message-msg">Message</label>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#send_message_form').submit(function(event) {
        $.ajax({
            url: '{{URL::to('send_message')}}',
            type: 'POST',
            data: $('#send_message_form').serialize(),
        })
        .done(function() {
            $('#modal-compose').modal('hide');
        })
        .fail(function() {
            
        })
        .always(function() {
            $("#message-msg").val('');
        });      
        return false;
    });
    $('a[msg-id]').click(function(){
        id = $(this).attr('msg-id');
        elem = $(this).parent().parent();
        console.log(elem);
        $.ajax({
            url: '{{URL::to('read_message')}}',
            type: 'POST',            
            data: { "msg_id" : id},
        })
        .done(function(data_received) {
            if(data_received == 1)
            {
                elem.removeClass('success');
            }
        })
        .fail(function() {
            
        })
        .always(function() {
            
        });
        
    });
</script>
@stop