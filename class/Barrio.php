<?php
require_once 'MySQL.php';

class Barrio {
    private $_idBarrio;
    private $_descripcion;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
    }

    public function getIdBarrio()
    {
        return $this->_idBarrio; 
    }

    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

        return $this;
    }

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
        $sql = "SELECT id_barrio, descripcion "
             . "FROM Barrio";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoBarrios($datos);

        return $listado;
    }
        private function _generarBarrio($datos) {
        $barrio = new Barrio($data['descripcion']);
        $barrio->_idBarrio = $data['id_barrio'] ;
        return $barrio;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM Barrio WHERE id_barrio =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $barrio = new Barrio($registro['descripcion']);
        $barrio->_idBarrio = $registro['id_barrio'] ;
        return $barrio;
    }


    private function _generarListadoBarrios($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $barrio = new barrio($registro['descripcion']);
            $barrio->_idBarrio = $registro['id_barrio'];
            $listado[] = $barrio;
        }
        return $listado;
    }

     public function guardar() {

        $sql = "INSERT INTO Barrio (id_barrio, descripcion) "
             . "VALUES (NULL, '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idBarrio = $idInsertado;
        //echo $sql;
        //exit;
    }
    public function actualizar() {

        $sql = "UPDATE Barrio SET descripcion = '$this->_descripcion' WHERE id_barrio = $this->_idBarrio";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;
        //exit;
    }

    public function eliminar(){

        $sql = "DELETE FROM Barrio WHERE id_barrio = $this->_idBarrio";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __ToString(){
        return $this->_descripcion;
    }
}