-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema wassa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema wassa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wassa` DEFAULT CHARACTER SET utf8 ;
USE `wassa` ;

-- -----------------------------------------------------
-- Table `wassa`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wassa`.`usuarios` (
  `telefono` CHAR(9) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`telefono`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wassa`.`contactos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wassa`.`contactos` (
  `Tel1` CHAR(9) NOT NULL,
  `Tel2` CHAR(9) NOT NULL,
  PRIMARY KEY (`Tel1`, `Tel2`),
  INDEX `fk_Usuarios_has_Usuarios_Usuarios1_idx` (`Tel2` ASC),
  INDEX `fk_Usuarios_has_Usuarios_Usuarios_idx` (`Tel1` ASC),
  CONSTRAINT `fk_Usuarios_has_Usuarios_Usuarios`
    FOREIGN KEY (`Tel1`)
    REFERENCES `wassa`.`usuarios` (`telefono`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuarios_has_Usuarios_Usuarios1`
    FOREIGN KEY (`Tel2`)
    REFERENCES `wassa`.`usuarios` (`telefono`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wassa`.`mensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wassa`.`mensaje` (
  `idMensaje` INT(11) NOT NULL AUTO_INCREMENT,
  `Contenido` VARCHAR(400) NULL DEFAULT NULL,
  `FechaHora` DATETIME NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `Telefono1` CHAR(9) NULL DEFAULT NULL,
  `Telefono2` CHAR(9) NULL DEFAULT NULL,
  PRIMARY KEY (`idMensaje`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
