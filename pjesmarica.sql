-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pjesmarica
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pjesmarica
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pjesmarica` DEFAULT CHARACTER SET utf8 ;
USE `pjesmarica` ;

-- -----------------------------------------------------
-- Table `pjesmarica`.`tip_korisnika`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pjesmarica`.`tip_korisnika` (
  `tip_korisnika_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NULL,
  PRIMARY KEY (`tip_korisnika_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `pjesmarica`.`korisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pjesmarica`.`korisnik` (
  `korisnik_id` INT NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` VARCHAR(45) NULL,
  `lozinka` BINARY(60) NULL,
  `tip_korisnika_tip_korisnika_id` INT NOT NULL,
  PRIMARY KEY (`korisnik_id`, `tip_korisnika_tip_korisnika_id`),
  UNIQUE INDEX `korisnicko_ime_UNIQUE` (`korisnicko_ime` ASC),
  INDEX `fk_korisnik_tip_korisnika1_idx` (`tip_korisnika_tip_korisnika_id` ASC),
  CONSTRAINT `fk_korisnik_tip_korisnika1`
    FOREIGN KEY (`tip_korisnika_tip_korisnika_id`)
    REFERENCES `pjesmarica`.`tip_korisnika` (`tip_korisnika_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `pjesmarica`.`pjesma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pjesmarica`.`pjesma` (
  `pjesma_id` INT NOT NULL AUTO_INCREMENT,
  `naslov` VARCHAR(45) NULL,
  `tablatura` MEDIUMTEXT NULL,
  `korisnik_korisnik_id` INT NOT NULL,
  PRIMARY KEY (`pjesma_id`, `korisnik_korisnik_id`),
  INDEX `fk_pjesma_korisnik1_idx` (`korisnik_korisnik_id` ASC),
  CONSTRAINT `fk_pjesma_korisnik1`
    FOREIGN KEY (`korisnik_korisnik_id`)
    REFERENCES `pjesmarica`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `pjesmarica`.`izvodjac`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pjesmarica`.`izvodjac` (
  `izvodjac_id` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NULL,
  PRIMARY KEY (`izvodjac_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `pjesmarica`.`izvodi_pjesmu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pjesmarica`.`izvodi_pjesmu` (
  `izvodjac_izvodjac_id` INT NOT NULL,
  `pjesma_pjesma_id` INT NOT NULL,
  PRIMARY KEY (`izvodjac_izvodjac_id`, `pjesma_pjesma_id`),
  INDEX `fk_izvodi_pjesmu_izvodjac1_idx` (`izvodjac_izvodjac_id` ASC),
  INDEX `fk_izvodi_tablaturu_pjesma1_idx` (`pjesma_pjesma_id` ASC),
  CONSTRAINT `fk_izvodi_pjesmu_izvodjac1`
    FOREIGN KEY (`izvodjac_izvodjac_id`)
    REFERENCES `pjesmarica`.`izvodjac` (`izvodjac_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_izvodi_tablaturu_pjesma1`
    FOREIGN KEY (`pjesma_pjesma_id`)
    REFERENCES `pjesmarica`.`pjesma` (`pjesma_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
