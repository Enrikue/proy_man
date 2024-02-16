function verificarUsr() {
  var usr_login = $("#usr_txt").val();
  var pass_login = $("#passwd_txt").val();

  if (usr_login.length == 0 || pass_login.length == 0) {
    return Swal.fire("Mensaje de alerta", "Llene los campos vacios", "warning");
  }

  $.ajax({
    url: "../controlador/user/cont_verificar_usr.php",
    type: "POST",
    data: {
      usr: usr_login,
      pass: pass_login,
    },
  }).done(function (resp) {
    if (resp == 0) {
      Swal.fire("ERROR", "Los datos proporcionados no son correctos", "error");
    } else {
      var data = JSON.parse(resp);
      if (data[0][5] == "inactivo") {
        return Swal.fire(
          "Advertencia",
          "Lo sentimos, el usuario " +
            usr_login +
            " se encuentra suspendido, comuniquese con el administrador",
          "warning"
        );
      }
    }
    $.ajax({
      url: "../controlador/user/cont_crear_sesion.php",
      type: "POST",
      data: {
        usr_id: data[0][0],
        usr_name: data[0][1],
        rol_id: data[0][4],
      },
    }).done(function (resp) {
      let timerInterval;
      Swal.fire({
        title: "BIENVENIDO AL SISTEMA DE MANTENIMIENTO",
        html: "USTED SERA REDIRECCIONADO EN <b></b> milisegundos.",
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
          const timer = Swal.getPopup().querySelector("b");
          timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
          }, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        },
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          location.reload();
        }
      });
    });
  });
}
