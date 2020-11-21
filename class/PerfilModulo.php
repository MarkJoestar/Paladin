<?php


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

    public function guardar() {
        $sql = "INSERT INTO perfil_modulo (id_perfil_modulo, id_perfil, id_modulo) "
             . "VALUES (NULL, $this->_idPerfil, $this->_idModulo)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPerfilModulo = $idInsertado;
        //echo $sql;
        //exit;
    }

}


?>