@extends('layout.in_app')
@section('content')
    <div class="content bg-white">
        <!-- Calendar and Events functionality (initialized in js/pages/base_comp_calendar.js), for more info and examples you can check out http://fullcalendar.io/ -->
        <div class="row items-push">
            <div class="col-md-4 col-md-push-8 col-lg-2 col-lg-push-10">
                <!-- Add Event Form -->
                <form class="js-form-add-event push-30" method="post">
                    <div class="input-group">
                        <input class="js-add-event form-control" type="text" placeholder="Add event..">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="form-control">
                        <button id="btn_save_calendar" class="btn btn-info btn-block"><i class="fa fa-save"></i> Save Calendar</button>
                    </div>
                </form>
                <!-- END Add Event Form -->

                <!-- Event List -->
                <ul class="js-events list list-events">
                    <li style="background-color: #b5d0eb;">I'm an event! Drag me to the Calendar!</li>
                </ul>
                <div class="text-center text-muted">
                    <small><em><i class="fa fa-arrows"></i> Drag and drop events on the calendar</em></small>
                </div>
                <!-- END Event List -->
            </div>
            <div class="col-md-8 col-md-pull-4 col-lg-10 col-lg-pull-2">
                <!-- Calendar Container -->
                <div class="js-calendar"></div>
            </div>
        </div>
        <!-- END Calendar -->
    </div>
    <div class="modal" id="calendar-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="block block-themed block-transparent remove-margin-b">
                    <div class="block-header bg-primary-dark">
                        <ul class="block-options">
                            <li>
                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                            </li>
                        </ul>
                        <h3 class="block-title">Edit This Event!</h3>
                    </div>
                    <div class="block-content">
                        <form id="edit_event">
                            <input type="hidden" id="event_id">
                            <div class="input-group">
                                Event Title: <input type="text" id="event_title">
                            </div>
                            {{-- <div class="input-group">
                                Event Start: <input type="text" id="event_start">
                            </div>
                            <div class="input-group">
                                Event End: <input type="text" id="event_end">
                            </div> --}}
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                    <button id="btn_edit_event" class="btn btn-sm btn-success" type="button" data-dismiss="modal">Edit</button>
                    <button id="btn_delete_event" class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{HTML::script("assets/js/pages/base_comp_calendar.js")}}
@stop