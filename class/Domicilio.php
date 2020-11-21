<?php
require_once 'Barrio.php';
require_once 'MySQL.php';


class Domicilio {

	private $_idDomicilio;
	private $_calle;
	private $_torre;
	private $_piso;
	private $_manzana;
    private $_numeroCasa;
    private $_sector;
    //private $_descripcion;
	private $_idPersona;
    //public $barrio;


    public function getIdDomicilio()
    {
        return $this->_idDomicilio;
    }


    public function setIdDomicilio($_idDomicilio)
    {
        $this->_idDomicilio = $_idDomicilio;

        return $this;
    }


    public function getCalle()
    {
        return $this->_calle;
    }

    public function setCalle($_calle)
    {
        $this->_calle = $_calle;

        return $this;
    }

    public function getPiso()
    {
        return $this->_piso;
    }

    public function setPiso($_piso)
    {
        $this->_piso = $_piso;

        return $this;
    }

    public function getNumeroCasa()
    {
        return $this->_numeroCasa;
    }

    public function setNumeroCasa($_numeroCasa)
    {
        $this->_numeroCasa = $_numeroCasa;

        return $this;
    }

    public function getTorre()
    {
        return $this->_torre;
    }

    public function setTorre($_torre)
    {
        $this->_torre = $_torre;

        return $this;
    }

    public function getSector()
    {
        return $this->_sector;
    }

    public function setSector($_sector)
    {
        $this->_sector = $_sector;

        return $this;
    }

    public function getManzana()
    {
        return $this->_manzana;
    }

    public function setManzana($_manzana)
    {
        $this->_manzana = $_manzana;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }

    /*public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

        return $this;
    }*/

    public static function obtenerPorIdPersona($idPersona) {
    	$sql = "SELECT * FROM domicilio WHERE id_persona = " . $idPersona;

    	$mysql = new MySQL();
    	$datos = $mysql->consultar($sql);
    	$mysql->desconectar();

    	$data = $datos->fetch_assoc();
    	$domicilio = null;

    	if ($datos->num_rows > 0) {
            $domicilio = new Domicilio();
	    	$domicilio->_idDomicilio = $data['id_domicilio'];
            $domicilio->_numeroCasa = $data['numero_casa'];
	    	$domicilio->_calle = $data['calle'];
	    	$domicilio->_piso = $data['piso'];
	    	$domicilio->_piso = $data['piso'];
	    	$domicilio->_manzana = $data['manzana'];
	    	$domicilio->_idPersona = $data['id_persona'];
            //$domicilio->setBarrio();
	    }

    	return $domicilio;
    }

    public function guardar() {
        $sql = "INSERT INTO Domicilio (id_domicilio, numero_casa, calle, piso, "
             . "manzana, sector, id_persona) VALUES (NULL, $this->_numeroCasa, '$this->_calle', "
             . "'$this->_piso', '$this->_manzana', '$this->_sector', $this->_idPersona)";

        $mysql = new MySQL();
        $mysql->insertar($sql);
        $mysql->desconectar();
        echo $sql;
        exit;
    }

    public function actualizar() {

    $sql = "UPDATE Domicilio SET calle = '$this->_calle', piso = '$this->_piso', numero_casa = '$this->_numeroCasa', manzana = '$this->_manzana', sector = '$this->_sector' WHERE id_domicilio = $this->_idDomicilio";
    $mysql = new MySQL();
    $mysql->actualizar($sql);
    //echo $sql;
    //exit;
    }

    public function eliminar(){

        $sql = "DELETE * FROM Domicilio WHERE id_domicilio = $this->_idDomicilio";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __toString() {
    	return $this->_calle . " " . $this->_manzana . " " . $this->_numeroCasa . " " . $this->_sector . " " . $this->_piso;
    }
}


?>