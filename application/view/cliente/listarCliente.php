    <!-- Begin Page Content -->
    <div class="container-fluid">


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Clientes registrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>       
                        <th>Tipo Cliente</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>       
                        <th>Tipo Cliente</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($cliente as $value): ?>
                    <tr>
                        <td><?php echo $value['Documento']?> </td>
                        <td><?php echo $value['Nombres']?> </td>
                        <td><?php echo $value['Apellidos']?> </td>
                        <td><?php echo $value['Email']?> </td>
                        <td><?php echo $value['tipoCliente']?> </td>
                        <td>
                        <?php if($value['Estado'] == 1):?> 
                            <label class="label label-success">Activo</label>
                        <?php else: ?> 
                            <label class="label label-danger">Inactivo</label>
                        <?php endif; ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-editar" title="Editar" onclick="datoCliente('<?php echo $value['idCliente'];?>')"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-warning btn-xs" title="Cambiar Estado" onclick="cambiarEstado('<?php echo $value['idCliente'];?>')" name="button"><i class="fa fa-refresh"></i></button>
                            <button type="button" class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarCliente('<?php echo $value['idCliente'];?>')" name="button"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="modal-editar" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" class="">
                <div class="modal-header">
                    <h4 class="modal-title" >Editar Cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-log-12">
                            <div class="item form-group">
                                <div class="x_content">
                                    <br />
                                    <form class="form-label-left input_mask" method="POST">

                                        <input type="text" hidden id="txtIdCliente" name="txtIdCliente" >

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <select name="selTipoDocumento" id="selTipoDocumento" class="form-control has-feedback-left">
                                                <option selected="selected">Tipo Documento</option>
                                                <?php foreach($tiposDocumentos as $value):?>
                                                    <option value="<?php echo $value['idTipoDocumento'];?>"><?php echo $value['doc'];?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="txtDocumento"
                                                placeholder="Documento" name="txtDocumento">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="txtNombres"
                                                placeholder="Nombres" name="txtNombres">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="txtApellidos" placeholder="Apellidos" name="txtApellidos">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>


                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                            <input type="tel" class="form-control has-feedback-left" id="txtTelefono" placeholder="Telefono" name="txtTelefono">
                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                    
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <select name="selTipoCliente" id="selTipoCliente" class="form-control has-feedback-left">
                                            <option selected="selected">Seleccionar Cliente</option>
                                            <?php foreach($tipoCliente as $value): ?>
                                                <option value="<?php echo $value['idCliente'];?>"><?php echo $value['tipoCliente'];?></option>
                                            <?php endforeach; ?>
                                        </select>
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 text-center">Direccion</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="text" class="form-control" placeholder="Escribir Direccion" name="txtDireccion" id="txtDireccion" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 text-center">Correo</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <input type="email" class="form-control" placeholder="Escribir Correo" name="txtEmail" id="txtEmail" >
                                            </div>
                                        </div>

                                        <!-- <div class=" form-group row">
                                            <label for="" class="col-form-label col-md-3 col-sm-3 text-center">Roles</label>
                                            <div class="col-md-9 col-sm-9 ">
                                                <select name="selRoles" id="selRoles" class="form-control has-feedback-left">
                                                    <option selected="selected">Seleccionar Rol</option>
                                                    <?php #foreach($roles as $value):?>
                                                        <option value="<?php #echo $value['idRol'];?>"><?php #echo $value['tipo'];?></option>
                                                    <?php #endforeach; ?>
                                                </select>
                                            </div>
                                        </div> -->

                                        <div class="ln_solid"></div>
                                        <div class="form-group row">
                                            <div class="col-md-9 col-sm-9  offset-md-4">
                                                <a type="button" class="btn btn-danger" href="<?php echo URL; ?>clienteController/listarClientes">Cancel</a>
                                                <button type="submit" class="btn btn-success" name="btnEditar">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

function datoCliente(id){
        $.ajax({
            url:url+"clienteController/datoCliente",
            type: "post",
            dataType:"json",
            data:{'id':id}
        }).done(function(respuesta){
            $.each(respuesta, function(index, value){
                $('#selTipoDocumento').val(value.idTipoDocumento);
                $('#txtDocumento').val(value.Documento);
                $('#txtNombres').val(value.Nombres);
                $('#txtApellidos').val(value.Apellidos);
                $('#txtTelefono').val(value.Telefono);
                $('#txtEmail').val(value.Email);
                $('#txtDireccion').val(value.Direccion);
                $('#selTipoCliente').val(value.tipoCliente);
                $('#txtIdCliente').val(value.idCliente);
            })
        }).fail(function(error){
            console.log(Error)
        })
    }



    function cambiarEstado(id){
        Swal.fire({
            title: '¿Desea cambiar el estado del cliente?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Cambiar Cliente'

        }).then((result)=>{
            if(result.isConfirmed){
                Swal.fire({
                    title: 'Estado Cambiado',
                    confirmButtonText: 'OK'
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                            type: "post",
                            url: url + "clienteController/cambiarEstado",
                            data: {'id': id,}
                        }).done(function(respuesta){
                            if(respuesta == 1){
                                window.location = url + "clienteController/listarClientes";
                                window.reload();
                            }else{
                                Swal.fire('Error al cambiar estado', '', 'error');
                            }
                        }).fail(function(error){
                            console.log(error);
                        })
                    }
                })
            }
        })
    }
</script>

<script>
     //Funcion eliminar datoUsuario

     function eliminarCliente(id){
        Swal.fire({
            title: '¿Desea eliminar el cliente?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar Cliente'

        }).then((result)=>{
            if(result.isConfirmed){
                Swal.fire({
                    title: 'Cliente Eliminado',
                    confirmButtonText: 'OK'
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                            type: "post",
                            url: url + "clienteController/eliminarCliente",
                            data: {'id': id,}
                        }).done(function(respuesta){
                            if(respuesta == 1){
                                window.location = url + "clienteController/listarClientes";
                                window.reload();
                            }else{
                                Swal.fire('Error al eliminar cliente', '', 'error');
                            }
                        }).fail(function(error){
                            console.log(error);
                        })
                    }
                })
            }
        })
    }
</script>