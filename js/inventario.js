function list_inventario() {
    var table = $("#t_inventario").DataTable({
      ordering: false,
      paging: false,
      searching: { regex: true },
      lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "ALL"],
      ],
      pageLength: 100,
      destroy: true,
      async: false,
      processing: true,
      ajax: {
        url: "../controlador/inventario/cont_listar_inv.php",
        type: "POST",
      },
      columns: [
        { data: "posicion" },
        { data: "n_inv" },
        { data: "num_serial" },
        { data: "dsc" },
        { data: "marca"},
        { data: "modelo"},
        { data: "status"},
        { data: "observacion"},
      ],
      language: idioma_espanol,
      select: true,
    });
  }