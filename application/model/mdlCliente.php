<?php

require_once "mdlPersona.php";


class mdlCliente extends mdlPersona{

    private $idCliente;
    private $tipoCliente;
    private $estado;


    public function __SET($atributo, $valor){
        
        $this->$atributo = $valor;
    }

    public function __GET($atributo){
        return $this->$atributo;
    }

    #Metodo Registrar Clientes
    public function registrarCliente(){
       $sql = "INSERT INTO clientes(idPersona, tipoCliente, Estado) VALUES (?,?,?)";

       $estado = 1;

       $stm = $this->db->prepare($sql);
       $stm -> bindParam(1, $this->idPersona);
       $stm -> bindParam(2, $this->tipoCliente);
       $stm -> bindParam(3, $estado);
       $result = $stm -> execute();
       return $result;
    }

    public function listarCliente(){
        $sql = "SELECT P.idPersona, P.Documento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, U.Estado, U.tipoCliente, U.idCliente FROM personas AS P INNER JOIN clientes AS U ON P.idPersona = U.idPersona";
        $stm = $this->db->prepare($sql);
        $stm -> execute();
        $cliente = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $cliente;
    }

    public function listarTipoCliente(){
        $sql = "SELECT tipoCliente FROM clientes";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ClienteId($id){
        $sql = "SELECT P.idPersona, P.Documento, P.idTipoDocumento, P.Nombres, P.Apellidos, P.Email, P.Telefono, P.Direccion, U.tipoCliente, U.Estado, U.idCliente FROM personas AS P INNER JOIN clientes AS U ON P.idPersona = U.idPersona WHERE idCliente = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function cambiarEstado($id){
        $sql = "UPDATE clientes SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE idCliente = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query->execute();
    }

    public function eliminarCliente($id){
        $sql = "DELETE u, p FROM clientes AS u INNER JOIN personas AS p WHERE p.idPersona = u.idPersona AND u.idCliente = ?";
        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query -> execute();
    }

    public function modificarCliente(){
        $sql = "UPDATE personas AS P INNER JOIN clientes AS U ON P.idPersona = U.idPersona SET P.idTipoDocumento = ?, P.Documento = ?, P.Nombres = ?, P.Apellidos = ?, P.Telefono = ?, P.Direccion = ?, P.Email = ?, U.tipoCliente = ? WHERE U.idCliente = ?";
        $stm = $this->db->prepare($sql);
        $stm -> bindParam(1, $this->idTipoDocumento);
        $stm -> bindParam(2, $this->documento);
        $stm -> bindParam(3, $this->nombres);
        $stm -> bindParam(4, $this->apellidos);
        $stm -> bindParam(5, $this->telefono);
        $stm -> bindParam(6, $this->direccion);
        $stm -> bindParam(7, $this->email);
        $stm -> bindParam(8, $this->tipoCliente);
        $stm -> bindParam(9, $this->idCliente);

        $result = $stm -> execute();
        return $result;
    }




}


?>