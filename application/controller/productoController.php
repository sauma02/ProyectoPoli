<?php
    class productoController extends Controller{
        private $modeloProducto;
        private $modeloCategoria;
        private $modeloMarca;

        function __construct(){
            $this->modeloProducto = $this->loadModel("mdlProducto");
            $this->modeloCategoria = $this->loadModel("mdlCategoria");
            $this->modeloMarca = $this->loadModel("mdlMarca");
        }

        public function crearProducto(){
            if(isset($_POST['btnGuardar'])){
                // var_dump($_POST['btnGuardar']);
                // exit();
                $estado = 1;
                $this->modeloProducto->__SET('Nom_producto', $_POST['txtNombreProducto']); #igual aqui 
                $this->modeloProducto->__SET('Precio', $_POST['txtPrecio']);
                $this->modeloProducto->__SET('Estado', $estado);
                $this->modeloProducto->__SET('Cantidad', $_POST['txtCantidad']);
                $this->modeloProducto->__SET('Garantia', $_POST['txtGarantia']);
                $this->modeloProducto->__SET('Fecha_garantia', $_POST['txtFechaG']);
                $this->modeloProducto->__SET('Descripcion', $_POST['txtDescripcion']);
                $this->modeloProducto->__SET('idMarca', $_POST['selMarca']);
                $this->modeloProducto->__SET('idCategoria', $_POST['selCategoria']);
                $this->modeloProducto->__SET('Serie', $_POST['txtSerie']);    
                $respuesta = $this->modeloProducto->crearProducto();

                if($respuesta == true){
                    $_SESSION["alerta"] = "Swal.fire({
                        position: '',
                        icon: 'success',
                        title: 'Registro Exitoso',
                        showConfirmButton: false,
                        timer: 1500})";
                        header("Location: ".URL."productoController/listarProducto");
                        exit();
    
                   }else{
                    $_SESSION["alerta"] = "Swal.fire({
                        postion: '',
                        icon: 'error',
                        title: 'Ocurrio un Error',
                        showConfigurationButton: false,
                        timer: 1500})";
    
                        header("Location: ".URL."productoController/crearProducto");
                        exit();
                   }
            }
            $listarCategoria = $this->modeloCategoria->listarCategoria();
            $listarMarca = $this->modeloMarca->listarMarca();
            $listarProductos = $this->modeloProducto->listarProductos();

         require APP. 'view/_templates/header.php';
         require APP. 'view/producto/crearProducto.php';
         require APP. 'view/_templates/footer.php';
        }
        //Listar productos
        public function listarProducto(){
            if(isset($_POST['btnEditar'])){
                $this->modeloProducto->__SET('Nom_producto', $_POST['txtNombreProducto']); #igual aqui 
                $this->modeloProducto->__SET('Precio', $_POST['txtPrecio']);
                $this->modeloProducto->__SET('Estado', $_POST['txtEstado']);
                $this->modeloProducto->__SET('Cantidad', $_POST['txtCantidad']);
                $this->modeloProducto->__SET('Garantia', $_POST['txtGarantia']);
                $this->modeloProducto->__SET('Fecha_garantia', $_POST['txtFechaG']);
                $this->modeloProducto->__SET('Descripcion', $_POST['txtDescripcion']);
                $this->modeloProducto->__SET('idMarca', $_POST['selMarca']);
                $this->modeloProducto->__SET('idCategoria', $_POST['selCategoria']);
                $this->modeloProducto->__SET('Serie', $_POST['txtSerie']);    
    
                $update = $this->modeloProducto->modificarProducto();
    
                if($update == true){
                    $_SESSION["alerta"] = "Swal.fire({
                        position: '',
                        icon: 'success',
                        title: 'Actualizacion Exitoso',
                        showConfirmButton: false,
                        timer: 1500})";
    
                        header("Location: ".URL."productoController/listarProductos");
                        exit();
                }else{
                    $_SESSION["alerta"] = "Swal.fire({
                        position: '',
                        icon: 'error',
                        title: 'Ocurrio un Error',
                        showConfirmButton: false,
                        timer: 1500})";
    
                        header("Location: ".URL."productoController/listarProductos");
                        exit();
                }
            }
            $listarCategoria= $this->modeloCategoria->listarCategoria();
            $listarMarca = $this->modeloMarca->listarMarca();
            $listarProductos = $this->modeloProducto->listarProductos();
    
            require(APP . 'view/_templates/header.php');
            require(APP . 'view/producto/listarProductos.php');
            require(APP . 'view/_templates/footer.php');
        }
        public function cambiarEstado(){
            $this->modeloProducto->__SET("idProducto", $_POST["id"]);
            $respuesta = $this->modeloProducto->cambiarEstado();
            if($respuesta == true){
                echo json_encode("1");

            }else{
                echo json_encode("0");
            }
        }
    }
?>