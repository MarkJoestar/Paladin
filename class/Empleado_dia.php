<?php
require_once 'MySQL.php';
require_once 'Empleado.php'

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

    public function setViernes($_sabado)
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
        $this->_sabado = $sabado;

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
    public function guardar() {

        $sql = "INSERT INTO EmpleadoDia (id_emlpeado_dia, lunes, martes, miercoles, jueves, viernes, sabado, domingo) "
             . "VALUES (NULL, $this->_lunes, $this->_martes, $this->_miercoles, $this->_jueves, $this->_viernes, $this->_sabado, $this->_domingo)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idUsuario = $idInsertado;
    }
    public function actualizar() {

        $sql = "UPDATE Usuario SET (id_emlpeado_dia, lunes, martes, miercoles, jueves, viernes, sabado, domingo) = '($this->_lunes, $this->_martes, $this->_miercoles, $this->_jueves, $this->_viernes, $this->_sabado, $this->_domingo)' WHERE id_funcion = $this->_idFuncion";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
    public function eliminar() {

        $sql = "DELETE  FROM EmpleadoDia WHERE id_emlpeado_dia = $this->_idEmpleadoDia";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
}


?>