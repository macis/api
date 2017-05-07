-- MySQL Script generated by MySQL Workbench
-- Sun May  7 19:32:30 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema demo
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `demo` ;

-- -----------------------------------------------------
-- Schema demo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `demo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `demo` ;

-- -----------------------------------------------------
-- Table `demo`.`calendar`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `demo`.`calendar` ;

CREATE TABLE IF NOT EXISTS `demo`.`calendar` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `contact` INT(11) NOT NULL,
  `praticien` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `demo`.`organization`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `demo`.`organization` ;

CREATE TABLE IF NOT EXISTS `demo`.`organization` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `demo`.`clients`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `demo`.`clients` ;

CREATE TABLE IF NOT EXISTS `demo`.`clients` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  `deleted` DATETIME NULL,
  `social_number` VARCHAR(255) NULL,
  `lastname` VARCHAR(255) NOT NULL,
  `birthname` VARCHAR(255) NULL DEFAULT NULL,
  `firstname` VARCHAR(255) NOT NULL,
  `title` ENUM('Mr','Mrs','Ms') NOT NULL,
  `gender` ENUM('male','female') NOT NULL,
  `birthdate` DATE NULL DEFAULT NULL,
  `deathdate` DATE NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `postal_code` VARCHAR(255) NULL DEFAULT NULL,
  `city` VARCHAR(255) NULL DEFAULT NULL,
  `country` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `phone_mobile` VARCHAR(255) NULL DEFAULT NULL,
  `phone_pro` VARCHAR(255) NULL DEFAULT NULL,
  `job` VARCHAR(255) NULL DEFAULT NULL,
  `referal_medic` VARCHAR(255) NULL DEFAULT NULL,
  `social_collect` VARCHAR(255) NULL DEFAULT NULL,
  `social_insurance` VARCHAR(255) NULL DEFAULT NULL,
  `marital_status` ENUM('Single','Married','Divorced','Widow') NOT NULL,
  `referal_person` VARCHAR(255) NULL DEFAULT NULL,
  `referal_person_phone` VARCHAR(255) NULL DEFAULT NULL,
  `comment` TEXT NULL DEFAULT NULL,
  `history_medical` TEXT NULL DEFAULT NULL,
  `history_surgical` TEXT NULL DEFAULT NULL,
  `history_gynecological` TEXT NULL DEFAULT NULL,
  `history_family` TEXT NULL DEFAULT NULL,
  `allergy` TEXT NULL DEFAULT NULL,
  `payment_status` ENUM('Ok','No','Delayed') NULL DEFAULT NULL,
  `id_organization` INT(11) NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_clients_organization`
    FOREIGN KEY (`id_organization`)
    REFERENCES `demo`.`organization` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 0
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `social_number` ON `demo`.`clients` (`social_number` ASC);

CREATE INDEX `lastname` ON `demo`.`clients` (`lastname` ASC);

CREATE FULLTEXT INDEX `firstname` ON `demo`.`clients` (`firstname` ASC, `lastname` ASC);

CREATE INDEX `fk_clients_organization_idx` ON `demo`.`clients` (`id_organization` ASC);


-- -----------------------------------------------------
-- Table `demo`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `demo`.`events` ;

CREATE TABLE IF NOT EXISTS `demo`.`events` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `datetime` DATETIME NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `author` INT(11) NOT NULL,
  `type` TEXT NOT NULL,
  `id_calendar` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_events_calendar1`
    FOREIGN KEY (`id_calendar`)
    REFERENCES `demo`.`calendar` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_events_calendar1_idx` ON `demo`.`events` (`id_calendar` ASC);


-- -----------------------------------------------------
-- Table `demo`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `demo`.`users` ;

CREATE TABLE IF NOT EXISTS `demo`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `id_organization` INT(11) NOT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `firstname` VARCHAR(255) NULL DEFAULT NULL,
  `lastname` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_users_organization1`
    FOREIGN KEY (`id_organization`)
    REFERENCES `demo`.`organization` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `idx_username` ON `demo`.`users` (`username` ASC);

CREATE INDEX `fk_users_organization1_idx` ON `demo`.`users` (`id_organization` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `demo`.`organization`
-- -----------------------------------------------------
START TRANSACTION;
USE `demo`;
INSERT INTO `demo`.`organization` (`id`, `name`) VALUES (1, 'demo');

COMMIT;


-- -----------------------------------------------------
-- Data for table `demo`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `demo`;
INSERT INTO `demo`.`users` (`id`, `username`, `password`, `id_organization`, `title`, `firstname`, `lastname`, `email`) VALUES (1, 'root', NULL, 1, NULL, NULL, NULL, NULL);

COMMIT;

