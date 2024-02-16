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

function list_usr(){
  var table = $("#t_usr").DataTable({
    "ordering": false,
    "paging": false,
    "searching": { "regex": true },
    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "ALL"] ],
    "pageLength": 100,
    "destroy": true,
    "async": false,
    "processing": true,
    "ajax": {
      "url": "../controlador/user/cont_listar_usr.php",
      type: 'POST'
    },
    "columns": [
      { "data": "posicion" },
      { "data": "persona" },
      { "data": "usr_name" },
      { "data": "usr_rol" },
      { "data": "usr_gen" },
      { "data": "usr_status",
      render: function(data, type, row){
        if(data == 'activo'){
          return "<span class='label label-danger'>" + data + "</span>"
        } else {
          return "<span class='label label-danger'>" + data + "</span>"
        }
      }
     },
     { "defaultConten": "<button style='font-size: 13px;' type='button' class='editar btn btn_primary>'" }
    ],
    "language": idioma_espanol,
    select: true
  });
}