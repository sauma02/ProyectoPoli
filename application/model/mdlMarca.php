<?php
//crear la clase
class mdlMarca{
//atributos
public $idMarca;
public $Nombres;
public $Descripcion;
public $db;

//el constructor se encarga de la conexión
function __construct($db){
    $this->db = $db;
}

//creamos los métodos de fijar y obtener datos
public function __SET($atributo, $valor){
    $this ->$atributo = $valor;
}

public function __GET($atributo){
    return $this->$atributo;
}

//método para crear
public function crearMarca(){
    //definir la variable que guarda la consulta
    $sql="INSERT INTO marcas(Nombres, Descripcion) VALUES (?,?)";
    //crear la variable para enviar los datos
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Nombres);
    $stm->bindParam(2, $this->Descripcion);
    return $stm->execute();
}

//método para listar categorias
public function listarMarca(){
    //definir la variable de la consulta
    $sql = "SELECT * FROM marcas ORDER BY idMarca ASC";

    //crear la variable que pide los datos
    $stm = $this->db->prepare($sql);
    $stm->execute();
    
    //dar la respuesta
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

//método de modificar
public function modificarMarca(){
    //definir la variable que guarda la consulta
    $sql="UPDATE marcas SET Nombres = ?, Descripcion = ? WHERE idMarca =?";
    //crear la variable para enviar los datos
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Nombres);
    $stm->bindParam(2, $this->Descripcion);
    $stm->bindParam(3, $this->idMarca);
    return $stm->execute();
}

}

?>