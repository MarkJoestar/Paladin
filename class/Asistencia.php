<?php
require_once 'MySQL.php';
require_once 'Empleado.php';
require_once 'Horario.php';

class Asistencia {
    
	private $_idAsistencia;
	private $_fechaHoraIngreso;
    private $_fechaHoraSalida;
    private $_idEmpleado:
    public $horario;

	public function getIdAsistencia()
    {
        return $this->_idAsistencia; 
    }

    public function getFechaHoraEntrada ()
    {
        return $this->_fechaHoraIngreso; 
    }

    public function setFechaHoraEntrada($_fechaHoraIngreso)
    {
        $this->_fechaHoraIngreso = $_fechaHoraIngreso;

        return $this;
    }
    public function getFechaHoraSalida ()
    {
        return $this->_fechaHoraSalida; 
    }

    public function setFechaHoraSalida($_fechaHoraSalida)
    {
        $this->_fechaHoraSalida = $_fechaHoraSalida;

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
        private function _generarAsistencia($datos) {
        $asistencia = new Asistencia($data['hora_entrada'], $data['hora_salida']);
        $asistencia->_idAsistencia = $data['id_asistencia'];
        return $asistencia;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM asistencia WHERE id_asistencia = " . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $asistencia = new Asistencia($registro['fecha_hora_ingreso'], );
        $asistencia->_fechaHoraSalida $registro['fecha_hora_salida']
        $asistencia->_idHorario = $registro['id_horario'];

        return $asistencia;
    }
    public function guardar() {
        $sql = "INSERT INTO Asistencia (id_asistencia, numero_casa, calle, piso, "
             . "manzana, sector, id_persona) VALUES (NULL, $this->_numeroCasa, '$this->_calle', "
             . "'$this->_piso', '$this->_manzana', '$this->_sector', $this->_idPersona)";

        $mysql = new MySQL();
        $mysql->insertar($sql);
        $mysql->desconectar();
        //echo $sql;
        //exit;
    }
}


?>