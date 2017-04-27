@extends('layout.in_app')
@section('content')
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- User Header -->
                    <div class="block">
                        <!-- Basic Info -->
                        <div class="bg-image" style="background-image: url('/assets/img/photos/settings1.jpg');">
                            <div class="block-content bg-primary-op text-center overflow-hidden">
                                <div class="push-30-t push animated fadeInDown">
                                @if($user->profile_photo === NULL)
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('assets/img/avatars/avatar1.jpg')}}" alt="">
                                @else
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{$user->profile_photo}}" alt="">
                                @endif
                                </div>
                                <div class="push-30 animated fadeInUp">
                                    <h2 class="h4 font-w600 text-white push-5">{{$user->username}}</h2>
                                    <h3 class="h5 text-white-op">{{$user->email}}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- END Basic Info -->
                    </div>
                    <!-- END User Header -->
                    <!-- Main Content -->
                    <form action="{{URL::to('update_user_profile')}}" method="post" enctype="multipart/form-data">
                        <div class="block">
                            <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
                                <li class="active">
                                    <a href="#tab-profile-personal"><i class="si si-fw si-user"></i>Profile</a>
                                </li>
<!--                             <li>
                                    <a href="#tab-profile-password"><i class="fa fa-fw fa-asterisk"></i> Password</a>
                                </li> -->

                            </ul>

                            <div class="block-content tab-content">
                                <!-- Personal Tab -->
                                @if(isset(Session::get('profile_message')["message"]))
                                    <div class="alert alert-success">
                                        {{Session::get('profile_message')["message"]}}
                                    </div>
                                @endif
                                @if(Session::get('profile_error'))
                                    <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('profile_error')->all() as $m)
                                        {{$m}}<br>    
                                    @endforeach
                                    </div>
                                @endif
                                <div class="tab-pane fade in active" id="tab-profile-personal">
                                    <div class="row items-push">
                                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label>Username</label>
                                                    <div class="form-control-static font-w700">{{$user->username}}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-email">Email Address</label>
                                                    <div class="form-control-static font-w700">{{$user->email}}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="profile-firstname">Firstname</label>
                                                    <input class="form-control input-lg" type="text" id="profile-firstname" name="profile-firstname" placeholder="Enter your firstname.." value="{{$user->user_firstname}}">
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="profile-lastname">Lastname</label>
                                                    <input class="form-control input-lg" type="text" id="profile-lastname" name="profile-lastname" placeholder="Enter your lastname.." value="{{$user->user_lastname}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-position">Position</label>
                                                    <input class="form-control input-lg" type="text" id="profile-position" name="profile-position" placeholder="Enter your position to the company.." value="{{$user->user_position}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-bio">User Bio</label>
                                                    <textarea class="form-control input-lg" id="profile-bio" name="profile-bio" rows="15" placeholder="Enter a few details about yourself..">{{$user->user_bio}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label for="profile-city">Where do you live?</label>
                                                    <input class="form-control input-lg" type="text" id="profile-city" name="profile-city" placeholder="Enter your location.." value="{{$user->user_address}}">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="profile-age">Age</label>
                                                    <input class="form-control input-lg" type="text" id="profile-age" name="profile-age" placeholder="Enter your age.." value="{{$user->user_age}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label for="profile-photo">Upload your profile photo</label>
                                                    <input type="file" name="profile_photo" id="profile_photo">
                                                </div>
                                            </div>
<!--                                             <div class="form-group">
                                                <label class="col-xs-12">Gender</label>
                                                <div class="col-xs-12">
                                                    <label class="css-input css-radio css-radio-primary push-10-r">
                                                        <input type="radio" name="profile-gender-group"><span></span> Female
                                                    </label>
                                                    <label class="css-input css-radio css-radio-primary">
                                                        <input type="radio" name="profile-gender-group" checked><span></span> Male
                                                    </label>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

                                </div>
                                <!-- END Personal Tab -->
                                <!-- Password Tab -->
<!--                                 <div class="tab-pane fade" id="tab-profile-password">
                                    <div class="row items-push">
                                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-password">Current Password</label>
                                                    <input class="form-control input-lg" type="password" id="profile-password" name="profile-password">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-password-new">New Password</label>
                                                    <input class="form-control input-lg" type="password" id="profile-password-new" name="profile-password-new">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-password-new-confirm">Confirm New Password</label>
                                                    <input class="form-control input-lg" type="password" id="profile-password-new-confirm" name="profile-password-new-confirm">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- END Password Tab -->


                            </div>
                            <div class="block-content block-content-full bg-gray-lighter text-center">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check push-5-r"></i> Save Changes</button> 
                                <button class="btn btn-sm btn-warning" type="reset"><i class="fa fa-refresh push-5-r"></i> Reset</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Main Content -->
                </div>
                <!-- END Page Content -->
                <script type="text/javascript">

                    $("#photo_btn").click(function(){
                        $("#profile_photo").click();
                    });
                    $("#profile_photo").change(function(event) {
                        var input = document.querySelector('input[type=file]');
                        var reader  = new FileReader();
                        reader.readAsText(input.file[0]);
                    });
                </script>
@stop