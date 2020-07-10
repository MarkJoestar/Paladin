<?php
require_once 'MySQL.php';

class ubicacion {
	private $_idUbicacion;
	private $_descripcion;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
    }

	public function getIdUbicacion()
    {
        return $this->_idUbicacion; 
    }

   /* public function setIdUbicacion($_idUbicacion)
    {
        $this->_idUbicacion = $_idUbicacion;

        return $this;
    }*/

    public function getDescripcion ()
    {
        return $this->_descripcion; 
    }

    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    public static function obtenerTodos() {
        $sql = "SELECT id_ubicacion, descripcion "
             . "FROM Ubicacion";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoUbicaciones($datos);

        return $listado;
    }
        private function _generarUbicacion($datos) {
        $ubicacion = new Ubicacion($data['descripcion']);
        $ubicacion->_idUbicacion = $data['id_ubicacion'] ;
        return $ubicacion;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM ubicacion WHERE id_ubicacion =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $ubicacion = new Ubicacion($registro['descripcion']);
        $ubicacion->_idUbicacion = $registro['id_ubicacion'] ;
        return $ubicacion;
    }


    private function _generarListadoUbicaciones($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $ubicacion = new Ubicacion($registro['descripcion']);
            $ubicacion->_idUbicacion = $registro['id_ubicacion'];
            $listado[] = $ubicacion;
        }
        return $listado;
    }

     public function guardar() {

        $sql = "INSERT INTO Ubicacion (id_ubicacion, descripcion) "
             . "VALUES (NULL, '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idUbicacion = $idInsertado;
    }
    public function actualizar() {

        $sql = "UPDATE Ubicacion SET descripcion = '$this->_descripcion' WHERE id_ubicacion = $this->_idUbicacion";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;
        //exit;
    }

    public function eliminar(){

        $sql = "DELETE FROM Ubicacion WHERE id_ubicacion = $this->_idUbicacion";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __ToString(){
        return $this->_descripcion;
    }
}
