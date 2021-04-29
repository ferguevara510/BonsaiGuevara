document.addEventListener('DOMContentLoaded', function () {
  var fechaActual = new Date();
  var fechaInical = "";
  var mes = "";
  var dia = "";
  if (fechaActual.getMonth() < 9) {
    mes = "0" + (fechaActual.getMonth() + 1);
  } else {
    mes = "" + (fechaActual.getMonth() + 1);
  }
  if (fechaActual.getDate() < 10) {
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
    dateClick: function (datos) {
      let fechaCita = new Date(datos.dateStr);
      if (fechaCita.getDay() < 5) {
        $('#fechainicio').val(datos.dateStr);
        $("#fechainicio").prop("disabled", true);
        $('#modalCita').modal('show');
      }else{
        mostrarMensaje("Solo puede agendarse citas de lunes a viernes",false);
      }

    }
  });
  calendar.render();
  $("#editarCita").click(function (datos) {
    $('#editar').modal('show')
  });

  $("#enviar").click(function (datos) {
    $("#form-cita").submit();
  });
  $("#form-cita").validate({
    rules: {
      hora: {
        min: "14:00:00",
        max: "19:00:00",
        required: true,
        intervalo: true
      },
      duracion: {
        required: true
      },
      descripcion: {
        required: true
      }
    },
    messages: {
      hora: {
        min: "El horario de atención es de 14:00 a 19:00",
        max: "El horario de atención es de 14:00 a 19:00",
        required: "Seleccione una hora dentro del horario 14:00 a 19:00 "
      },
      duracion: {
        required: "Seleccione el tiempo que durara su cita"
      },
      descripcion: {
        required: "Ingrese una descripción del proposito de su cita"
      }
    },
    errorPlacement: function (error, element) {
      $(element).closest('.form-group').find('.help-block').html(error.html());
    },
    highlight: function (element) {
      $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
      $(element).closest('.form-group').find('.help-block').html('');
    },
    submitHandler: function (form) {
      var formData = new FormData(document.getElementById("form-cita"));
      formData.append("fecha", $("#fechainicio").val());
      formData.append("id_cliente", 1);
      $.ajax({
        url: form.action,
        method: "POST",
        dataType: "json",
        data: formData,
        contentType: false,
        processData: false
      }).done(function (res) {
        mostrarMensaje("Cita guardada");
        $("#form-cita").trigger("reset");
        $('#modalCita').modal('hide');

      }).fail(function (res) {
        mostrarMensaje("No se ha podido guardar la cita", false);
      });
    }
  });

  $.validator.addMethod("intervalo", function (value, element) {
    let secciones = value.split(":");
    let horas = ["00", "15", "30", "45"];
    return horas.indexOf(secciones[1]) != -1;
  }, "Seleccione intervalos de 00, 15, 30 o 45 minutos");

  function mostrarMensaje(mensaje, success = true) {
    if (success) {
      $(".alert").removeClass("tag-hidden");
      $(".alert").removeClass("alert-success");
      $(".alert").addClass("alert-success");
    } else {
      $(".alert").removeClass("tag-hidden");
      $(".alert").removeClass("alert-success");
      $(".alert").addClass("alert-warning");
    }

    $(".mensaje").html(mensaje);
    window.setTimeout(function (params) {
      $(".alert").fadeTo(1500, 0).slideDown(1000,
        function (params) {
          $(this).addClass("tag-hidden");
          $(this).removeAttr("style");
        }
      );
    }, 3000);
  }
});