@extends('layout.in_app')
@section('content')


                    <!-- User Header -->
                    <div class="block">
                        <!-- Basic Info -->
                        <div class="bg-image" style="background-image: url('/assets/img/photos/photo6@2x.jpg');">
                            <div class="block-content bg-primary-dark-op text-center overflow-hidden">
                                <div class="push-30-t push animated fadeInDown">
                                @if($company->company_photo === NULL)
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('assets/img/avatars/company.png')}}" alt="">
                                @else
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{$company->company_photo}}" alt="">
                                @endif
                                </div>
                                <div class="push-30 animated fadeInUp">
                                    <h2 class="h4 font-w600 text-white push-5">{{$company->company_name}}</h2>
                                    <h3 class="h5 text-gray">Company Profile</h3>
                                </div>
                            </div>
                        </div>
                        <!-- END Basic Info -->

                        <!-- Stats -->
                        <div class="block-content text-center">
                            <div class="row items-push text-uppercase">
                                <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">Sales</div>
                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">₱</a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">Products</div>
                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{$product_count}}</a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">Member(s)</div>
                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{$member_count}}</a>
                                </div>
                                {{-- <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">3603 Ratings</div>
                                    <div class="text-warning push-10-t animated flipInX">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- END Stats -->
                    </div>
                    <!-- END User Header -->

                    <!-- Main Content -->
                    <div class="row">
                        <div class="col-sm-5 col-sm-push-7 col-lg-4 col-lg-push-8">
                            <!-- Followers -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-fw fa-share-alt"></i> Company Members</h3>
                                </div>
                                <div class="block-content">
                                    <ul class="nav-users push">
                                        @foreach($members_of_company as $moc)
                                        <li>
                                            <a href="">
                                            @if(User::find($moc->user_id)->profile_photo === NULL)
                                                <img class="img-avatar" src="{{asset('assets/img/avatars/avatar1.jpg')}}">
                                            @else
                                                <img class="img-avatar" src="{{User::find($moc->user_id)->profile_photo}}">
                                            @endif
                                                <i class="fa fa-circle text-success"></i>{{User::find($moc->user_id)->username}}

                                                <?php
                                                    $assigned_roles = DB::table("assigned_roles")->where("user_id",$moc->user_id)->get();
                                                    $roles = Role::where('company_id',$company->id)->lists('id');
                                                ?>
                                                <div class="font-w400 text-muted"><small>
                                                    @foreach($assigned_roles as $ar)
                                                        @if(in_array($ar->role_id, $roles))
                                                                {{Role::find($ar->role_id)->name}},
                                                        @endif
                                                    @endforeach     
                                                </small></div>
                                            
                                            </a>
                                        </li>
                                        @endforeach
 {{--                                        <li>
                                            <a href="base_pages_profile.html">
                                                <img class="img-avatar" src="/assets/img/avatars/avatar7.jpg" alt="">
                                                <i class="fa fa-circle text-warning"></i> Rene Bernanldez
                                                <div class="font-w400 text-muted"><small>Financial Manager</small></div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="base_pages_profile.html">
                                                <img class="img-avatar" src="/assets/img/avatars/avatar4.jpg" alt="">
                                                <i class="fa fa-circle text-danger"></i> Zarah Gaum
                                                <div class="font-w400 text-muted"><small>Secretary</small></div>
                                            </a>
                                        </li> --}}
                                    </ul>
                                    <div class="text-center push">
                                        <small><a href="javascript:void(0)">Load More..</a></small>
                                    </div>
                                </div>
                            </div>
                            <!-- END Followers -->

                            <!-- Products -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-fw fa-briefcase"></i> Products</h3>
                                </div>
                               
                                <div class="block-content">
                                    <ul class="list list-simple list-li-clearfix">
                                     @foreach($products as $p)
                                        <li>
                                            <a class="item item-rounded pull-left push-10-r bg-info" href="javascript:void(0)">
                                                <i class="si si-rocket text-white-op"></i>
                                            </a>
                                            <h5 class="push-10-t">{{$p->product_name}}</h5>
                                            {{-- <div class="font-s13">Back Office Bundle</div> --}}
                                        </li>
                                    @endforeach
                                        {{-- <li>
                                            <a class="item item-rounded pull-left push-10-r bg-amethyst" href="javascript:void(0)">
                                                <i class="si si-calendar text-white-op"></i>
                                            </a>
                                            <h5 class="push-10-t">Point of Sales System</h5>
                                            <div class="font-s13">Gas Station Bundle</div>
                                        </li>
                                        <li>
                                            <a class="item item-rounded pull-left push-10-r bg-danger" href="javascript:void(0)">
                                                <i class="si si-speedometer text-white-op"></i>
                                            </a>
                                            <h5 class="push-10-t">Star Oil Franchise</h5>
                                            <div class="font-s13">Gas Station</div>
                                        </li>
                                        <li>
                                            <a class="item item-rounded pull-left push-10-r bg-danger" href="javascript:void(0)">
                                                <i class="si si-speedometer text-white-op"></i>
                                            </a>
                                            <h5 class="push-10-t">Station Support</h5>
                                            <div class="font-s13">Support Services</div>
                                        </li> --}}
                                    </ul>
                                    
                                    <div class="text-center push">
                                        <small><a href="javascript:void(0)">View More..</a></small>
                                    </div>
                                </div>
                            </div>

                            <!-- END Products -->

                            <!-- Ratings -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-fw fa-star"></i> Ratings</h3>
                                </div>
                                <div class="block-content">
                                    <ul class="list list-simple">
                                        <li>
                                            <div class="push-5 clearfix">
                                                <div class="text-warning pull-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a class="font-w600" href="base_pages_profile.html">Nathaniel Viquiera</a>
                                                <span class="text-muted">(5/5)</span>
                                            </div>
                                            <div class="font-s13">Flawless back office execution! I'm really impressed with the product, it really helped me build my business so fast! Thank you!</div>
                                        </li>
                                        <li>
                                            <div class="push-5 clearfix">
                                                <div class="text-warning pull-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a class="font-w600" href="base_pages_profile.html">Aaron Calalo</a>
                                                <span class="text-muted">(5/5)</span>
                                            </div>
                                            <div class="font-s13">Great value for money and awesome support! Would buy new features again and again! Thanks!</div>
                                        </li>
                                        <li>
                                            <div class="push-5 clearfix">
                                                <div class="text-warning pull-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a class="font-w600" href="base_pages_profile.html">Rico Dadiz</a>
                                                <span class="text-muted">(5/5)</span>
                                            </div>
                                            <div class="font-s13">Working great in all my devices, quality and quantity in a great package! Thank you!</div>
                                        </li>
                                        <li>
                                            <div class="push-5 clearfix">
                                                <div class="text-warning pull-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a class="font-w600" href="base_pages_profile.html">Rick Magadan</a>
                                                <span class="text-muted">(5/5)</span>
                                            </div>
                                            <div class="font-s13">Efficient back office! Good Job Guys!</div>
                                        </li>
                                    </ul>
                                    <div class="text-center push">
                                        <small><a href="javascript:void(0)">Read More..</a></small>
                                    </div>
                                </div>
                            </div>
                            <!-- END Ratings -->
                        </div>
                        <div class="col-sm-7 col-sm-pull-5 col-lg-8 col-lg-pull-4">
                            <!-- Timeline -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                    @if($user->can('view_company_member'))
                                        <li>
                                            <button class="btn btn-primary" id="update_mission_vision">Update</button>
                                        </li>
                                    @endif
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i> Mission and Vision</h3>
                                    <br>
                                    <div class="block">
                                        <div class="block-content">
                                        @if(isset(Session::get('company_profile_mission_success')["message"]))
                                            <div class="alert alert-success">
                                                {{Session::get('company_profile_mission_success')["message"]}}
                                            </div>
                                        @endif
                                        @if(Session::get('company_profile_mission_error'))
                                            <div class="alert alert-error alert-danger">
                                            
                                        @foreach(Session::get('company_profile_mission_error')->all() as $m)
                                             {{$m}}<br>    
                                        @endforeach
                                        </div>
                                        @endif   
                                        <form action="{{URL::to('update_company_mission_vision/'.$company->id)}}" method="post" enctype="multipart/form-data">
                                            <p><strong>Mission</strong></p>
                                            <p id="mission_view">{{$company->company_mission}}</p>
                                            <textarea name="company_mission" class="form-control input-lg" id="company_mission" rows="15" placeholder="Enter your Mission.." style="display:none" >{{$company->company_mission}}</textarea>

                                        </div>
                                        <div class="block-content">
                                            <p><strong>Vision</strong></p>
                                            <p id="vision_view">{{$company->company_vision}}</p>
                                            <textarea name="company_vision" class="form-control input-lg" id="company_vision" rows="15" placeholder="Enter your Vision.." style="display:none">{{$company->company_mission}}</textarea>
                                        </div>

                                        <div class="block-content">
                                            <button class="btn btn-primary" id="mission_vision_save_button" style="display:none">Save Changes</button>
                                        </div>
                                    </form>   
                                    </div>

                                </div>
                            </div>
                            <!-- END Timeline -->
                            <!-- Timeline -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                    @if($user->can('view_company_member'))
                                        <li>
                                            <button class="btn btn-primary" id="update_summary_btn">Update</button>
                                        </li>
                                    @endif
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i>Company Summary</h3>
                                    <br>
                                    <div class="block">
                                    @if(isset(Session::get('company_profile_success_summary')["message"]))
                                            <div class="alert alert-success">
                                                {{Session::get('company_profile_success_summary')["message"]}}
                                            </div>
                                    @endif
                                    @if(Session::get('company_profile_error_summary'))

                                            <div class="alert alert-error alert-danger">     
                                            @foreach(Session::get('company_profile_error_summary')->all() as $m)
                                                 {{$m}}<br>    
                                            @endforeach
                                             </div>
                                    @endif   
                                        <div class="block-content">
                                            <p id="summary_view">{{$company->company_summary}}</p>
                                            <form action="{{URL::to('update_company_summary/'.$company->id)}}" method="post" enctype="multipart/form-data">
                                            <textarea name="company_summary" class="form-control input-lg" id="company_summary" rows="15" placeholder="Enter your Company Summary.." style="display:none">{{$company->company_summary}}</textarea>
                                        </div>
                                        
                                        <div class="block-content">
                                            <button class="btn btn-primary" id="save_summary_btn" style="display:none">Save changes</button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END Timeline -->
                            <!-- Timeline -->
                            <div class="block block-opt-refresh-icon6">
                                @if($user->can('view_company_member'))
                                <div class="block-header">
                                    <ul class="block-options">
                                        <li>
                                            <button type="submit" class="btn btn-primary" id="company_logo_btn">Update</button>
                                        </li>
                                        <li>
                                            <button type="submit" class="btn btn-primary" id="company_logo_save" style="display:none">Save Changes</button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i>Company Settings</h3>
                                    <br>
                                    <div class="block company_photo" >
                                    @if(isset(Session::get('company_profile_message')["message"]))
                                        <div class="alert alert-success" id="alert_success">
                                         {{Session::get('company_profile_message')["message"]}}
                                        </div>
                                    @endif
                                    @if(Session::get('company_profile_error'))
                                        <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('company_profile_error')->all() as $m)
                                         {{$m}}<br>    
                                    @endforeach
                                        </div>
                                    @endif   
                                        <div class="block-content" style="display:none" id="upload_company_photo">
                                            <p><strong>Upload Company Logo</strong></p>
                                            <form id="company_photo_form" action="{{URL::to('update_company_profile/'.$company->id)}}" method="post" enctype="multipart/form-data">
                                            <input type="file" name="company_logo" id="company_logo">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <!-- END Timeline -->

                            <!-- Timeline -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                    @if($user->can('view_company_member'))
                                        <li>
                                            <button type="submit" class="btn btn-primary" id="company_address_update_btn">Update</button>
                                        </li>
                                    @endif
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i>Company Address</h3>
                                    <br>
                                    <div class="block" >
                                    @if(isset(Session::get('company_profile_success_address')["message"]))
                                        <div class="alert alert-success">
                                         {{Session::get('company_profile_success_address')["message"]}}
                                        </div>
                                    @endif
                                    @if(Session::get('company_profile_error_address'))
                                        <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('company_profile_error_address')->all() as $m)
                                         {{$m}}<br>    
                                    @endforeach
                                        </div>
                                    @endif   
                                        <div class="block-content">
                                        <p id="company_address_view">{{$company->company_address}}</p>
                                            <form id="company_address_form" action="{{URL::to('update_company_address/'.$company->id)}}" method="post" enctype="multipart/form-data">
                                           <textarea name="company_address" class="form-control input-lg" id="company_address" rows="5" placeholder="Enter your Company Address.." style="display: none">{{$company->company_address}}</textarea>
                                        </div>
                                        <div class="block-content">
                                            <button class="btn btn-primary" id="company_address_save_btn" style="display: none">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Timeline -->

                            <!-- Timeline -->
                            <div class="block block-opt-refresh-icon6">
                                <div class="block-header">
                                    <ul class="block-options">
                                    @if($user->can('view_company_member'))
                                        <li>
                                            <button type="submit" class="btn btn-primary" id="company_contact_update_btn">Update</button>
                                        </li>
                                    @endif
                                    </ul>
                                    <h3 class="block-title"><i class="fa fa-newspaper-o"></i>Company Contact</h3>
                                    <br>
                                    <div class="block" >
                                    @if(isset(Session::get('company_profile_success_contact')["message"]))
                                        <div class="alert alert-success">
                                         {{Session::get('company_profile_success_contact')["message"]}}
                                        </div>
                                    @endif
                                    @if(Session::get('company_profile_error_contact'))
                                        <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('company_profile_error_contact')->all() as $m)
                                         {{$m}}<br>    
                                    @endforeach
                                        </div>
                                    @endif   
                                        <div class="block-content">
                                        <p id="company_contact_view">{{$company->company_contact}}</p>
                                            <form id="company_contact_form" action="{{URL::to('update_company_contact/'.$company->id)}}" method="post" enctype="multipart/form-data">
                                           <input class="form-control" type="text" id="company_contact" name="company_contact" placeholder="Enter Company Contact Number..." style="display:none" value="{{$company->company_contact}}">
                                        </div>
                                        <div class="block-content">
                                            <button class="btn btn-primary" id="company_contact_save_btn" style="display: none">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Timeline -->

                        </div>
                    </div>
                    <!-- END Main Content -->


                    <script type="text/javascript">
                        $("#company_logo_btn").click(function(event) {
                           $("#upload_company_photo").toggle('slow');
                        });
                        $("#company_logo_save").click(function(event) {
                            $("#company_photo_form").submit();
                        });
                        $("#company_logo").change(function(event) {
                            $("#company_logo_save").show('slow');
                        });
                        $("#update_mission_vision").click(function(event) {
                           $("#company_mission").toggle('fast');
                           $("#company_vision").toggle('fast');
                           $("#mission_view").hide('fast');
                           $("#vision_view").hide('fast');                            
                       }); 
                        //Company Mission Vision
                       $("#company_mission").keyup(function(event) {
                            old = $(this).val().length;
                            if($(this).val() != old){
                                $("#mission_vision_save_button").show('fast');
                            }
                       }); 

                       $("#company_vision").keyup(function(event) {
                            old = $(this).val().length;
                            if($(this).val() != old){
                                $("#mission_vision_save_button").show('fast');
                            }
                       });
                       //Company Summary
                        $("#update_summary_btn").click(function(event) {
                            $('#company_summary').show('fast');
                            $('#summary_view').hide('fast');
                       }); 

                       $("#company_summary").keyup(function(event) {
                            old = $(this).val().length;
                            if($(this).val() != old){
                                $("#save_summary_btn").show('fast');
                            }
                       });
                       //Company Address
                       $("#company_address_update_btn").click(function(event) {
                            $("#company_address_view").hide('fast');
                            $("#company_address").show('fast');
                        });

                       $("#company_address").keyup(function(event) {
                            old = $(this).val().length;
                            if($(this).val() != old){
                                $("#company_address_save_btn").show('fast');
                            }
                       });
                       //Company Contact
                       $("#company_contact_update_btn").click(function(event) {
                            $("#company_contact_view").hide('fast');
                            $("#company_contact").show('fast');
                        });

                       $("#company_contact").keyup(function(event) {
                            old = $(this).val().length;
                            if($(this).val() != old){
                                $("#company_contact_save_btn").show('fast');
                            }
                       });

                    </script>
@stop