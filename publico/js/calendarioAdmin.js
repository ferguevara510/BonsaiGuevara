document.addEventListener("DOMContentLoaded", function () {
  var fechaActual = new Date();

  fechaInical = convertirDateToString(fechaActual);
  var calendarEl = document.getElementById("calendario");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialDate: fechaInical,
    navLinks: true, // can click day/week names to navigate views
    businessHours: true, // display business hours
    editable: false,
    selectable: true,
    locale: "es",
    weekends: false,
    events: {
      url: "../controlador/consultarCita.php",
      method: "GET",
    },
    eventClick: function (datos) {
      console.log(datos.event.id);
      $.ajax({
        url:"../controlador/consultarCita.php?id=" + datos.event.id,
        method: "GET",
        dataType: "json",
      })
        .done(function (res) {
          $("#nombre").val(res.id_cliente);
          $("#fecha").val(res.fecha);
          $("#folio").val(res.folio);
          $("#hora").val(res.hora);
          $("#duracion").val(res.duracion);
          $("#descripcion").val(res.descripcion);
          $("#vista").modal("show");
        })
        .fail(function (res) {
          mostrarMensaje("No se encontro la cita", false);
        });
    },
  });
  calendar.setOption("locale", "es");
  calendar.render();

  function convertirDateToString(fecha, conHora = false) {
    var fechaInical = "";
    var mes = "";
    var dia = "";
    if (fecha.getMonth() < 9) {
      mes = "0" + (fecha.getMonth() + 1);
    } else {
      mes = "" + (fecha.getMonth() + 1);
    }
    if (fecha.getDate() < 10) {
      dia = "0" + fecha.getDate();
    } else {
      dia = "" + fecha.getDate();
    }
    fechaInical = fecha.getFullYear() + "-" + mes + "-" + dia;

    if (conHora) {
      fechaInical +=
        " " +
        fecha.getHours() +
        ":" +
        fecha.getMinutes +
        ":" +
        fecha.getSeconds();
    }

    return fechaInical;
  }
});
