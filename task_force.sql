SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `task_force` DEFAULT CHARACTER SET utf8 ;
USE `task_force` ;

-- -----------------------------------------------------
-- Table `locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locations` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(80) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `resumes_of_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `resumes_of_tasks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `start_point` DATETIME NULL,
  `short_name` TINYTEXT NULL,
  `resume` LONGTEXT NULL,
  `status` TINYINT NULL,
  `location_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `location_id_idx` (`location_id` ASC) ,
  CONSTRAINT `location_id`
    FOREIGN KEY (`location_id`)
    REFERENCES `locations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users_profiles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users_profiles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(80) NOT NULL,
  `avatar` VARCHAR(80) NULL,
  `email` VARCHAR(80) NULL,
  `birthday` DATE NULL,
  `phone_number` VARCHAR(20) NULL,
  `telegram` VARCHAR(80) NULL,
  `resume` TEXT NULL,
  `account_registration_date` DATE NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tasks_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tasks_list` (
  `task_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `task_start_time` TIMESTAMP NULL,
  `task_end_time` TIMESTAMP NULL,
  UNIQUE INDEX `task_id_UNIQUE` (`task_id` ASC) ,
  INDEX `user_id_idx` (`user_id` ASC) ,
  CONSTRAINT `user_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `users_profiles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `task_id`
    FOREIGN KEY (`task_id`)
    REFERENCES `resumes_of_tasks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `specialization_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `specialization_list` (
  `specialization_id` INT UNSIGNED NOT NULL,
  `specialization_name` VARCHAR(80) NULL,
  PRIMARY KEY (`specialization_id`),
  UNIQUE INDEX `specialization_id_UNIQUE` (`specialization_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users_specialisations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users_specialisations` (
  `user_id` INT UNSIGNED NOT NULL,
  `specialisation_id` INT UNSIGNED NULL,
  INDEX `user_id_idx` (`user_id` ASC) ,
  INDEX `specialisation_id_idx` (`specialisation_id` ASC) ,
  CONSTRAINT `user_id_`
    FOREIGN KEY (`user_id`)
    REFERENCES `users_profiles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `specialisation_id`
    FOREIGN KEY (`specialisation_id`)
    REFERENCES `specialization_list` (`specialization_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
