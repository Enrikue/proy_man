<script type="text/javascript" src="../js/inventario.js?rev=<?php echo time(); ?>"></script>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Contenido Del Inventario del Centro de Computo</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter"
                            placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger" style="width: 100%" onclick="AbrirModalRegistroInventario()"><i
                            class="glyphicon glyphicon-plus"></i> Nuevo Registro</button>
                </div>
            </div>
            <table id="t_inventario" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Num. Inventario</th>
                        <th>Num. Serial</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Num. Inventario</th>
                        <th>Num. Serial</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<div class="modal fade" id="m_reg_inv" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registro de Inventario</h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label>Numero de Inventario</label>
                    <input type="text" class="form-control" id="txt_n_inv_reg"
                        placeholder="Ingrese Numero de Inventario">
                </div><br>
                <div class="col-lg-12">
                    <label>Numero Serial</label>
                    <input type="text" class="form-control" id="txt_n_serial_reg" placeholder="Ingrese Numero Serial">
                </div><br>
                <div class="col-lg-12">
                    <label>Descripción</label>
                    <input type="text" class="form-control" id="txt_desc_reg" placeholder="Ingrese Descripcion del ...">
                </div><br>
                <div class="col-lg-12">
                    <label>Marca</label>
                    <input type="text" class="form-control" id="txt_marca_reg" placeholder="Ingrese Marca del ...">
                </div><br>
                <div class="col-lg-12">
                    <label>Modelo</label>
                    <input type="text" class="form-control" id="txt_modelo_reg" placeholder="Ingrese Modelo del ...">
                </div><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        list_inventario();
    })
</script>