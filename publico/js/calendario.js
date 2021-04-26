document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: false,
        selectable: true,
        locale: 'es',
        select: function(datos) {
            console.log(datos);
            $('#registro').modal('show')
        },
        events: [
          {
            title: 'Cita',
            start: '2020-09-13T11:00:00',
            end: '2020-09-13T12:00:00',
            constraint: 'availableForMeeting', // defined below
            color: '#257e4a'
          }
        ]
        });
    calendar.render();
});

