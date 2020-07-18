<?php
require_once 'MySQL.php';
require_once 'Perfil.php';


class PerfilModulo {

	private $_idPerfilModulo;
	private $_idPerfil;
	private $_idModulo;

    public function getIdPerfilModulo()
    {
        return $this->_idPerfilModulo;
    }

    public function setIdPerfilModulo($_idPerfilModulo)
    {
        $this->_idPerfilModulo = $_idPerfilModulo;

        return $this;
    }

    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

        return $this;
    }

    public function getIdModulo()
    {
        return $this->_idModulo;
    }


    public function setIdModulo($_idModulo)
    {
        $this->_idModulo = $_idModulo;

        return $this;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM perfil_modulo WHERE id_perfil_modulo =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();


        $perfilModulo = new PerfilModulo($registro['id_perfil_modulo']);
        $perfilModulo->_idModulo = $registro['id_modulo'];
        $perfilModulo->_idPerfil = $registro['id_perfil'];
        return $perfilModulo;
    }

    public function guardar() {
        $sql = "INSERT INTO perfil_modulo (id_perfil_modulo, id_perfil, id_modulo) "
             . "VALUES (NULL, $this->_idPerfil, $this->_idModulo)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPerfilModulo = $idInsertado;
    }

     public function actualizar() {

        $sql = "UPDATE perfil_modulo SET id_modulo = $this->_idModulo WHERE id_perfil = $this->_idPerfil";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;
        //exit;
    }

    public function eliminar(){

        $sql = "DELETE FROM perfil_modulo WHERE id_perfil_modulo = $this->_idPerfilModulo";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
}

?>