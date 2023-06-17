<?php
//crear la clase
class mdlCategoria{
//atributos
public $idCategoria;
public $Nombre;
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
public function crearCategoria(){
    //definir la variable que guarda la consulta
    $sql="INSERT INTO categorias(Nombre, Descripcion) VALUES (?,?)";
    //crear la variable para enviar los datos
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Nombre);
    $stm->bindParam(2, $this->Descripcion);
    return $stm->execute();
}

//método para listar categorias
public function listarCategoria(){
    //definir la variable de la consulta
    $sql = "SELECT * FROM categorias ORDER BY idCategoria ASC";

    //crear la variable que pide los datos
    $stm = $this->db->prepare($sql);
    $stm->execute();
    
    //dar la respuesta
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

//método de modificar
public function modificarCategoria(){
    //definir la variable que guarda la consulta
    $sql="UPDATE categorias SET Nombre = ?, Descripcion =? WHERE idCategoria =?";
    //crear la variable para enviar los datos
    $stm = $this->db->prepare($sql);
    $stm->bindParam(1, $this->Nombre);
    $stm->bindParam(2, $this->Descripcion);
    $stm->bindParam(3, $this->idCategoria);
    return $stm->execute();
}

}

?>