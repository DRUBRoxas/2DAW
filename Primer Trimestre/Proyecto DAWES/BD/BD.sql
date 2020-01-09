-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema agricultor
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema agricultor
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agricultor` DEFAULT CHARACTER SET utf8 ;
USE `agricultor` ;

-- -----------------------------------------------------
-- Table `agricultor`.`agricultores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agricultor`.`agricultores` (
  `dni` VARCHAR(9) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`dni`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agricultor`.`parcela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agricultor`.`parcela` (
  `idParcela` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `num_parcela` INT(11) NULL DEFAULT NULL,
  `num_poligono` INT(11) NULL DEFAULT NULL,
  `num_olivos` INT(11) NULL DEFAULT NULL,
  `agricultores_dni` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idParcela`),
  INDEX `fk_parcela_agricultores1_idx` (`agricultores_dni` ASC),
  CONSTRAINT `fk_parcela_agricultores1`
    FOREIGN KEY (`agricultores_dni`)
    REFERENCES `agricultor`.`agricultores` (`dni`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agricultor`.`actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agricultor`.`actividad` (
  `id_actividad` INT(11) NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion` VARCHAR(100) NULL DEFAULT NULL,
  `Parcela_idParcela` INT(11) NOT NULL,
  PRIMARY KEY (`id_actividad`, `Parcela_idParcela`),
  INDEX `fk_Actividad_Parcela1` (`Parcela_idParcela` ASC),
  CONSTRAINT `fk_Actividad_Parcela1`
    FOREIGN KEY (`Parcela_idParcela`)
    REFERENCES `agricultor`.`parcela` (`idParcela`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agricultor`.`maquina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agricultor`.`maquina` (
  `codigo` VARCHAR(8) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `precio_hora` DOUBLE NOT NULL,
  `estado` TINYINT(4) NULL DEFAULT NULL,
  `$fecha_compra` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agricultor`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agricultor`.`roles` (
  `idRoles` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idRoles`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agricultor`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agricultor`.`usuario` (
  `nombre` VARCHAR(16) NOT NULL,
  `contraseña` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`nombre`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `agricultor`.`roles_has_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agricultor`.`roles_has_usuario` (
  `roles_idRoles` INT(11) NOT NULL,
  `usuario_nombre` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`roles_idRoles`, `usuario_nombre`),
  INDEX `fk_roles_has_usuario_usuario1` (`usuario_nombre` ASC),
  CONSTRAINT `fk_roles_has_usuario_roles1`
    FOREIGN KEY (`roles_idRoles`)
    REFERENCES `agricultor`.`roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_usuario_usuario1`
    FOREIGN KEY (`usuario_nombre`)
    REFERENCES `agricultor`.`usuario` (`nombre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
