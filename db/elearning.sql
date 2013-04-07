SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `elearning` ;
CREATE SCHEMA IF NOT EXISTS `elearning` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `elearning` ;

-- -----------------------------------------------------
-- Table `elearning`.`modulos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`modulos` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`modulos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`cursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`cursos` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `modulo_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cursos_modulos` (`modulo_id` ASC) ,
  CONSTRAINT `fk_cursos_modulos`
    FOREIGN KEY (`modulo_id` )
    REFERENCES `elearning`.`modulos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` CHAR(30) NULL ,
  `apellidos` CHAR(30) NULL ,
  `fecha_nacimiento` DATETIME NULL DEFAULT NULL ,
  `direccion` VARCHAR(150) NULL ,
  `email` VARCHAR(80) NULL ,
  `telefono` CHAR(12) NULL ,
  `login` VARCHAR(45) NULL ,
  `password` VARCHAR(255) NULL ,
  `tipo` TINYINT NULL DEFAULT 1 COMMENT 'Tipo:1=alumno, 2=profesor.' ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `foto` VARCHAR(255) NULL ,
  `foto_dir` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `login` (`login` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`asignaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`asignaturas` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`asignaturas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `curso_id` INT NULL ,
  `profesor_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_asignaturas_cursos` (`curso_id` ASC) ,
  INDEX `fk_asignaturas_usuarios` (`profesor_id` ASC) ,
  CONSTRAINT `fk_asignaturas_cursos`
    FOREIGN KEY (`curso_id` )
    REFERENCES `elearning`.`cursos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignaturas_usuarios`
    FOREIGN KEY (`profesor_id` )
    REFERENCES `elearning`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`alumnos_asignaturas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`alumnos_asignaturas` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`alumnos_asignaturas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `alumno_id` INT NULL ,
  `asignatura_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_alumnos_asignaturas_usuario` (`alumno_id` ASC) ,
  INDEX `fk_alumnos_asignaturas_asignatura` (`asignatura_id` ASC) ,
  CONSTRAINT `fk_alumnos_asignaturas_usuario`
    FOREIGN KEY (`alumno_id` )
    REFERENCES `elearning`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumnos_asignaturas_asignatura`
    FOREIGN KEY (`asignatura_id` )
    REFERENCES `elearning`.`asignaturas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `elearning`.`examenes_cabeceras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`examenes_cabeceras` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`examenes_cabeceras` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `asignaturas_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `enunciado` LONGTEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_examenes_cabeceras_asignaturas`
    FOREIGN KEY (`asignaturas_id` )
    REFERENCES `elearning`.`asignaturas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Exámenes de la plataforma' ;


-- -----------------------------------------------------
-- Table `elearning`.`examenes_detalles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`examenes_detalles` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`examenes_detalles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `alumno_id` INT NULL ,
  `examenes_cabecera_id` INT NULL ,
  `nota` DECIMAL(4,2) NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_examenes_detalles_usuarios` (`alumno_id` ASC) ,
  INDEX `fk_examenes_detalles_cabeceras` (`examenes_cabecera_id` ASC) ,
  CONSTRAINT `fk_examenes_detalles_usuarios`
    FOREIGN KEY (`alumno_id` )
    REFERENCES `elearning`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_examenes_detalles_cabeceras`
    FOREIGN KEY (`examenes_cabecera_id` )
    REFERENCES `elearning`.`examenes_cabeceras` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Exámenes de la plataforma' ;


-- -----------------------------------------------------
-- Table `elearning`.`examenes_adjuntos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`examenes_adjuntos` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`examenes_adjuntos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `ruta_fichero` VARCHAR(255) NULL ,
  `examen_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_examenes_adjuntos_examenes_detalles` (`examen_id` ASC) ,
  CONSTRAINT `fk_examenes_adjuntos_examenes_detalles`
    FOREIGN KEY (`examen_id` )
    REFERENCES `elearning`.`examenes_detalles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Ficheros adjuntos para la tabla exámenes.' ;


-- -----------------------------------------------------
-- Table `elearning`.`trabajos_enunciados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`trabajos_enunciados` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`trabajos_enunciados` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` LONGTEXT NULL ,
  `asignatura_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `enunciado` LONGTEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_trabajos_enunciados_asignaturas`
    FOREIGN KEY (`asignatura_id` )
    REFERENCES `elearning`.`asignaturas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Exámenes de la plataforma' ;


-- -----------------------------------------------------
-- Table `elearning`.`trabajos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`trabajos` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`trabajos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `asignatura_id` INT NULL ,
  `trabajos_enunciado_id` INT NULL ,
  `alumno_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_trabajos_enunciados` (`trabajos_enunciado_id` ASC) ,
  INDEX `fk_trabajos_usuarios` (`alumno_id` ASC) ,
  CONSTRAINT `fk_trabajos_asignaturas`
    FOREIGN KEY (`asignatura_id` )
    REFERENCES `elearning`.`asignaturas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajos_enunciado`
    FOREIGN KEY (`trabajos_enunciado_id` )
    REFERENCES `elearning`.`trabajos_enunciados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajos_usuarios`
    FOREIGN KEY (`alumno_id` )
    REFERENCES `elearning`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Exámenes de la plataforma' ;


-- -----------------------------------------------------
-- Table `elearning`.`trabajos_adjuntos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`trabajos_adjuntos` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`trabajos_adjuntos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dsc` CHAR(30) NULL ,
  `ruta_fichero` VARCHAR(255) NULL ,
  `trabajo_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_trabajos_adjuntos_trabajos`
    FOREIGN KEY (`trabajo_id` )
    REFERENCES `elearning`.`trabajos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB, 
COMMENT = 'Ficheros adjuntos para la tabla exámenes.' ;


-- -----------------------------------------------------
-- Table `elearning`.`notas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `elearning`.`notas` ;

CREATE  TABLE IF NOT EXISTS `elearning`.`notas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nota` DECIMAL(4,2) NULL ,
  `alumno_asignatura_id` INT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_notas_alumnos_asignaturas` (`alumno_asignatura_id` ASC) ,
  CONSTRAINT `fk_notas_alumnos_asignaturas`
    FOREIGN KEY (`alumno_asignatura_id` )
    REFERENCES `elearning`.`alumnos_asignaturas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
