<?php
//Heredar del modelo Principal si es necesario
require_once "mdlPersona.php";

//heredamos la clase
class mdlUsuario extends mdlPersona{
    private $idUsuario;
    private $usuario;
    private $clave;
    private $idRol;
    private $estado;

    //fijar datos
    public function __SET($atributo, $valor){
        $this->$atributo = $valor;
    }

    //pedir datos
    public function __GET($atributo){
        return $this->$atributo;
    }

    //método para validar si el usuario existe
    public function validarUsuario(){
        $sql = "SELECT P.Documento, P.Nombres, P.Apellidos, U.Usuario, U.idUsuario, R.Descripcion FROM personas AS P INNER JOIN tipodocumentos AS TD
        ON P.idTipoDocumento = TD.idTipoDocumento
        INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON U.idRol = R.idRol WHERE U.Usuario = ? AND U.Clave = ? AND U.Estado = 1";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->usuario);
        $stm->bindParam(2, $this->clave);
        $stm->execute();
        $user = $stm->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    //metodo para registrar usuarios
    public function registrarUsuario(){
        $sql = "INSERT INTO usuarios(idPersona, Usuario, Clave, idRol, Estado) VALUES (?, ?, ?, ?, ?)";
        
        #Nos permite cambiar de estado
        $estado = 1;

        #Vamos a enviar los parametros
        $stm = $this->db->prepare($sql);
        $stm ->bindParam(1, $this->idPersona);
        $stm ->bindParam(2, $this->usuario);
        $stm ->bindParam(3, $this->clave);
        $stm ->bindParam(4, $this->idRol);
        $stm ->bindParam(5, $estado);
        $result = $stm -> execute();
        return $result;
    }


    #metodo para listar usuarios
    public function listarUsuarios(){
        $sql = "SELECT P.idPersona, P.Documento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, P.Fecha_Nacimiento, U.Usuario, U.Estado, R.Descripcion, U.idUsuario FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol = U.idRol";
        $stm = $this->db->prepare($sql);
        $stm -> execute();
        $user = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    #metodo filtrar usuarios
    public function usuarioId($id){
        $sql = "SELECT P.idPersona, P.Documento, P.idTipoDocumento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, U.Usuario, U.Estado, R.Descripcion, U.idUsuario, U.idRol FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol = U.idRol WHERE idUsuario = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    #metodo listar roles 
    public function listarRoles(){
        $sql = "SELECT idRol, Descripcion AS tipo FROM roles";
        $query = $this->db->prepare($sql);
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    #metodo cambiar estado 
    public function cambiarEstado($id){
        $sql = "UPDATE usuarios SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE idUsuario = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query->execute();
    }

    #metodo eliminar usuarios
    public function eliminarUsuario($id){
        $sql = "DELETE u, p FROM usuarios AS u INNER JOIN personas AS p WHERE p.idPersona = u.idPersona AND u.idUsuario = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query -> execute();
    }

    # metodo modificar los usuarios
    public function modificarUsuario(){
        $sql = "UPDATE personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona SET P.idTipoDocumento = ?, P.Documento = ?, P.Nombres = ?, P.Apellidos = ?, P.Telefono = ?, P.Direccion = ?, P.Email = ?, U.Usuario = ? WHERE U.idUsuario = ?";
        $stm = $this->db->prepare($sql);
        $stm -> bindParam(1, $this->idTipoDocumento);
        $stm -> bindParam(2, $this->documento);
        $stm -> bindParam(3, $this->nombres);
        $stm -> bindParam(4, $this->apellidos);
        $stm -> bindParam(5, $this->telefono);
        $stm -> bindParam(6, $this->direccion);
        $stm -> bindParam(7, $this->email);
        $stm -> bindParam(8, $this->usuario);
        /* $stm -> bindParam(9, $this->idRol); */
        $stm -> bindParam(9, $this->idUsuario);

        $result = $stm -> execute();
        return $result;
    }
}

?>