var table;
function list_inventario() {
    table = $("#t_inventario").DataTable({
      //ordering: false,
      //paging: false,
      searching: { regex: true },
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "ALL"]
      ],
      pageLength: 10,
      destroy: true,
      async: false,
      processing: true,
      ajax: {
        url: "../controlador/inventario/cont_listar_inv.php",
        type: "POST",
      },
      columns: [
        { data: "n_inv" },
        { data: "num_serial" },
        { data: "dsc" },
        { data: "marca"},
        { data: "modelo"},
        {
          data: "status_nombre",
          render: function (data, type, row) {
            switch(data){
              case 'BUENO': return "<span class='label label-success'>" + data + "</span>";
                            break;
              case 'EN RIESGO': return "<span class='label label-warning'>" + data + "</span>";
                                break;
              case 'DAÑADO': return "<span class='label label-danger'>" + data + "</span>";
                             break;
              case 'DESCONOCIDO': return "<span class='label label-primary'>" + data + "</span>";
                                  break;
            }
          },
        },
        { data: "observacion"},
      ],
      language: idioma_espanol,
      select: true,
    });
    document.getElementById("t_inventario_filter").style.display="none";
    $('input.global_filter').on('keyup click',function(){
      filterGlobal();
    });
    $('input.column_filter').on('keyup click',function(){
      filterColumn($(this).parents('tr').attr('data-column'));
    });
  }

  function filterGlobal(){
    $('#t_inventario').DataTable().search(
      $('#global_filter').val(),
    ).draw();
  }

  function AbrirModalRegistroInventario(){
    $("#m_reg_inv").modal({backdrop:'static', keyboard:false})
    $("#m_reg_inv").modal('show');
  }

  function list_combo_status(){
    $.ajax({
      url: "../controlador/inventario/cont_lista_combo_status.php",
      type: "POST",
    }).done(function(resp){
      var data = JSON.parse(resp);
      var cadena = "";
      if(data.length > 0){
        for(var i = 0; i < data.length; i++){
          cadena += "<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
        }
        $("#cbm_status").html(cadena);
      }else{
        cadena += "<option value=''>NO SE ENCONTRARON DATOS</option>";
      }
    })
  }

  function Registrar_Inventario(){
    var n_inv = $("#txt_n_inv_reg").val();
    var n_serial = $("#txt_n_serial_reg").val();
    var descripcion = $("#txt_desc_reg").val();
    var marca = $("#txt_marca_reg").val();
    var modelo = $("#txt_modelo_reg").val();
    var observacion = $("#txt_observacion_reg").val();
    var status = $("#cbm_status"). val();
    if( n_inv.length == 0 || n_serial.length == 0 || descripcion.length == 0 || marca.length == 0 || modelo.length == 0 || observacion.length == 0 || status.length == 0 ){
      return Swal.fire("Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
      url: "../controlador/inventario/cont_registrar_inventario.php",
      type: "POST",
      data:{
        num_inv: n_inv,
        num_serial: n_serial,
        dsc: descripcion,
        marca_inv: marca,
        mod: modelo,
        observ: observacion,
        status_inv: status
      }
    }).done(function(resp){
      if(resp > 0){
        if(resp==1){
          $("#m_reg_inv").modal('hide');
          Swal.fire("Exito", "Se registro correctamente en el inventario", "success").then((value) => {
            LimpiarRegistro();
            table.ajax.reload();
          });
        } else{
          return Swal.fire("Error", "El registro ya existe en la base de datos", "error");
        }
      } else{
          return Swal.fire("Error", "El registro no puede ser completado", "error");
      }
    })

  }

  function LimpiarRegistro(){
    $("#txt_n_inv_reg").val("");
    $("#txt_n_serial_reg").val("");
    $("#txt_n_desc_reg").val("");
    $("#txt_n_marca_reg").val("");
    $("#txt_n_modelo_reg").val("");
    $("#txt_n_observacion_reg").val("");
  }