<?php
require_once 'MySQL.php';
require_once 'Empleado.php'

class Horario {
    
	private $_idHorario;
	private $_horaEntrada;
    private $_horaSalida;

	public function getIdHorario()
    {
        return $this->_idHorario; 
    }

    public function getHoraEntrada ()
    {
        return $this->_horaEntrada; 
    }

    public function setHoraEntrada($_horaEntrada)
    {
        $this->_horaEntrada = $_horaEntrada;

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

        $listado = self::_generarListadoUsuarios($datos);

        return $listado;
    }
        private function _generarHorario($datos) {
        $horario = new Horario($data['hora_entrada'], $data['hora_salida']);
        return $horario;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM horario WHERE id_horario =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $horario = new Horario($registro['hora_entrada'], $registro['hora_salida']);

        return $horario;
    }


    private function _generarListadoUsuarios($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $usuario = new Horario ($registro['hora_entrada'], $registro['hora_entrada']);
            $listado[] = $usuario;
        }
        return $listado;
    }
     public function guardar() {
        $sql = "INSERT INTO Horario (id_horario, horaEntrada, horaSalida) "
             . "VALUES (NULL, '$this->_horaEntrada', '$this->_horaSalida')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idFuncion = $idInsertado;
    }
    public function actualizar() {

        $sql = "UPDATE Horario SET horaEntrada, horaSalida = '$this->_horaEntrada', '$this->_horaSalida' WHERE id_horario= $this->_idHorario";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    public function eliminar() {

        $sql = "DELETE  FROM Horario WHERE id_horario = $this->_idHorario";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
}


?>