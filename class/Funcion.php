<?php
require_once 'MySQL.php';

class Funcion {
    private $_idFuncion;
    private $_descripcion;

    public function __construct($descripcion) {
        $this->_descripcion = $descripcion;
    }

    public function getIdFuncion()
    {
        return $this->_idFuncion; 
    }

    public function setIdFuncion($_idFuncion)
    {
        $this->_idFuncion = $_idFuncion;

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
        $sql = "SELECT id_funcion, descripcion "
             . "FROM Funcion";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoFunciones($datos);

        return $listado;
    }
        private function _generarFuncion($datos) {
        $funcion = new Funcion($data['descripcion']);
        $funcion->_idFuncion = $data['id_funcion'] ;
        return $funcion;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM Funcion WHERE id_funcion =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $funcion = new Funcion($registro['descripcion']);
        $funcion->_idFuncion = $registro['id_funcion'] ;
        return $funcion;
    }

    public static function obtenerFuncionesPorIdEmpleado($idEmpleado) {
        $sql = "SELECT funcion.id_funcion, funcion.descripcion "
             . "FROM funcion "
             . "INNER JOIN empleado_funcion on empleado_funcion.id_funcion = funcion.id_funcion "
             . "INNER JOIN empleado on empleado.id_empleado = empleado_funcion.id_empleado "
             . "WHERE empleado.id_empleado = " . $idEmpleado;

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoFunciones($datos);
        return $listado;
    }


    private function _generarListadoFunciones($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $funcion = new Funcion($registro['descripcion']);
            $funcion->_idFuncion = $registro['id_funcion'];
            $listado[] = $funcion;
        }
        return $listado;
    }

     public function guardar() {

        $sql = "INSERT INTO Funcion (id_funcion, descripcion) "
             . "VALUES (NULL, '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idFuncion = $idInsertado;
        //echo $sql;
        //exit;
    }
    public function actualizar() {

        $sql = "UPDATE Funcion SET descripcion = '$this->_descripcion' WHERE id_funcion = $this->_idFuncion";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;
        //exit;
    }

    public function eliminar(){

        $sql = "DELETE FROM Funcion WHERE id_funcion = $this->_idFuncion";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __ToString(){
        return $this->_descripcion;
    }
}