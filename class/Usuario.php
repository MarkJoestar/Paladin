<?php
require_once 'Persona.php';
require_once 'MySQL.php';


class Usuario extends Persona {

    private $_idUsuario;
    private $_username;
    private $_password;
    private $_estaLogueado;
    private $_imagenPerfil;
    public $perfil;
    
    public function getIdUsuario()
    {
        return $this->_idUsuario; 
    }

    public function getUsername ()
    {
        return $this->_username; 
    }

    public function setUsername($_username)
    {
        $this->_username = $_username;

        return $this;
    }
        public function getPassword()
    {
        return $this->_password; 
    }

    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    public function getImagenPerfil()
    {
        return $this->_imagenPerfil; 
    }

    public function setImagenPerfil($_imagenPerfil)
    {
        $this->_imagenPerfil = $_imagenPerfil;

        return $this;
    }


    public static function obtenerTodos() {
        $sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, usuario.id_usuario, usuario.username, usuario.password "
             . "FROM persona "
             . "INNER JOIN usuario ON usuario.id_persona = persona.id_persona";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoUsuarios($datos);

        return $listado;
    }
        private function _generarUsuario($datos) {
        $usuario = new Usuario($data['nombre'], $data['apellido']);
        $usuario->_username = $data['username'];
        $usuario->_password = $data['password'];
        $usuario->_idUsuario = $data['id_usuario'];
        $usuario->_idPersona = $data['id_persona'];
        $usuario->_imagenPerfil = $data['imagen_perfil'];
        //$usuario->setFotoPerfil();
        return $usuario;
    }
    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM usuario AS u JOIN persona AS p ON u.id_persona = p.id_persona WHERE id_usuario =" . $id;


        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();


        $registro = $datos->fetch_assoc();



        $usuario = new Usuario($registro['nombre'], $registro['apellido']);
        $usuario->_idUsuario = $registro['id_usuario'];
        $usuario->_idPersona = $registro['id_persona'];
        $usuario->_username = $registro['username'];
        $usuario->_password = $registro['password'];
        $usuario->_imagenPerfil = $registro['imagen_perfil'];

        return $usuario;
    }


    private function _generarListadoUsuarios($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $usuario = new Usuario ($registro['nombre'], $registro['apellido']);
            $usuario->_username = $registro['username'];
            $usuario->_password = $registro['password'];
            $usuario->_idPersona = $registro['id_persona'];
            $usuario->_idUsuario = $registro['id_usuario'];
            $listado[] = $usuario;
        }
        return $listado;
    }

    public static function login($username, $password) {
        $sql = "SELECT * FROM usuario "
             . "INNER JOIN persona on persona.id_persona = usuario.id_persona "
             . "WHERE username = '$username' "
             . "AND password = '$password' ";
             //. "AND persona.id_estado = 1";
        //echo $sql;
        //exit;
        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
        $mysql->desconectar();

        if ($datos->num_rows > 0) {
            $registro = $datos->fetch_assoc();
            $usuario = new Usuario($registro['nombre'], $registro['apellido']);
            $usuario->_idUsuario = $registro['id_usuario'];
            $usuario->_idPersona = $registro['id_persona'];
            $usuario->_username = $registro['username'];
            $usuario->_idPerfil = $registro['id_perfil'];
            $usuario->_imagenPerfil = $registro['imagen_perfil'];
            $usuario->_estaLogueado = true;

            //$usuario->perfil = Perfil::obtenerPorId($usuario->_idPerfil);
            //$usuario->setDomicilio();
        } else {
            $usuario = new Usuario('', '');
            $usuario->_estaLogueado = false;
        }

        return $usuario;
    }

    public function estaLogueado() {
        return $this->_estaLogueado;
    }

    public function __toString() {
        return $this->_username;
    }

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO Usuario (id_usuario, username, password, id_persona, imagen_perfil)"
             . "VALUES (NULL, '$this->_username', '$this->_password', $this->_idPersona, '$this->_imagenPerfil')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idUsuario = $idInsertado;
        //echo $sql;
        //exit;
    }
    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE Usuario SET username = '$this->_username', password = '$this->_password', imagen_perfil = '$this->_imagenPerfil' WHERE id_usuario = $this->_idUsuario";
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        //echo $sql;
        //exit;
    }

    public function eliminar(){
        parent::eliminar();

        $sql = "DELETE FROM Usuario WHERE id_usuario = $this->_idUsuario";
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    /*public static function obtenerPorId($id) {
    $sql = "SELECT persona.id_persona, persona.nombre, persona.apellido, "
        . "persona.fecha_nacimiento, persona.id_estado, usuario.id_usuario, "
        ."usuario.username, usuario.password, FROM usuario"
        ."INNER JOIN persona on usuario.id_persona = persona.id_persona"
        . "WHERE usuario.id_usuario = " . $id;

    $mysql = new MySQL();
    $result = $mysql->consultar($sql);
    $mysql->desconectar();

    $data = $result->fetch_assoc();
    $usuario = self::_generarUsuario($data);
    return $usuario;
    }*/
}
?>