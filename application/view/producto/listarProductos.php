<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Productos Registrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre de Producto</th>
                        <th>Precio</th>
                        <th>ID Estado</th>
                        <th>Cantidad</th>
                        <th>Garantia</th>
                        <th>Fecha de Garantia</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Serie</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre de Producto</th>
                        <th>Precio</th>
                        <th>ID Estado</th>
                        <th>Cantidad</th>
                        <th>Garantia</th>
                        <th>Fecha de Garantia</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Serie</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach($listarProductos as $value):?>
                    <tr>
                        <td><?php echo $value['Nom_Producto']?></td>
                        <td><?php echo $value['Precio']?></td>
                        <td><?php echo $value['Estado']?></td>
                        <td><?php echo $value['Cantidad']?></td>
                        <td><?php echo $value['Garantia']?></td>
                        <td><?php echo $value['Fecha_Garantia']?></td>
                        <td><?php echo $value['Descripcion']?></td>
                        <td><?php echo $value['idMarca']?></td>
                        <td><?php echo $value['idCategoria']?></td>
                        <td><?php echo $value['Serie']?></td>
                        <td>
                            <?php if($value['Estado'] == 1):?>
                                <label class="label label-success">Activo</label>
                            <?php else: ?>
                                <label class="label label-danger">Inactivo</label>
                            <?php endif;?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-editar" title="Editar" onclick="modificarProducto('<?php echo $value['idProducto'];?>')"><i class="fa fa-edit" name="btnEditarP"></i></button>

                            <button type="button" class="btn btn-warning btn-xs" title="Cambiar Estado" onclick="cambiarEstado('<?php echo $value['idProducto'];?>')" name="button"><i class="fa fa-refresh"></i></button>

                            <button type="button" class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarCliente('<?php echo $value['idProducto'];?>')" name="button"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach ;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="modal-editar" aria-labelledby="myModalLabel" araia-hidden="true" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" class="">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Producto</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-log-12">
                        <div class="x_content">
									<br />
									<form class="form-label-left input_mask" method="post">
                                        <input type="text" id="txtIdCliente" name="txtIdUsuario" hidden>
										<div class="col-md-6 col-sm-6  form-group has-feedback ">
											<select name="selMarca" id="selMarca" class="form-control has-feedback-left">
												<option selected="selected">Marca</option>
												<?php foreach($listarMarca as $value):?>
													<option value="<?php echo $value['idMarca'];?>"><?php echo $value['Nombres'];?></option>
												<?php endforeach; ?>
											</select>
                                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
										</div>
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtNombreProducto" placeholder="Nombre Producto" name="txtNombreProducto">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>	
                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
											<select name="selCategoria" id="selCategoria" class="form-control has-feedback-left">
												<option selected="selected">Categoria</option>
												<?php foreach($listarCategoria as $value):?>
													<option value="<?php echo $value['idCategoria'];?>"><?php echo $value['Nombre'];?></option>
												<?php endforeach; ?>
											</select>
                                            <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
										</div>

														
									
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtPrecio" placeholder="Precio" name="txtPrecio">
											<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="tel" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Cantidad" name="txtCantidad">
                                        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 text-center">Serie</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Escribir Serie" name="txtSerie">
                                        </div>
                                    </div>

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="tel" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Garantia" name="txtGarantia">
                                        <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                                    </div>

										
                                    <div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 text-center">Fecha de Garantia</label>
											<div class="col-md-9 col-sm-9 ">
												<input id="birthday" class="date-picker form-control" name="txtFechaG" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
                                        <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 text-center">Descripcion</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Escribir Descripcion" name="txtDescripcion">
                                        </div>
                                    </div>
										<!-- <div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 ">Rol</label>
											<div class="col-md-9 col-sm-9 ">
												<select name="selRoles" id="selRoles" class="form-control">
													<option selected="selected">Seleccione</option>
													<?php foreach($roles as $value):?>
														<option value="<?php echo $value['idRol'];?>"><?php echo $value['tipo'];?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div> -->
                                        <div class="ln_solid"></div>
                                        <div class="form-group row">
                                            <div class="col-md-9 col-sm-9  offset-md-4">
                                                <a type="button" class="btn btn-danger" href="<?php echo URL; ?>clienteController/listarProductos">Cancel</a>
                                                <button type="submit" class="btn btn-success" name="btnEditar">Guardar</button>
                                            </div>
                                        </div>
									</form>
								</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function datoUsuario(id){
        $.ajax({
            url: url+"productoController/datoUsuario",
            type:"POST",
            dataType:"json",
            data:{'id':id}
        }).done(function(respuesta){
            $.each(respuesta, function(index, value){
                $('#selTiposDocumentos').val(value.idTipoDocumento);
                $('#txtDocumento').val(value.Documento);
                $('#txtNombres').val(value.Nombres);
                $('#txtApellidos').val(value.Apellidos);
                $('#txtTelefono').val(value.Telefono);
                $('#txtEmail').val(value.Email);
                $('#txtDireccion').val(value.Direccion);
                $('#txtUsuario').val(value.Usuario);
                //$('#selRoles').val(value.idRol);
                $('#txtIdUsuario').val(value.idUsuario);
            })
        }).fail(function(error){
            console.log(Error)
        })
    }
</script>
<script>
    function cambiarEstado(id){
        Swal.fire({
            title: '¿Desea cambiar el estado del usuario?',
            icon: 'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Cambiar estado'
        }).then((result)=>{
            if(result.isConfirmed){
                Swal.fire({
                    title: 'Estado Cambiado',
                    confirmButtonText: 'Ok'
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                            type: "POST",
                            url: url + "productoController/cambiarEstado",
                            data: {'id': id,}
                        }).done(function(respuesta){
                            if(respuesta == 1){
                                window.location = url + "productoController/listarProductos";
                                window.reload();
                            }else{
                                Swal.fire('Error al cambiar el estado', '','error');
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
    function eliminarUsuario(id){
        Swal.fire({
            title: '¿Desea eliminar el usuario?',
            icon: 'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar'
        }).then((result)=>{
            if(result.isConfirmed){
                Swal.fire({
                    title: 'Usuario Eliminado',
                    confirmButtonText: 'Ok'
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                            type: "POST",
                            url: url + "usuarioController/eliminarUsuario",
                            data: {'id': id,}
                        }).done(function(respuesta){
                            if(respuesta == 1){
                                window.location = url + "usuarioController/listarUsuarios";
                                window.reload();
                            }else{
                                Swal.fire('Error al eliminar el usuario', '','error');
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

