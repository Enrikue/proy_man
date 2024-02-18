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
        { data: "status"},
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
    $("#m_reg_inv").modal('show');
  }