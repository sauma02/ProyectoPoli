<?php 

    //crear la clase
    class mdlProducto{
        //los atributos
        public $idProducto;
        public $Nom_producto;
        public $Precio;
        public $Cantidad;
        public $Garantia;
        public $Fecha_garantia;
        public $Descripcion;
        public $idMarca;
        public $idCategoria;
        public $Serie;
        public $Estado;
        public $db;

        //crear el constructor para la conexión
        function __construct($db){
            $this->db = $db;
        }

        public function __SET($atributo, $valor){
            $this -> $atributo = $valor;
        }

        public function __GET($atributo){
            return $this->$atributo;
        }

        //método para registrar o crear el producto
        public function crearProducto(){
            $sql = "INSERT INTO productos(Nom_Producto, Precio, Estado, Cantidad, Garantia, Fecha_Garantia, Descripcion, idMarca, idCategoria, Serie) VALUES(?,?,?,?,?,?,?,?,?,?)";

            //variable para mandar los datos
            $stm = $this->db->prepare($sql);
            $stm->bindParam(1, $this->Nom_producto);
            $stm->bindParam(2, $this->Precio);
            $stm->bindParam(3, $this->Estado);
            $stm->bindParam(4, $this->Cantidad);
            $stm->bindParam(5, $this->Garantia);
            $stm->bindParam(6, $this->Fecha_garantia);
            $stm->bindParam(7, $this->Descripcion);
            $stm->bindParam(8, $this->idMarca);
            $stm->bindParam(9, $this->idCategoria);
            $stm->bindParam(10, $this->Serie);

            return $stm->execute();
        }

        //listar producto
        public function listarProductos(){
            $sql = "SELECT P.*, C.Nombre, M.Nombres FROM productos AS P
            INNER JOIN categorias AS C ON C.idCategoria = P.idCategoria
            INNER JOIN marcas AS M ON M.idMarca = P.idMarca ORDER BY idProducto";

            $stm = $this -> db ->prepare($sql);
            $stm -> execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }

        //Método de editar producto
        public function modificarProducto(){
            $sql = "UPDATE productos SET Nom_Producto = ?, Precio= ?, Estado= ?, Cantidad= ?, Garantia= ?, Fecha_Garantia= ?, Descripcion= ?, idMarca= ?, idCategoria= ?, Serie= ? WHERE idProducto=?";

            //variable para mandar los datos
            $stm = $this->db->prepare($sql);
            $stm->bindParam(1, $this->Nom_producto);
            $stm->bindParam(2, $this->Precio);
            $stm->bindParam(3, $this->Estado);
            $stm->bindParam(4, $this->Cantidad);
            $stm->bindParam(5, $this->Garantia);
            $stm->bindParam(6, $this->Fecha_garantia);
            $stm->bindParam(7, $this->Descripcion);
            $stm->bindParam(8, $this->idMarca);
            $stm->bindParam(9, $this->idCategoria);
            $stm->bindParam(10, $this->Serie);

            return $stm->execute();
        }

        //cambiar estado de producto
        public function cambiarEstado(){
            $sql = "UPDATE productos SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE idProducto = ?";
            $stm = $this ->db->prepare($sql);
            $stm->bindParam(1, $this->idProducto);
            return $stm->execute();
        }

        //metodo para obtener los datos del producto
        public function getProducto(){
            $sql = "SELECT * FROM productos WHERE idProducto = ? LIMIT 1";
            $stm = $this->db->prepare($sql);
            $stm->bindParam(1, $this->idProducto);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>