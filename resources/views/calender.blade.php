@extends('template')

@section('content')
<div class="container-fluid">
    <h4 class="page-title">Interview Report</h4>

    <div class="calendar-container bg-white p-3 rounded shadow-sm">
        <h5 class="text-center mb-3">📅 Interview  Event Calendar</h5>

        <div class="d-flex justify-content-end mb-2">
            <label class="mr-2">View:</label>
            <select id="calendarView" class="form-control w-auto">
                <option value="dayGridMonth">Month</option>
                <option value="timeGridWeek" selected>Week</option>
                <option value="timeGridDay">Day</option>
            </select>
        </div>

        <div id="calendar"></div>

        <div class="legend d-flex justify-content-center mt-3 gap-3">
            <span><span class="dot pending"></span> Pending</span>
            <span><span class="dot complete"></span> Complete</span>
            <span><span class="dot cancelled"></span> Cancelled</span>
            <span><span class="dot subject"></span> Subject</span>
        </div>
    </div>
</div>

<!-- FullCalendar Styles & Scripts -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

<style>
   
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      background: #f5f5f5;
    }

    h2 {
      text-align: center;
    }

    .calendar-container {
      max-width: 1000px;
      margin: auto;
      background: white;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border-radius: 8px;
    }

    .view-selector {
      margin-bottom: 10px;
      text-align: right;
    }

    .view-selector select {
      padding: 6px 12px;
      font-size: 16px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    .legend {
      margin-top: 10px;
      display: flex;
      gap: 15px;
      font-size: 14px;
    }

    .legend span {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      display: inline-block;
    }

    .pending { background: #f1c40f; }
    .complete { background: #2ecc71; }
    .cancelled { background: #e74c3c; }
  
</style>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        var interviewEvents = {!! json_encode($interviewTableData) !!};
        console.log(interviewEvents);

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            height: 'auto',
            nowIndicator: true,
            allDaySlot: false,
            slotMinTime: "00:00:00",
            slotMaxTime: "22:00:00",

            eventDidMount: function (info) {
                if (info.event.extendedProps.status) {
                    info.el.setAttribute("title", `Status: ${info.event.extendedProps.status}`);
                }
            },

            
            events: interviewEvents
            
        });


        calendar.render();

        document.getElementById('calendarView').addEventListener('change', function () {
            calendar.changeView(this.value);
        });
    });
</script>
@endsection
