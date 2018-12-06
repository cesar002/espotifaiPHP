-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema espotifai_dev
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema espotifai_dev
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `espotifai_dev` DEFAULT CHARACTER SET utf8 ;
USE `espotifai_dev` ;

-- -----------------------------------------------------
-- Table `espotifai_dev`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`usuarios` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC));


-- -----------------------------------------------------
-- Table `espotifai_dev`.`datos_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`datos_usuario` (
  `id_datos_usuario` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(100) NULL,
  `apellido` VARCHAR(100) NULL,
  `edad` VARCHAR(45) NULL,
  `datos_usuariocol` INT NULL,
  PRIMARY KEY (`id_datos_usuario`),
  INDEX `id_user_idx` (`id_usuario` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  CONSTRAINT `id_user`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `espotifai_dev`.`usuarios` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`cat_autores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`cat_autores` (
  `id_autor` INT NOT NULL AUTO_INCREMENT,
  `autor` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_autor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`cat_generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`cat_generos` (
  `id_genero` INT NOT NULL AUTO_INCREMENT,
  `genero` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`canciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`canciones` (
  `id_cancion` INT NOT NULL AUTO_INCREMENT,
  `cancion` VARCHAR(255) NOT NULL,
  `anio` YEAR NULL,
  PRIMARY KEY (`id_cancion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`generos_canciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`generos_canciones` (
  `id_genero` INT NOT NULL,
  `id_cancion` INT NOT NULL,
  PRIMARY KEY (`id_genero`, `id_cancion`),
  INDEX `fk_cat_generos_has_canciones_canciones1_idx` (`id_cancion` ASC),
  INDEX `fk_cat_generos_has_canciones_cat_generos1_idx` (`id_genero` ASC),
  CONSTRAINT `fk_cat_generos_has_canciones_cat_generos1`
    FOREIGN KEY (`id_genero`)
    REFERENCES `espotifai_dev`.`cat_generos` (`id_genero`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cat_generos_has_canciones_canciones1`
    FOREIGN KEY (`id_cancion`)
    REFERENCES `espotifai_dev`.`canciones` (`id_cancion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`autores_canciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`autores_canciones` (
  `id_autor` INT NOT NULL,
  `id_cancion` INT NOT NULL,
  PRIMARY KEY (`id_autor`, `id_cancion`),
  INDEX `fk_canciones_has_cat_autores_cat_autores1_idx` (`id_autor` ASC),
  INDEX `fk_canciones_has_cat_autores_canciones1_idx` (`id_cancion` ASC),
  CONSTRAINT `fk_canciones_has_cat_autores_canciones1`
    FOREIGN KEY (`id_cancion`)
    REFERENCES `espotifai_dev`.`canciones` (`id_cancion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_canciones_has_cat_autores_cat_autores1`
    FOREIGN KEY (`id_autor`)
    REFERENCES `espotifai_dev`.`cat_autores` (`id_autor`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`path_cancion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`path_cancion` (
  `id_path` INT NOT NULL AUTO_INCREMENT,
  `id_cancion` INT NOT NULL,
  `path` VARCHAR(100) NOT NULL,
  `extension` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_path`),
  UNIQUE INDEX `path_UNIQUE` (`path` ASC),
  INDEX `id_cancion_idx` (`id_cancion` ASC),
  CONSTRAINT `id_cancion`
    FOREIGN KEY (`id_cancion`)
    REFERENCES `espotifai_dev`.`canciones` (`id_cancion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`token_registro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`token_registro` (
  `id_token` VARCHAR(255) NOT NULL,
  `id_usuario` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_expiracion` DATE NOT NULL,
  PRIMARY KEY (`id_token`),
  INDEX `id_usuario_idx` (`id_usuario` ASC),
  CONSTRAINT `id_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `espotifai_dev`.`usuarios` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`token_reset`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`token_reset` (
  `id_token` VARCHAR(255) NOT NULL,
  `id_usuario` INT NOT NULL,
  `fecha_creacion` DATE NOT NULL,
  `fecha_expiracion` DATE NOT NULL,
  PRIMARY KEY (`id_token`),
  INDEX `fk_token_reset_usuarios1_idx` (`id_usuario` ASC),
  CONSTRAINT `fk_token_reset_usuarios1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `espotifai_dev`.`usuarios` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `espotifai_dev`.`favoritos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `espotifai_dev`.`favoritos` (
  `usuarios_id_user` INT NOT NULL,
  `canciones_id_cancion` INT NOT NULL,
  PRIMARY KEY (`usuarios_id_user`, `canciones_id_cancion`),
  INDEX `fk_usuarios_has_canciones_canciones1_idx` (`canciones_id_cancion` ASC),
  INDEX `fk_usuarios_has_canciones_usuarios1_idx` (`usuarios_id_user` ASC),
  CONSTRAINT `fk_usuarios_has_canciones_usuarios1`
    FOREIGN KEY (`usuarios_id_user`)
    REFERENCES `espotifai_dev`.`usuarios` (`id_user`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuarios_has_canciones_canciones1`
    FOREIGN KEY (`canciones_id_cancion`)
    REFERENCES `espotifai_dev`.`canciones` (`id_cancion`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
