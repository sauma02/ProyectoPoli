<div class="container body">
	<div class="main_container">
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Registrar Producto</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Settings 1</a>
                                            <a class="dropdown-item" href="#">Settings 2</a>
                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form class="form-label-left input_mask" method="POST">

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <select name="selMarca" id="selMarca" class="form-control has-feedback-left">
                                            <option selected="selected">Seleccione la marca</option>
                                            <?php foreach($listarMarca as $value):?>
                                                <option value="<?php echo $value['idMarca'];?>"><?php echo $value['Nombres'];?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <select name="selCategoria" id="selCategoria" class="form-control has-feedback-left">
                                            <option selected="selected">Seleccione la categoria</option>
                                            <?php foreach($listarCategoria as $value):?>
                                                <option value="<?php echo $value['idCategoria'];?>"><?php echo $value['Nombre'];?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="txtNombreProducto"
                                            placeholder="Nombre del producto" name="txtNombreProducto">
                                        <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="txtPrecio"
                                            placeholder="Precio" name="txtPrecio">
                                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                        


                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="tel" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Cantidad" name="txtCantidad">
                                        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <!-- <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="txtDireccion" placeholder="Escribir Direccion" name="txtDireccion">
                                        <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                    </div> -->

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
                                        <label class="col-form-label col-md-3 col-sm-3 text-center">Serie</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Escribir Serie" name="txtSerie">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 text-center">Descripcion</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control" placeholder="Escribir Descripcion" name="txtDescripcion">
                                        </div>
                                    </div>

                            
                                    <div class="ln_solid"></div>
                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <a type="button" class="btn btn-danger" href="<?php echo URL; ?>usuarioController/principal">Cancel</a>
                                            <button class="btn btn-warning" type="reset" href="<?php echo URL; ?>usuarioController/registrarCliente" >Restablecer</button>
                                            <button type="submit" class="btn btn-success" name="btnGuardar">Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>

    let password1, password2;

    password1 = document.getElementById('password1');
    password2 = document.getElementById('password2');

    password1.onchange = password2.onkeyup = passwordMatch;

    function passwordMatch(){
        if(password1.value !== password2.value){
            password2.setCustomValidity('Contraseña No Coincide');
        }else{
            password2.setCustomValidity("");
        }
    }


</script> -->