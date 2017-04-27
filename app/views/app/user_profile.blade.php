@extends('layout.in_app')
@section('content')
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- User Header -->
                    <div class="block">
                        <!-- Basic Info -->
                        <div class="bg-image" style="background-image: url('/assets/img/photos/photo21@2x.jpg');">
                            <div class="block-content bg-primary-op text-center overflow-hidden">
                                <div class="push-30-t push animated fadeInDown">
                                @if($profile_view->profile_photo === NULL)
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{asset('assets/img/avatars/avatar1.jpg')}}" alt="">
                                @else
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="{{$profile_view->profile_photo}}" alt="">
                                @endif
                                </div>
                                <div class="push-30 animated fadeInUp">
                                    <h2 class="h4 font-w600 text-white push-5">{{$profile_view->username}}</h2>
                                    <h3 class="h5 text-white-op">{{$profile_view->email}}</h3>
                                </div>
                            </div>
                        </div>
                        <!-- END Basic Info -->
                    </div>
                    <!-- END User Header -->
                    <!-- Main Content -->
                    <form action="pages_profile_edit.html" method="post" onsubmit="return false;">
                        <div class="block">
                            <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
                                <li class="active">
                                    <a href="#tab-profile-personal"><i class="fa fa-fw"></i> Profile Information</a>
                                </li>

                            </ul>
                            <div class="block-content tab-content">
                                <!-- Personal Tab -->
                                <div class="tab-pane fade in active" id="tab-profile-personal">
                                    <div class="row items-push">
                                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label>Full Name</label>
                                                    <div class="form-control-static font-w700">{{$profile_view->user_firstname}} {{$profile_view->user_lastname}}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label>Position</label>
                                                    <div class="form-control-static font-w700" placeholder="Not Yet Assigned to any Position">{{$profile_view->user_position}}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-bio">About Me</label>
                                                    <div class="form-control-static font-w700" placeholder="Not Yet Assigned to any Position">{{$profile_view->user_bio}}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label>Address</label>
                                                    <div class="form-control-static font-w700">{{$profile_view->user_address}}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label>Age</label>
                                                    <div class="form-control-static font-w700">{{$profile_view->user_age}}</div>
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
                                <div class="tab-pane fade" id="tab-profile-password">
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
                                </div>
                                <!-- END Password Tab -->

                            </div>

                        </div>
                    </form>
                    <!-- END Main Content -->
                </div>
                <!-- END Page Content -->
@stop