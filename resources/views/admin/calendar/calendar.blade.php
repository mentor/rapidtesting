@extends('layouts.admin')
@section('styles')
@parent
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css' />
@endsection
@section('content')
<h3 class="page-title">{{ trans('global.systemCalendar') }}</h3>
<div class="card">
    <div class="card-body">
        <div id='calendar'></div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js'></script>
<script>
    $(document).ready(function () {
        if (localStorage.getItem("fcDefaultView") === null) {
            localStorage.setItem("fcDefaultView", 'listDay')
        }
        if (localStorage.getItem("fcDefaultStartDate") === null) {
            localStorage.setItem("fcDefaultStartDate", new Date().toISOString().slice(0, 10))
        }
        var defaultView = localStorage.getItem("fcDefaultView");
        var defaultStartDate = localStorage.getItem("fcDefaultStartDate");

        // page is now ready, initialize the calendar...
        events={!! json_encode($events) !!};
        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'),{
            locale: 'sk',
            noEventsContent: 'Neboli nájdené žiadne udalosti pre zvolené obdobie!',
            initialView: defaultView,
            datesSet: function(info)
            {
                let startStr = info.startStr;
                if (info.view.type === 'dayGridMonth') {
                    date1 = new Date(info.startStr)
                    date2 = new Date(info.endStr)
                    middle = new Date(date2 - (date2-date1)/2);
                    startStr = middle.toISOString().slice(0, 10);
                }
                localStorage.setItem("fcDefaultView", info.view.type);
                localStorage.setItem("fcDefaultStartDate", startStr);
            },
            //initialView: defaultView,
            //initialView: 'listDay',
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
        calendar.gotoDate(defaultStartDate);
        calendar.render();
    });
</script>
@stop
