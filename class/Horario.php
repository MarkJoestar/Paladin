<?php
require_once 'MySQL.php';
require_once 'Empleado.php';

class Horario {
    
	private $_idHorario;
	private $_horaIngreso;
    private $_horaSalida;

	public function getIdHorario()
    {
        return $this->_idHorario; 
    }

    public function getHoraIngreso()
    {
        return $this->_horaIngreso; 
    }

    public function setHoraIngreso($_horaIngreso)
    {
        $this->_horaIngreso = $_horaIngreso;

        return $this;
    }
    public function getHoraSalida ()
    {
        return $this->_horaSalida; 
    }

    public function setHoraSalida($_horaSalida)
    {
        $this->_horaSalida = $_horaSalida;

        return $this;
    }

    public static function obtenerTodos() {
        $sql = "SELECT id_horario, hora_ingreso, hora_salida "
             . "FROM horario";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoHorarios($datos);

        return $listado;
    }
        private function _generarHorario($datos) {
        $horario = new Horario($data['hora_ingreso'], $data['hora_salida']);
        $horario->_idHorario = $data['id_horario'];
        return $horario;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM horario WHERE id_horario = " . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $horario = new Horario($registro['hora_ingreso'], $registro['hora_salida']);
        $horario->_idHorario = $registro['id_horario'];

        return $horario;
    }


    private function _generarListadoHorarios($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $horario = new Horario ($registro['hora_ingreso'], $registro['hora_salida']);
            $horario->_idHorario = $registro['id_horario'];
            $listado[] = $horario;
        }
        return $listado;
    }
     public function guardar() {
        $sql = "INSERT INTO Horario (id_horario, hora_ingreso, hora_ingreso) "
             . "VALUES (NULL, '$this->_horaEntrada', '$this->_horaSalida')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idFuncion = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE Horario SET hora_ingreso, hora_salida = '$this->_horaEntrada', '$this->_horaSalida' WHERE id_horario = $this->_idHorario";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    public function eliminar() {

        $sql = "DELETE  FROM Horario WHERE id_horario = $this->_idHorario";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
    public function __toString() {
        return $this->_horaIngreso . " - " . $this->_horaSalida;
    }
}


?>