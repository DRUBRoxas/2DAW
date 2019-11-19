-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Roles` (
  `idRoles` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idRoles`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `nombre` VARCHAR(16) NOT NULL,
  `contraseña` VARCHAR(32) NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  PRIMARY KEY (`Roles_idRoles`),
  CONSTRAINT `fk_Usuario_Roles1`
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `mydb`.`Roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mydb`.`Agricultores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Agricultores` (
  `dni` VARCHAR(9) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`dni`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Maquina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Maquina` (
  `codigo` VARCHAR(8) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `precio_hora` DOUBLE NOT NULL,
  `estado` TINYINT NULL,
  `$fecha_compra` VARCHAR(45) NULL,
  PRIMARY KEY (`codigo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Parcela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Parcela` (
  `idParcela` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `num_parcela` INT NULL,
  `num_poligono` INT NULL,
  `num_olivos` INT NULL,
  `Agricultores_dni` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idParcela`, `Agricultores_dni`),
  CONSTRAINT `fk_Parcela_Agricultores1`
    FOREIGN KEY (`Agricultores_dni`)
    REFERENCES `mydb`.`Agricultores` (`dni`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Actividad` (
  `id_actividad` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(100) NULL,
  `Parcela_idParcela` INT NOT NULL,
  PRIMARY KEY (`id_actividad`, `Parcela_idParcela`),
  INDEX `fk_Actividad_Parcela1_idx` (`Parcela_idParcela` ASC) VISIBLE,
  CONSTRAINT `fk_Actividad_Parcela1`
    FOREIGN KEY (`Parcela_idParcela`)
    REFERENCES `mydb`.`Parcela` (`idParcela`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario_has_Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario_has_Roles` (
  `Usuario_Roles_idRoles` INT NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  PRIMARY KEY (`Usuario_Roles_idRoles`, `Roles_idRoles`),
  INDEX `fk_Usuario_has_Roles_Roles1_idx` (`Roles_idRoles` ASC) VISIBLE,
  INDEX `fk_Usuario_has_Roles_Usuario1_idx` (`Usuario_Roles_idRoles` ASC) VISIBLE,
  CONSTRAINT `fk_Usuario_has_Roles_Usuario1`
    FOREIGN KEY (`Usuario_Roles_idRoles`)
    REFERENCES `mydb`.`Usuario` (`Roles_idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Roles_Roles1`
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `mydb`.`Roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
