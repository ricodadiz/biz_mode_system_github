/*
 *  Document   : base_comp_calendar.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Calendar Page
 */

var BaseCompCalendar = function() {
    // Add new event in the event list
    var addEvent = function() {
        var $eventInput      = jQuery('.js-add-event');
        var $eventInputVal   = '';

        // When the add event form is submitted
        jQuery('.js-form-add-event').on('submit', function(){
            $eventInputVal = $eventInput.prop('value'); // Get input value

            // Check if the user entered something
            if ( $eventInputVal ) {
                // Add it to the events list
                jQuery('.js-events')
                    .prepend('<li class="animated fadeInDown">' +
                            jQuery('<div />').text($eventInputVal).html() +
                            '</li>');

                // Clear input field
                $eventInput.prop('value', '');

                // Re-Init Events
                initEvents();
            }

            return false;
        });
    };

    // Init drag and drop event functionality
    var initEvents = function() {
        jQuery('.js-events')
            .find('li')
            .each(function() {
                var $event = jQuery(this);

                // create an Event Object
                var $eventObject = {
                    title: jQuery.trim($event.text()),
                    color: $event.css('background-color') };

                // store the Event Object in the DOM element so we can get to it later
                jQuery(this).data('eventObject', $eventObject);

                // make the event draggable using jQuery UI
                jQuery(this).draggable({
                    zIndex: 999,
                    revert: true,
                    revertDuration: 0
                });
            });
    };

    // Init FullCalendar
    var initCalendar = function(){
        var $date    = new Date();
        var $d       = $date.getDate();
        var $m       = $date.getMonth();
        var $y       = $date.getFullYear();

        jQuery('.js-calendar').fullCalendar({
            firstDay: 1,
            editable: true,
            droppable: true,
            header: {
                left: 'title',
                right: 'prev,next month,agendaWeek,agendaDay'
            },
            eventClick: function(event, element) {
                $("#calendar-modal").modal('show');
                //console.log(event);
                $("#event_id").val(event._id);
                $("#event_title").val(event.title);
                /*$("#event_start").val(event.start);
                $("#event_end").val(event.end);*/
                //jQuery('.js-calendar').fullCalendar('removeEvents', event.id);
            },
            drop: function($date, $allDay) { // this function is called when something is dropped
                // retrieve the dropped element's stored Event Object
                var $originalEventObject = jQuery(this).data('eventObject');

                // we need to copy it, so that multiple events don't have a reference to the same object
                var $copiedEventObject = jQuery.extend({}, $originalEventObject);

                // assign it the date that was reported
                $copiedEventObject.start = $date;

                // render the event on the calendar
                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                jQuery('.js-calendar').fullCalendar('renderEvent', $copiedEventObject, true);

                // remove the element from the "Draggable Events" list
                jQuery(this).remove();
                $("#btn_save_calendar").click();
            },
            eventDrop: function(){
                $("#btn_save_calendar").click();
            },
            eventResize: function(){
                $("#btn_save_calendar").click();   
            },
            events: "get_events"
        });
    };
    return {
        init: function () {
            // Add Event functionality
            addEvent();

            // FullCalendar, for more examples you can check out http://fullcalendar.io/
            initEvents();
            initCalendar();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseCompCalendar.init(); });

$("#edit_event").on('submit',function(){
    event = $('.js-calendar').fullCalendar('clientEvents',$("#event_id").val());
    event[0].title = $("#event_title").val();
    $('.js-calendar').fullCalendar('updateEvent',event[0]);
    $("#btn_save_calendar").click();
    return false;
});

$("#btn_edit_event").on('click',function(){
    $("#edit_event").submit();
});

$("#btn_delete_event").on('click',function(){
    $('.js-calendar').fullCalendar( 'removeEvents',$("#event_id").val());
    $("#btn_save_calendar").click();
});

$("#btn_save_calendar").on('click',function(){
    $serialize = $('.js-calendar').fullCalendar('clientEvents');
    $data = [];
    $.each($serialize, function(index, val) {
        $data.push({
            title: $serialize[index].title,
            start: $serialize[index].start,
            end: $serialize[index].end
        });
    });
    $collections = {
        collections: JSON.stringify($data)
    }
    $.ajax({
        url: 'update_calendar',
        type: 'POST',
        data: $collections
    });
});