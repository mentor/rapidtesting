@extends('layouts.admin')
@section('content')
<h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
<div class="card">
<!--    <div class="card-header">
        {{ trans('global.systemCalendar') }}
    </div>-->

    <div class="card-body">
{{--        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />--}}
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css' />

        <div id='calendar'></div>
    </div>
</div>



@endsection

@section('scripts')
@parent
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
{{--<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>--}}
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js'></script>
<script>
    $(document).ready(function () {
        // page is now ready, initialize the calendar...
        events={!! json_encode($events) !!};
        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'),{
            locale: 'sk',
            noEventsContent: 'Neboli nájdené žiadne udalosti pre zvolené obdobie!',
            initialView: 'listDay',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'listDay,listWeek,dayGridMonth'
            },
            buttonText: {
                today:    'dnes',
            },
            views: {

                listDay: {
                    buttonText: 'deň'
                },
                listWeek: {
                    buttonText: 'týždeň'
                },
                dayGridMonth: {
                    buttonText: 'mesiac'
                },
            },
            // put your options and callbacks here
            events: events,

        });
        calendar.render();
    });
</script>
@stop
