<?php


class EmpleadoFuncion {

    private $_idEmpleadoFuncion;
    private $_idEmpleado;
    private $_idFuncion;

    public function getIdEmpleadoFuncion()
    {
        return $this->_idEmpleadoFuncion;
    }


    public function setIdEmpleadoFuncion($_idEmpleadoFuncion)
    {
        $this->_idEmpleadoFuncion = $_idEmpleadoFuncion;

        return $this;
    }


    public function getIdEmpleado()
    {
        return $this->_idEmpleado;
    }

    public function setIdEmpleado($_idEmpleado)
    {
        $this->_idEmpleado = $_idEmpleado;

        return $this;
    }

    public function getIdFuncion()
    {
        return $this->_idFuncion;
    }


    public function setIdFuncion($_idFuncion)
    {
        $this->_idFuncion = $_idFuncion;

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO Empleado_Funcion (id_empleado_funcion, id_empleado, id_funcion) "
             . "VALUES (NULL, $this->_idEmpleado, $this->_idFuncion)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idEmpleadoFuncion = $idInsertado;
        //echo $sql;
        //exit;
    }
}


?>