SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mandragora_db_dev` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mandragora_db_dev`;

-- -----------------------------------------------------
-- Table `mandragora_db_dev`.`user_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mandragora_db_dev`.`user_types` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(64) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `index2` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mandragora_db_dev`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mandragora_db_dev`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(64) NOT NULL ,
  `user_type_id` INT UNSIGNED NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_1` (`user_type_id` ASC) ,
  UNIQUE INDEX `index3` (`email` ASC) ,
  UNIQUE INDEX `index4` (`username` ASC) ,
  CONSTRAINT `fk_users_1`
    FOREIGN KEY (`user_type_id` )
    REFERENCES `mandragora_db_dev`.`user_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mandragora_db_dev`.`user_types`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `mandragora_db_dev`;
INSERT INTO `user_types` (`id`, `name`) VALUES (1, 'admin');
INSERT INTO `user_types` (`id`, `name`) VALUES (2, 'master');
INSERT INTO `user_types` (`id`, `name`) VALUES (3, 'facilitator');
INSERT INTO `user_types` (`id`, `name`) VALUES (4, 'player');
INSERT INTO `user_types` (`id`, `name`) VALUES (4, 'guest');

COMMIT;
