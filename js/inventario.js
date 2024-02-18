function list_inventario() {
    var table = $("#t_inventario").DataTable({
      ordering: false,
      paging: false,
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
        { data: "status_nombre"},
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
      alert(resp);
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