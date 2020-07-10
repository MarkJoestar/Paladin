<?php
require_once 'MySQL.php';

class Sensor {
	private $_idSensor;
	private $_modelo;


	public function __construct($modelo) {
        $this->_modelo = $modelo;
    }


    public function getIdSensor()
    {
        return $this->_idSensor;
    }

    public function setIdSensor($_idSensor)
    {
        $this->_idSensor = $_idSensor;

        return $this;
    }

    public function getModelo()
    {
        return $this->_modelo; 
    }

    public function setModelo($_modelo)
    {
        $this->_modelo = $_modelo;

        return $this;
    }

    public static function obtenerTodos() {
        $sql = "SELECT id_sensor, modelo "
             . "FROM sensor";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoSensores($datos);

        return $listado;
    }
        private function _generarSensor($datos) {
        $sensor = new Sensor($data['modelo']);
        $sensor->_idSensor = $data['id_sensor'];
        return $sensor;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM Sensor WHERE id_sensor =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $sensor = new Sensor($registro['modelo']);
        $sensor->_idSensor = $registro['id_sensor'];
        return $sensor;
    }


    private function _generarListadoSensores($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $sensor = new sensor ($registro['modelo']);
            $sensor->_idSensor = $registro['id_sensor'];
            $listado[] = $sensor;
        }
        return $listado;
    }

     public function guardar() {

        $sql = "INSERT INTO Sensor (id_sensor, modelo) "
             . "VALUES (NULL, '$this->_modelo')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idSensor = $idInsertado;
    }
    public function actualizar() {

        $sql = "UPDATE Sensor SET modelo = '$this->_modelo' WHERE id_sensor = $this->_idSensor";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar(){

        $sql = "DELETE FROM Sensor WHERE id_sensor = $this->_idSensor";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __toString() {
        return $this->_modelo;
    }
}
