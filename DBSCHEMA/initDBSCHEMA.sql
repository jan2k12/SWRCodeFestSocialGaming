-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema socialgaming
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `socialgaming` ;

-- -----------------------------------------------------
-- Schema socialgaming
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `socialgaming` ;
USE `socialgaming` ;

-- -----------------------------------------------------
-- Table `socialgaming`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `socialgaming`.`user` ;

CREATE TABLE IF NOT EXISTS `socialgaming`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `isActive` TINYINT(4) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `socialgaming`.`tvshow`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `socialgaming`.`tvshow` ;

CREATE TABLE IF NOT EXISTS `socialgaming`.`tvshow` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `socialgaming`.`episode`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `socialgaming`.`episode` ;

CREATE TABLE IF NOT EXISTS `socialgaming`.`episode` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `startDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `summary` VARCHAR(45) NULL,
  `show_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_episode_show_idx` (`show_id` ASC),
  CONSTRAINT `fk_episode_show`
    FOREIGN KEY (`show_id`)
    REFERENCES `socialgaming`.`tvshow` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `socialgaming`.`hint`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `socialgaming`.`hint` ;

CREATE TABLE IF NOT EXISTS `socialgaming`.`hint` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `date` DATETIME NOT NULL,
  `episode_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_hint_episode1_idx` (`episode_id` ASC),
  CONSTRAINT `fk_hint_episode1`
    FOREIGN KEY (`episode_id`)
    REFERENCES `socialgaming`.`episode` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `socialgaming`.`suspect`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `socialgaming`.`suspect` ;

CREATE TABLE IF NOT EXISTS `socialgaming`.`suspect` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `guilty` TINYINT NOT NULL,
  `imagePath` TEXT NULL,
  `episode_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_suspect_episode1_idx` (`episode_id` ASC),
  CONSTRAINT `fk_suspect_episode1`
    FOREIGN KEY (`episode_id`)
    REFERENCES `socialgaming`.`episode` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `socialgaming`.`userTipp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `socialgaming`.`userTipp` ;

CREATE TABLE IF NOT EXISTS `socialgaming`.`userTipp` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` VARCHAR(45) NOT NULL,
  `suspectId` VARCHAR(45) NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `socialgaming`.`user_score`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `socialgaming`.`user_score` ;

CREATE TABLE IF NOT EXISTS `socialgaming`.`user_score` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userId` VARCHAR(45) NOT NULL,
  `score` INT NOT NULL,
  `episodeId` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
