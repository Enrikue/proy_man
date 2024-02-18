<script  type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Contenido Del Usuario</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class = "form-group">
                <div class = "col-lg-10">
                    <div class = "input-group">
                        <input type="text" class="global_filter form-control" id="global_filter"
                        placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class = "col-lg-2">
                    <button class="btn btn-danger" style="width: 100%"><i class="glyphicon glyphicon-plus"></i>  Nuevo Registro</button>
                </div>
            </div>
        <table id="t_usr" class="display responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>USUARIO</th>
                    <th>ROL</th>
                    <th>GÉNERO</th>
                    <th>STATUS</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>USUARIO</th>
                    <th>ROL</th>
                    <th>GÉNERO</th>
                    <th>STATUS</th>
                    <th>ACCIÓN</th>
                </tr>
            </tfoot>
        </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<script>
    $(document).ready(function(){
        list_usr();
    })
</script>