-- MySQL Script generated by MySQL Workbench
-- Sat May 30 11:02:53 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE database `Paladin1` DEFAULT CHARACTER SET utf8;
USE `Paladin1` ;

-- -----------------------------------------------------
-- Table `Paladin`.`SensorEstado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SensorEstado` (
  `id_sensor_estado` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_sensor_estado`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Sensor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Sensor` (
  `id_sensor` INT NOT NULL,
  `modelo` VARCHAR(45) NULL,
  `id_sensor_estado` INT NOT NULL,
  PRIMARY KEY (`id_sensor`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Senial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Senial` (
  `id_senial` INT NOT NULL,
  `fecha_hora` DATETIME NOT NULL,
  `id_sensor` INT NOT NULL,
  PRIMARY KEY (`id_senial`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Ubicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ubicacion` (
  `id_ubicacion` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_ubicacion`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`CamaraEstado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CamaraEstado` (
  `id_camara_estado` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_camara_estado`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Camara`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS`Camara` (
  `id_camara` INT NOT NULL,
  `modelos` VARCHAR(45) NULL,
  `id_ubicacion` INT NOT NULL,
  `id_camara_estado` INT NOT NULL,
  PRIMARY KEY (`id_camara`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Video`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Video` (
  `id_video` INT NOT NULL,
  `duracion` TIME NOT NULL,
  `fecha_hora` DATETIME NOT NULL,
  `id_camara` INT NOT NULL,
  `id_ubicacion` INT NOT NULL,
  PRIMARY KEY (`id_video`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`TipoDocumento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TipoDocumento` (
  `id_tipo_documento` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
  );


-- -----------------------------------------------------
-- Table `mydb`.`Persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS`Persona` (
  `id_persona` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `numero_documento` CHAR(10) NOT NULL,
  `estado` INT NOT NULL,
  `id_tipo_documento` INT NOT NULL,
  PRIMARY KEY (`id_persona`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`EmpleadoDia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `EmpleadoDia` (
  `id_empleado_dia` INT NOT NULL,
  `lunes` INT NULL,
  `martes` INT NULL,
  `miercoles` INT NULL,
  `jueves` INT NULL,
  `viernes` INT NULL,
  `sabado` INT NULL,
  `domingo` INT NULL,
  PRIMARY KEY (`id_empleado_dia`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Empleado` (
  `id_empleado` INT NOT NULL,
  `sueldo` CHAR(5) NOT NULL,
  `id_persona` INT NOT NULL,
  `id_empleado_dia` INT NOT NULL,
  PRIMARY KEY (`id_empleado`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Horario` (
  `id_horario` INT NOT NULL,
  `hora_ingreso` DATETIME NOT NULL,
  `hora_salida` DATETIME NOT NULL,
  `id_empleado` INT NOT NULL,
  PRIMARY KEY (`id_horario`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Funcion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Funcion` (
  `id_funcion` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_funcion`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`TipoContacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `TipoContacto` (
  `id_tipo_contacto` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_contacto`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Persona_Contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Persona_Contacto` (
  `id_persona` INT NOT NULL,
  `id_tipo_contacto` INT NOT NULL,
  `valor` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_tipo_contacto`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Barrio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Barrio` (
  `id_barrio` INT NOT NULL,
  `descripcion` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_barrio`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Domicilio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Domicilio` (
  `id_domicilio` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  `manzana` INT NULL,
  `calle` VARCHAR(45) NULL,
  `numero_casa` INT NULL,
  `torre` VARCHAR(45) NULL,
  `piso` VARCHAR(45) NULL,
  `sector` VARCHAR(45) NULL,
  `id_persona` INT NOT NULL,
  `id_barrio` INT NOT NULL,
  PRIMARY KEY (`id_domicilio`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Empleado_Funcion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Empleado_Funcion` (
  `id_empleado_funcion` INT NOT NULL,
  `id_empleado` INT NOT NULL,
  `id_funcion` INT NOT NULL,
  PRIMARY KEY (`id_empleado_funcion`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Asistencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistencia` (
  `id_asistencia` INT NOT NULL,
  `fecha_hora_ingreso` DATETIME NOT NULL,
  `fecha_hora_salida` DATETIME NOT NULL,
  `id_empleado` INT NOT NULL,
  PRIMARY KEY (`id_asistencia`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Perfil` (
  `id_perfil` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_perfil`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS`Usuario` (
  `id_usuario` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `id_perfil` INT NOT NULL,
  `id_empleado` INT NOT NULL,
  `id_persona` INT NOT NULL,
  PRIMARY KEY (`id_usuario`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Modulo` (
  `id_modulo` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_modulo`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Perfil_Modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Perfil_Modulo` (
  `id_perfil_modulo` INT NOT NULL,
  `id_perfil` INT NOT NULL,
  `id_modulo` INT NOT NULL,
  PRIMARY KEY (`id_perfil_modulo`)
  );
-- -----------------------------------------------------
-- Table `mydb`.`Registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Registro` (
  `id_registro` INT NOT NULL,
  `id_camara` INT NOT NULL,
  `id_senial` INT NOT NULL,
  PRIMARY KEY (`id_registro`)
  );
  
ALTER TABLE `Domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Perfil_Modulo`
  MODIFY `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Persona_Contacto`
  MODIFY `id_persona_contacto` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `TipoContacto`
  MODIFY `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `TipoDocumento`
  MODIFY `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Senial`
  MODIFY `id_senial` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Sensor`
  MODIFY `id_sensor` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `SensorEstado`
  MODIFY `id_sensor_estado` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Camara`
  MODIFY `id_camara` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `CamaraEstado`
  MODIFY `id_camara_estado` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Barrio`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `EmpleadoDia`
  MODIFY `id_empleado_dia` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Empleado_Funcion`
  MODIFY `id_empleado_funcion` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `Funcion`
MODIFY `id_funcion` int(11) NOT NULL AUTO_INCREMENT;
select * from empleado_funcion;
/*SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;*/
