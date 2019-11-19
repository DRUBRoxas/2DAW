-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Agricultor
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Agricultor
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Agricultor` DEFAULT CHARACTER SET utf8 ;
USE `Agricultor` ;

-- -----------------------------------------------------
-- Table `Agricultor`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agricultor`.`Roles` (
  `idRoles` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idRoles`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Agricultor`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agricultor`.`Usuario` (
  `nombre` VARCHAR(16) NOT NULL,
  `contraseña` VARCHAR(32) NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  PRIMARY KEY (`Roles_idRoles`),
  CONSTRAINT `fk_Usuario_Roles1`
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `Agricultor`.`Roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `Agricultor`.`Agricultores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agricultor`.`Agricultores` (
  `dni` VARCHAR(9) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`dni`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Agricultor`.`Maquina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agricultor`.`Maquina` (
  `codigo` VARCHAR(8) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `precio_hora` DOUBLE NOT NULL,
  `estado` TINYINT NULL,
  `$fecha_compra` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Agricultor`.`Parcela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agricultor`.`Parcela` (
  `idParcela` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `num_parcela` INT NULL,
  `num_poligono` INT NULL,
  `num_olivos` INT NULL,
  `Agricultores_dni` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idParcela`, `Agricultores_dni`),
  CONSTRAINT `fk_Parcela_Agricultores1`
    FOREIGN KEY (`Agricultores_dni`)
    REFERENCES `Agricultor`.`Agricultores` (`dni`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Agricultor`.`Actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agricultor`.`Actividad` (
  `id_actividad` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(100) NULL,
  `Parcela_idParcela` INT NOT NULL,
  PRIMARY KEY (`id_actividad`, `Parcela_idParcela`),
  CONSTRAINT `fk_Actividad_Parcela1`
    FOREIGN KEY (`Parcela_idParcela`)
    REFERENCES `Agricultor`.`Parcela` (`idParcela`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Agricultor`.`Usuario_has_Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Agricultor`.`Usuario_has_Roles` (
  `Usuario_Roles_idRoles` VARCHAR(100) NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  PRIMARY KEY (`Usuario_Roles_idRoles`, `Roles_idRoles`),
  CONSTRAINT `fk_Usuario_has_Roles_Usuario1`
    FOREIGN KEY (`Usuario_Roles_idRoles`)
    REFERENCES `Agricultor`.`Usuario` (`Roles_idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Roles_Roles1`
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `Agricultor`.`Roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
