<?php

require_once 'MySQL.php';


class Persona {

	protected $_idPersona;
	protected $_nombre;
	protected $_apellido;
	protected $_fechaNacimiento;
	protected $_idTipoDocumento;
    protected $_numeroDocumento;
	protected $_estado;

	const ACTIVO = 1;

	public function __construct($nombre, $apellido) {
		$this->_nombre = $nombre;
		$this->_apellido = $apellido;
		$this->_estado = self::ACTIVO;
	}


    public function getIdPersona()
    {
        return $this->_idPersona;
    }


    public function getNombre()
    {
        return $this->_nombre;
    }


    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }


    public function getApellido()
    {
        return $this->_apellido;
    }


    public function setApellido($_apellido)
    {
        $this->_apellido = $_apellido;

        return $this;
    }


    public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }


    public function setFechaNacimiento($_fechaNacimiento)
    {
        $this->_fechaNacimiento = $_fechaNacimiento;

        return $this;
    }


    public function getIdTipoDocumento()
    {
        return $this->_idTipoDocumento;
    }


    public function setIdTipoDocumento($_idTipoDocumento)
    {
        $this->_idTipoDocumento = $_idTipoDocumento;

        return $this;
    }

    public function getNumeroDocumento()
    {
        return $this->_numeroDocumento;
    }

    public function setNumeroDocumento($_numeroDocumento)
    {
        $this->_numeroDocumento = $_numeroDocumento;

        return $this;
    }


    public function getEstado()
    {
        return $this->_estado;
    }

 
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO Persona (id_persona, nombre, apellido, id_tipo_documento, "
             . "numero_documento, fecha_nacimiento) VALUES (NULL, '$this->_nombre', "
             . "'$this->_apellido', '$this->_idTipoDocumento', '$this->_numeroDocumento', '$this->_fechaNacimiento')";

        //echo $sql;
        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPersona = $idInsertado;

    }

    public function actualizar() {
        $sql = "UPDATE Persona SET nombre = '$this->_nombre', apellido = '$this->_apellido', "
             . "numero_documento = '$this->_numeroDocumento', fecha_nacimiento = '$this->_fechaNacimiento' "
             . "WHERE id_persona = $this->_idPersona";

        //echo $sql;
        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar() {
        $sql = "DELETE * FROM Persona WHERE id_persona = $this->_idPersona";

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }



    public function __toString() {
    	return $this->_nombre . ", " . $this->_apellido;
    }    
}


?>