-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema socialgaming
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema socialgaming
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `socialgaming` ;
USE `socialgaming` ;

-- -----------------------------------------------------
-- Table `socialgaming`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialgaming`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `isActive` TINYINT(4) NULL,
  `user_suspect_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `socialgaming`.`show`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialgaming`.`show` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `socialgaming`.`episode`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialgaming`.`episode` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `startDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `summary` VARCHAR(45) NULL,
  `show_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_episode_show_idx` (`show_id` ASC),
  CONSTRAINT `fk_episode_show`
    FOREIGN KEY (`show_id`)
    REFERENCES `socialgaming`.`show` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `socialgaming`.`hint`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialgaming`.`hint` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `date` TIMESTAMP NOT NULL,
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
-- Table `socialgaming`.`user_has_suspect`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialgaming`.`user_has_suspect` (
  `user_id` INT NOT NULL,
  `suspect_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `suspect_id`),
  INDEX `fk_user_has_suspect_suspect1_idx` (`suspect_id` ASC),
  INDEX `fk_user_has_suspect_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_has_suspect_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `socialgaming`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_suspect_suspect1`
    FOREIGN KEY (`suspect_id`)
    REFERENCES `socialgaming`.`suspect` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `socialgaming`.`note`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialgaming`.`note` (
  `user_id` INT NOT NULL,
  `episode_id` INT NOT NULL,
  `text` TEXT NULL,
  PRIMARY KEY (`user_id`, `episode_id`),
  INDEX `fk_user_has_episode_episode1_idx` (`episode_id` ASC),
  INDEX `fk_user_has_episode_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_user_has_episode_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `socialgaming`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_episode_episode1`
    FOREIGN KEY (`episode_id`)
    REFERENCES `socialgaming`.`episode` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `socialgaming`.`score`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `socialgaming`.`score` (
  `episode_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  `score` INT NOT NULL,
  PRIMARY KEY (`episode_id`, `user_id`),
  INDEX `fk_episode_has_user_user1_idx` (`user_id` ASC),
  INDEX `fk_episode_has_user_episode1_idx` (`episode_id` ASC),
  CONSTRAINT `fk_episode_has_user_episode1`
    FOREIGN KEY (`episode_id`)
    REFERENCES `socialgaming`.`episode` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_episode_has_user_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `socialgaming`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
