document.addEventListener('DOMContentLoaded', function() {
  var fechaActual = new Date();  
  var fechaInical = "";
  var mes = "";
  var dia = "";
  if (fechaActual.getMonth()<9) {
    mes = "0" + (fechaActual.getMonth()+1);
  } else {
    mes = "" + (fechaActual.getMonth()+1);
  }
  if (fechaActual.getDate()<10) {
    dia = "0" + fechaActual.getDate();
  } else {
    dia = "" + fechaActual.getDate();
  }
  fechaInical = fechaActual.getFullYear() + "-" + mes + "-" + dia;
  var calendarEl = document.getElementById('calendario');
  var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: fechaInical,
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: false,
        selectable: true,
        locale: 'es',
        dateClick: function(datos) {
            console.log(datos);
            var fechaDia = new Date(datos.dateStr);
            var mes = "";
            var dia = "";
              if (fechaDia.getMonth()<9) {
                mes = "0" + (fechaDia.getMonth()+1);
              } else {
                mes = "" + (fechaDia.getMonth()+1);
              }
              if (fechaDia.getDate()<10) {
                dia = "0" + fechaDia.getDate();
              } else {
                dia = "" + fechaDia.getDate();
              }
            fechaDia = dia + "/" + mes + "/" + fechaDia.getFullYear();
            console.log(fechaDia);
            $('#fechainicio').val(fechaDia);
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
    $("#editarCita").click(function(datos) {
      $('#editar').modal('show')
    });
});