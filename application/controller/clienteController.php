<?php 

class clienteController extends Controller{

    private $modeloU;

    public function __construct(){
        $this->modeloU = $this->loadModel("mdlCliente");

    }

    public function principal(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/usuario/principal.php';
        require APP . 'view/_templates/footer.php';
    }

    public function registrarCliente(){
        if(isset($_POST['btnGuardar'])){
            $this->modeloU->__SET('idTipoDocumento', $_POST['selTipoDocumento']); #igual aqui 
            $this->modeloU->__SET('documento', $_POST['txtDocumento']);
            $this->modeloU->__SET('nombres', $_POST['txtNombres']);
            $this->modeloU->__SET('apellidos', $_POST['txtApellidos']);
            $this->modeloU->__SET('fechaNacimiento', $_POST['txtFechaNacimiento']);
            $this->modeloU->__SET('telefono', $_POST['txtTelefono']);
            $this->modeloU->__SET('direccion', $_POST['txtDireccion']);
            $this->modeloU->__SET('email', $_POST['txtEmail']);

            $persona = $this->modeloU->registrarPersona();

            if($persona == true){
                $ultimoId = $this->modeloU->ultimoIdPersona();
                foreach($ultimoId as $value){
                    $ultimoIdValue = $value['ultimoIdPersona'];
                }
            }

            $this->modeloU->__SET('idPersona', $ultimoIdValue);
            $this->modeloU->__SET('descripcion', $_POST['txtDescripcion']);
            
            $cliente = $this->modeloU->registrarCliente();

            if($persona == true && $cliente == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Registro Exitoso',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/registrarCliente");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrio un Error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/registrarCliente");
                    exit();
            }
        }
        $tipoDocumentos = $this->modeloU->listarTipoDocumento();

        require APP. 'view/_templates/header.php';
        require APP. 'view/cliente/crearCliente.php';
        require APP. 'view/_templates/footer.php';
    }

    public function listarClientes(){
        if(isset($_POST['btnEditar'])){
            $this -> modeloU -> __SET('idTipoDocumento', $_POST['selTipoDocumento']); #si hay un error puede estra aqui, selTiposDocumentos
            $this -> modeloU -> __SET('documento', $_POST['txtDocumento']);
            $this -> modeloU -> __SET('nombres', $_POST['txtNombres']);
            $this -> modeloU -> __SET('apellidos', $_POST['txtApellidos']);
            $this -> modeloU -> __SET('telefono', $_POST['txtTelefono']);
            $this -> modeloU -> __SET('direccion', $_POST['txtDireccion']);
            $this -> modeloU -> __SET('email', $_POST['txtEmail']);
            $this -> modeloU -> __SET('descripcion', $_POST['txtDescripcion']);
            $this -> modeloU -> __SET('idCliente', $_POST['txtIdCliente']);

            $update = $this->modeloU->modificarCliente();

            if($update == true){
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'success',
                    title: 'Actualizacion Exitoso',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/listarClientes");
                    exit();
            }else{
                $_SESSION["alerta"] = "Swal.fire({
                    position: '',
                    icon: 'error',
                    title: 'Ocurrio un Error',
                    showConfirmButton: false,
                    timer: 1500})";

                    header("Location: ".URL."clienteController/listarClientes");
                    exit();
            }
        }
        $cliente = $this->modeloU->listarCliente();
        $tipoCliente = $this->modeloU->listarTipoCliente();
        $tiposDocumentos = $this->modeloU->listarTipoDocumento();

        require(APP . 'view/_templates/header.php');
        require(APP . 'view/cliente/listarCliente.php');
        require(APP . 'view/_templates/footer.php');
    } 

    public function datoCliente(){
        $cliente = $this->modeloU->ClienteId($_POST['id']);
        echo json_encode($cliente);
    }

    public function cambiarEstado(){
        $estado = $this->modeloU->cambiarEstado($_POST['id']);
        echo 1;
    }

    public function eliminarCliente(){
        $estado = $this->modeloU->eliminarCliente($_POST['id']);
        echo 1;
    }
}







?>