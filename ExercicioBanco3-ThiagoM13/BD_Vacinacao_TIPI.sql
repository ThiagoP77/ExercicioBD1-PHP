-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema tipi_vacinacao
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `tipi_vacinacao` ;

-- -----------------------------------------------------
-- Schema tipi_vacinacao
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tipi_vacinacao` DEFAULT CHARACTER SET utf8 ;
USE `tipi_vacinacao` ;

-- -----------------------------------------------------
-- Table `tipi_vacinacao`.`Vacina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tipi_vacinacao`.`Vacina` ;

CREATE TABLE IF NOT EXISTS `tipi_vacinacao`.`Vacina` (
  `idVacina` INT NOT NULL AUTO_INCREMENT,
  `nomeVacina` VARCHAR(255) NULL,
  `qtdeDoses` INT NULL,
  PRIMARY KEY (`idVacina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tipi_vacinacao`.`Paciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tipi_vacinacao`.`Paciente` ;

CREATE TABLE IF NOT EXISTS `tipi_vacinacao`.`Paciente` (
  `idPaciente` INT NOT NULL AUTO_INCREMENT,
  `nomePaciente` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `dtDose1` DATE NULL,
  `dtDose2` DATE NULL,
  `precisaDose2` INT NOT NULL,
  `idVacina` INT NOT NULL,
  PRIMARY KEY (`idPaciente`),
  INDEX `fk_Paciente_Vacina1_idx` (`idVacina` ASC),
  CONSTRAINT `fk_Paciente_Vacina1`
    FOREIGN KEY (`idVacina`)
    REFERENCES `tipi_vacinacao`.`Vacina` (`idVacina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `tipi_vacinacao`.`Vacina`
-- -----------------------------------------------------
START TRANSACTION;
USE `tipi_vacinacao`;
INSERT INTO `tipi_vacinacao`.`Vacina` (`idVacina`, `nomeVacina`, `qtdeDoses`) VALUES (1, 'CoronaVac', 2);
INSERT INTO `tipi_vacinacao`.`Vacina` (`idVacina`, `nomeVacina`, `qtdeDoses`) VALUES (2, 'AstraZeneca', 2);
INSERT INTO `tipi_vacinacao`.`Vacina` (`idVacina`, `nomeVacina`, `qtdeDoses`) VALUES (3, 'Pfizer', 2);
INSERT INTO `tipi_vacinacao`.`Vacina` (`idVacina`, `nomeVacina`, `qtdeDoses`) VALUES (4, 'BCG', 1);
INSERT INTO `tipi_vacinacao`.`Vacina` (`idVacina`, `nomeVacina`, `qtdeDoses`) VALUES (5, 'Gripe', 1);
INSERT INTO `tipi_vacinacao`.`Vacina` (`idVacina`, `nomeVacina`, `qtdeDoses`) VALUES (6, 'Polio', 1);
INSERT INTO `tipi_vacinacao`.`Vacina` (`idVacina`, `nomeVacina`, `qtdeDoses`) VALUES (7, 'Sarampo', 1);

COMMIT;

