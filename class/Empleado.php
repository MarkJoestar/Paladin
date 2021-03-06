<?php 

require_once 'Persona.php';
require_once 'MySQL.php';
require_once 'Funcion.php';
require_once 'Horario.php';



class Empleado extends Persona {

	private $_idEmpleado;
    private $_sueldo;
    private $_confirmado;
    private $_arrFunciones;
    private $_idAsistencia;
    private $_idHorario;
    public $horario;
	
	public function getIdEmpleado()
	{
		return $this->_idEmpleado; 
	}

    public function getIdAsistencia()
    {
        return $this->_idAsistencia; 
    }
    public function setIdAsistencia()
    {
        $this->_idAsistencia = $_idAsistencia;
    }

    public function getSueldo()
    {
        return $this->_sueldo; 
    }

    public function setSueldo($_sueldo)
    {
        $this->_sueldo = $_sueldo;

        return $this;
    }
    public function getFunciones(){
        return $this->_arrFunciones;
    }

    public function setIdHorario($_idHorario)
    {
        $this->_idHorario = $_idHorario;

        return $this;
    }

    public function getHorario()
    {
        return $this->horario;
    }


	public static function obtenerTodos() {
        $sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, empleado.id_empleado, empleado.sueldo "
             . "FROM persona "
             . "INNER JOIN empleado ON empleado.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoEmpleado($datos);

        return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM empleado AS e JOIN persona AS p ON e.id_persona = p.id_persona WHERE id_empleado = " . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $empleado = new Empleado($registro['nombre'], $registro['apellido']);
        $empleado->_idEmpleado = $registro['id_empleado'];
        $empleado->_idPersona = $registro['id_persona'];
        $empleado->_idTipoDocumento = $registro['id_tipo_documento'];
        $empleado->_numeroDocumento = $registro['numero_documento'];
        $empleado->_fechaNacimiento = $registro['fecha_nacimiento'];
        $empleado->_sueldo = $registro['sueldo'];
        $empleado->_arrFunciones = Funcion::obtenerFuncionesPorIdEmpleado($empleado->_idEmpleado);
        $empleado->setDomicilio();


        return $empleado;
    }
        

        private function _generarEmpleado($datos) {
        $empleado = new Empleado($data['nombre'], $data['apellido']);
        $empleado->_idEmpleado = $data['id_empleado'];
        $empleado->_idPersona = $data['id_persona'];
        $empleado->_fechaNacimiento = $data['fecha_nacimiento'];
        $empleado->_tipoDocumento = $data['id_tipo_documento'];
        $empleado->_numeroDocumento = $data['numero_documento'];
        $empleado->_estado = $data['id_estado'];
        $empleado->_sueldo = $data['sueldo'];
        $empleado->setFunciones();
        $empleado->setDomicilio();
        return $empleado;
    }


	private function _generarListadoEmpleado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $empleado = new Empleado($registro['nombre'], $registro['apellido']);
            $empleado->_idEmpleado = $registro['id_empleado'];
            $empleado->_idPersona = $registro['id_persona'];
            $empleado->_sueldo = $registro['sueldo'];
            $listado[] = $empleado;
        }
        return $listado;
    }
    public static function marcar($numeroDocumento) {
        $sql = "SELECT * FROM empleado "
             . "INNER JOIN persona on persona.id_persona = empleado.id_persona "
             . "WHERE numero_documento = " . $numeroDocumento;
             //. "AND persona.id_estado = 1";
        //echo $sql;
        //exit;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0) {
            $registro = $datos->fetch_assoc();
            $empleado = new Empleado($registro['nombre'], $registro['apellido']);
            $empleado->_idEmpleado = $registro['id_empleado'];
            $empleado->_idPersona = $registro['id_persona'];
            $empleado->_fechaNacimiento = $data['fecha_nacimiento'];
            $empleado->_tipoDocumento = $data['id_tipo_documento'];
            $empleado->_numeroDocumento = $data['numero_documento'];
            $empleado->_sueldo = $data['sueldo'];
            $empleado->_confirmado = true;

            //$usuario->perfil = Perfil::obtenerPorId($usuario->_idPerfil);
            //$usuario->setDomicilio();
        } else {
            $empleado = new Empleado('');
            $empleado->_confirmado = false;
        }

        return $empleado;
    }
    public function confirmar() {
        return $this->_confirmado;
    }

    public function marcarEntrada(){
        $sql = "INSERT INTO Asistencia (id_asistencia, fecha_hora_ingreso,  fecha_hora_salida, id_horario, id_empleado) "
             . "VALUES (NULL, 'now()', null, $this->_idHorario, $this->_idEmpleado) ";
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idAsistencia = $idInsertado;
        echo $sql;
        exit;
    }


    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO Empleado (id_empleado, id_persona, sueldo) "
             . "VALUES (NULL, $this->_idPersona, '$this->_sueldo')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEmpleado = $idInsertado;
    }
    public function tieneFuncion($idFuncion) {
        $sql = "SELECT * FROM empleado_funcion "
             . "WHERE id_funcion = $idFuncion "
             . "AND id_empleado = $this->_idEmpleado";

        $mysql = new MySQL();
        $result = $mysql->consultar($sql);
        $mysql->desconectar();

        return $result->num_rows > 0;
    }

    public function actualizar() {
        $sql = "UPDATE empleado SET sueldo = '$this->_sueldo' WHERE id_empleado = $this->_idEmpleado";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;
        //exit;
    }

    public function eliminarFunciones() {
        $sql = "DELETE FROM empleado_funcion WHERE id_empleado = $this->id_empleado";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    
    public function eliminar(){
        parent::eliminar();
        $sql = "DELETE FROM empleado WHERE id_empleado = $this->_idEmpleado";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
        echo $sql;
        exit;
    }

    public function __ToString(){
        return $this->_nombre . ", " . $this->_apellido;
    }

    public function setFunciones() {
        $this->_arrFunciones = Funcion::obtenerPorIdEmpleado($this->_idEmpleado);
    }
    public function setHorario() {
        $this->_horario = Horario::obtenerPorId($this->_idHorario);
    }
}
?>