<?php
require_once 'MySQL.php';

class Camara {
	private $_idCamara;
	private $_modelos;

    public function __construct($modelos) {
        $this->_modelos = $modelos;
    }


	public function getIdCamara()
    {
        return $this->_idCamara; 
    }

    public function setIdCamara($_idCamara)
    {
        $this->_idCamara = $_idCamara;

        return $this;
    }


    public function getModelos()
    {
        return $this->_modelos;
    }

    public function setModelos($_modelos)
    {
        $this->_modelos = $_modelos;

        return $this;
    }

    public static function obtenerTodos() {
        $sql = "SELECT id_camara, modelos"
             . " FROM Camara";
        //echo $sql;
        //exit;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoCamaras($datos);

        return $listado;
    }
        private function _generarCamara($datos) {
        $camara = new Camara($data['modelos']);
        $camara->_idCamara = $data['id_camara'];
        return $camara;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM Camara WHERE id_camara =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $camara = new Camara($registro['modelos']);
        $camara->_idCamara = $registro['id_camara'];

        return $camara;
    }


    private function _generarListadoCamaras($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $camara = new Camara ($registro['modelos']);
            $camara->_idCamara = $registro['id_camara'];
             $listado[] = $camara;
        }
        return $listado;
    }

    public function guardar() {

        $sql = "INSERT INTO Camara (id_camara, modelos) "
             . "VALUES (NULL, '$this->_modelos')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idCamara = $idInsertado;
    }
    public function actualizar() {

        $sql = "UPDATE Camara SET modelos = '$this->_modelos' WHERE id_camara = $this->_idCamara";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar(){

        $sql = "DELETE FROM Camara WHERE id_camara = $this->_idCamara";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __toString() {
        return $this->_modelos;
    }
}

