@extends('layout.in_app')
@section('content')

<div class="row">
                        
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="{{$business_issue_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">No. of Business Report</div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success" data-toggle="countTo" data-to="{{$solved_issue_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">No. Solved Issue</div>
                            </a>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="{{$pending_issue_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">No. Pending Issue</div>
                            </a>
                        </div>
                        {{-- <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="100"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Top Sellers</div>
                            </a>
                        </div> --}}
                        {{-- <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="8750"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Products</div>
                            </a>
                        </div> --}}
                    </div>
                    {{-- @if(Session::get('delete_error'))
                        <div class="alert alert-error alert-danger">
                        @foreach(Session::get('delete_error')->all() as $m)
                            {{$m}}<br>    
                        @endforeach
                        </div>
                    @endif
                    @if(Session::get('message_delete'))
                        <div class="alert alert-success">
                        {{Session::get('message_delete')["message"]}}
                        </div>
                    @endif --}}
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Business Report List</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th class="hidden-xs">Email</th>
                                        <th class="hidden-xs">Message</th>
                                        <th class="hidden-xs">Date Sent</th>
                                        <th class="hidden-xs">Status</th>
                                        <th class="text-center">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($business_issue as $bus)
                                    <tr>
                                        <td class="font-w600">{{$bus->user_name}}</td>
                                        <td class="hidden-xs">{{$bus->user_email}}</td>
                                        <td class="hidden-xs">{{$bus->message}}</td>
                                        <td class="hidden-xs">{{$bus->date}}</td>
                                        <td class="hidden-xs">
                                        @if($bus->status == 'Solved')
                                        <span class="label label-success">{{$bus->status}}</span>
                                        @else
                                        <span class="label label-danger">{{$bus->status}}</span>
                                        @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-fadein-{{$bus->id}}" title="View Report Info"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-xs btn-default" type="button" data-toggle="modal" data-target="#modal-popout4-" title="Remove Client"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <div class="modal fade" id="modal-fadein-{{$bus->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Business Report Info</h3>
                                                    </div>
                                <form id="reply_form{{$bus->id}}" action="{{URL::to('update_business_report/'.$bus->id)}}" method="post" enctype="multipart/form-data">
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="username1">Username </label>
                                                            <input class="form-control" type="text" id="username1" name="username1" value="{{$bus->user_name}}" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="email1">Email </label>
                                                            <input class="form-control" type="text" id="email1" name="email1" value="{{$bus->user_email}}" >
                                                        </div>
                                                    </div>

                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="date1">Date </label>
                                                            <input class="form-control" type="date" id="date1" name="date1" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                                                        </div>                                           
                                                     </div>

                                                    <div class="block-content">
                                                       <label>Content</label>
                                                       <p>{{$bus->message}}</p>
                                                    </div>

                                                    <div class="list-timeline-content block-content">
                                                        <label>Attached Image</label>
                                                        <!-- Gallery (.js-gallery class is initialized in App() -> uiHelperMagnific()) -->
                                                        <!-- For more info and examples you can check out http://dimsemenov.com/plugins/magnific-popup/ -->
                                                        <div class="row items-push js-gallery">
                                                            <div class="col-sm-6 col-lg-4">
                                                                
                                                             {{-- <a class="img-link" href="{{$bus->image}}"> --}}
                                                                <img class="img-responsive" src="{{$bus->image}}" alt="">
                                                             {{-- </a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="block-content">
                                                        <label for="reply">Write a Reply</label>
                                                       <textarea class="form-control input-lg" rows="5" placeholder="Write a reply..." name="reply" id="reply"></textarea>
                                                    </div>

                                                    <div class="block-content">
                                                    <label>Status</label>
                                                    <select class="js-select2 form-control" id="example2-select2" name="status" id="status" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        <option value="Solved">Solved</option>
                                                        <option value="Pending">Pending</option>
                                                    </select>
                                                    
                                               		</div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-success" type="submit" data-dismiss="modal" onclick="$('#reply_form{{$bus->id}}').submit()"><i class="fa fa-envelope-o"></i> Send</button>
                                                </div>
                                </form>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal fade" id="modal-popout-" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Confirm Delete</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        You are about to delete business.
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <a href="{{URL::to('')}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i> Ok</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   

        {{HTML::script("assets/js/plugins/magnific-popup/magnific-popup.min.js")}}
        {{HTML::style("assets/js/plugins/magnific-popup/magnific-popup.min.css")}}
        <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo','magnific-popup']);
            });
        </script>
        {{HTML::script("assets/js/plugins/select2/select2.full.min.js")}}
        <script type="text/javascript">
            $(".js-select2").select2();
            $('.js-dataTable-full').dataTable({
                pageLength: 10,
                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
            });
        </script>

@stop
