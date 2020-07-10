<?php 

require_once 'Persona.php';
require_once 'MySQL.php';


class Empleado extends Persona {

	private $_idEmpleado;
    private $_sueldo;
	
	public function getIdEmpleado()
	{
		return $this->_idEmpleado; 
	}

    public function getSueldo($_sueldo)
    {
        return $this->_sueldo; 
    }

    public function setSueldo($_sueldo)
    {
        $this->_sueldo = $_sueldo;

        return $this;
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

        $sql = "SELECT * FROM empleado AS e JOIN persona AS p ON e.id_persona = p.id_persona WHERE id_empleado =" . $id;


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

        return $empleado;
    }
        private function _generarEmpleado($datos) {
        $empleado = new Empleado($data['nombre'], $data['apellido']);
        $empleado->_idEmpleado = $data['id_empleado'];
        $empleado->_numeroLegajo = $data['numero_legajo'];
        $empleado->_idPersona = $data['id_persona'];
        $empleado->_fechaNacimiento = $data['fecha_nacimiento'];
        $empleado->_tipoDocumento = $data['id_tipo_documento'];
        $empleado->_numeroDocumento = $data['numero_documento'];
        $empleado->_estado = $data['id_estado'];
        $empleado->_sueldo = $data['sueldo'];
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

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO Empleado (id_empleado, id_persona, sueldo) "
             . "VALUES (NULL, $this->_idPersona, '$this->_sueldo')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEmpleado = $idInsertado;
    }
    public function actualizar() {
    parent::actualizar();

    $sql = "UPDATE Empleado SET sueldo = '$this->_sueldo' WHERE id_empleado = $this->_idEmpleado";
    $mysql = new MySQL();
    $mysql->actualizar($sql);
    }

    public function eliminar(){
        parent::eliminar();

        $sql = "DELETE * FROM Empleado WHERE id_empleado = $this->_idEmpleado";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
}
?>