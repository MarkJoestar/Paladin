<?php
require_once 'MySQL.php';
require_once 'Empleado.php';

class EmpleadoDia{
	private $_idEmpleadoDia;
	private $_lunes;
    private $_martes;
    private $_miercoles;
    private $_jueves;
    private $_viernes;
    private $_sabado;
    private $_domingo;

	public function getIdEmpleadoDia()
    {
        return $this->_idEmpleadoDia;
    }

    public function getLunes()
    {
        return $this->_lunes;
    }

    public function setLunes($_lunes)
    {
        $this->_lunes = $_lunes;

        return $this;
    }

    public function getMartes()
    {
        return $this->_martes;
    }

    public function setMartes($_martes)
    {
        $this->_martes = $_martes;

        return $this;
    }
    public function getMiercoles()
    {
        return $this->_miercoles;
    }

    public function setMiercoles($_miercoles)
    {
        $this->_miercoles = $_miercoles;

        return $this;
    }
    public function getJueves()
    {
        return $this->_jueves;
    }

    public function setJueves($_jueves)
    {
        $this->_jueves = $_jueves;

        return $this;
    }
    public function getViernes()
    {
        return $this->_viernes;
    }

    public function setViernes($_viernes)
    {
        $this->_viernes = $_viernes;

        return $this;
    }
    public function getSabado()
    {
        return $this->_sabado;
    }

    public function setSabado($_sabado)
    {
        $this->_sabado = $_sabado;

        return $this;
    }
    public function getDomingo()
    {
        return $this->_domingo;
    }

    public function setDomingo($_domingo)
    {
        $this->_domingo = $_domingo;

        return $this;
    }

        public static function obtenerTodos() {
        $sql = "SELECT * FROM EmpleadoDia";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoEmpleadoDia($datos);

        return $listado;
    }
        private function _generarEmpleadoDia($datos) {
        $empleadoDia = new EmpleadoDia();
        $empleadoDia->_idEmpleadoDia = $data['id_empleado_dia'];
        $empleadoDia->_lunes = $data['lunes'];
        $empleadoDia->_martes = $data['martes'];
        $empleadoDia->_miercoles = $data['miercoles'];
        $empleadoDia->_jueves = $data['jueves'];
        $empleadoDia->_viernes = $data['viernes'];
        $empleadoDia->_sabado = $data['sabado'];
        $empleadoDia->_domingo = $data['domingo'];
        return $empleadoDia;
    }

    private function _generarListadoEmpleadoDia($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $empleadoDia = new EmpleadoDia();
            $empleadoDia->_idEmpleadoDia = $registro['id_empleado_dia'];
            $empleadoDia->_lunes = $registro['lunes'];
            $empleadoDia->_martes = $registro['martes'];
            $empleadoDia->_miercoles = $registro['miercoles'];
            $empleadoDia->_jueves = $registro['jueves'];
            $empleadoDia->_viernes = $registro['viernes'];
            $empleadoDia->_sabado = $registro['sabado'];
            $empleadoDia->_domingo = $registro['domingo'];
            $listado[] = $empleadoDia;
        }
        return $listado;
    }


    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM EmpleadoDia WHERE id_empleado_dia =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $empleadoDia = new EmpleadoDia();
        $empleadoDia->_idEmpleadoDia = $registro['id_empleado_dia'];
        $empleadoDia->_lunes = $registro['lunes'];
        $empleadoDia->_martes = $registro['martes'];
        $empleadoDia->_miercoles = $registro['miercoles'];
        $empleadoDia->_jueves = $registro['jueves'];
        $empleadoDia->_viernes = $registro['viernes'];
        $empleadoDia->_sabado = $registro['sabado'];
        $empleadoDia->_domingo = $registro['domingo'];
        return $empleadoDia;

    }

    public function guardar() {

        $sql = "INSERT INTO EmpleadoDia (id_empleado_dia, lunes, martes, miercoles, jueves, viernes, sabado, domingo) "
             . "VALUES (NULL, $this->_lunes, $this->_martes, $this->_miercoles, $this->_jueves, $this->_viernes, $this->_sabado, $this->_domingo)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEmpleadoDia = $idInsertado;
        //echo $sql;
        //exit;
    }
    public function actualizar() {

        $sql = "UPDATE EmpleadoDia SET lunes = $this->_lunes, martes = $this->_martes, miercoles = $this->_miercoles, jueves = $this->_jueves, viernes = $this->_viernes, sabado = $this->_sabado, domingo = $this->_domingo WHERE id_empleado_dia = $this->_idEmpleadoDia";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;
        //exit;
    }
    public function eliminar() {

        $sql = "DELETE  FROM EmpleadoDia WHERE id_empleado_dia = $this->_idEmpleadoDia";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
}


?>