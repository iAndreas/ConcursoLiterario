-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema conclit
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema conclit
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `conclit` DEFAULT CHARACTER SET latin1 ;
USE `conclit` ;

-- -----------------------------------------------------
-- Table `conclit`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`adm` (
  `idAdm` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAdm`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `conclit`.`pre_cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`pre_cadastro` (
  `idCadastro` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `matricula` VARCHAR(45) NOT NULL,
  `hash` VARCHAR(45) NULL,
  PRIMARY KEY (`idCadastro`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `conclit`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`aluno` (
  `idAluno` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `unidadeInstituicao` VARCHAR(45) NOT NULL,
  `pre_cadastro_idCadastro` INT(11) NOT NULL,
  PRIMARY KEY (`idAluno`),
  INDEX `fk_aluno_pre_cadastro1_idx` (`pre_cadastro_idCadastro` ASC),
  UNIQUE INDEX `pre_cadastro_idCadastro_UNIQUE` (`pre_cadastro_idCadastro` ASC),
  CONSTRAINT `fk_aluno_pre_cadastro1`
    FOREIGN KEY (`pre_cadastro_idCadastro`)
    REFERENCES `conclit`.`pre_cadastro` (`idCadastro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `conclit`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`categoria` (
  `idCategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `conclit`.`concurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`concurso` (
  `idconcurso` INT NOT NULL AUTO_INCREMENT,
  `regulamento` VARCHAR(45) NOT NULL,
  `dataI` DATE NOT NULL,
  `dataF` DATE NOT NULL,
  PRIMARY KEY (`idconcurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conclit`.`inscricaotexto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`inscricaotexto` (
  `numInscri` INT(11) NOT NULL AUTO_INCREMENT,
  `pseudonimo` VARCHAR(45) NOT NULL,
  `turma` VARCHAR(45) NOT NULL,
  `concurso_idconcurso` INT NOT NULL,
  PRIMARY KEY (`numInscri`),
  INDEX `fk_inscricaotexto_concurso1_idx` (`concurso_idconcurso` ASC),
  CONSTRAINT `fk_inscricaotexto_concurso1`
    FOREIGN KEY (`concurso_idconcurso`)
    REFERENCES `conclit`.`concurso` (`idconcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `conclit`.`jurado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`jurado` (
  `idJurado` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idJurado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `conclit`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`avaliacao` (
  `idavaliadores` INT NOT NULL AUTO_INCREMENT,
  `nota` VARCHAR(45) NOT NULL,
  `observacao` VARCHAR(200) NULL,
  `data` DATE NOT NULL,
  `jurado_idJurado` INT(11) NOT NULL,
  `inscricaotexto_numInscri` INT(11) NOT NULL,
  PRIMARY KEY (`idavaliadores`),
  UNIQUE INDEX `idavaliadores_UNIQUE` (`idavaliadores` ASC),
  INDEX `fk_avaliadores_jurado1_idx` (`jurado_idJurado` ASC),
  INDEX `fk_avaliadores_inscricaotexto1_idx` (`inscricaotexto_numInscri` ASC),
  CONSTRAINT `fk_avaliadores_jurado1`
    FOREIGN KEY (`jurado_idJurado`)
    REFERENCES `conclit`.`jurado` (`idJurado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliadores_inscricaotexto1`
    FOREIGN KEY (`inscricaotexto_numInscri`)
    REFERENCES `conclit`.`inscricaotexto` (`numInscri`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conclit`.`aluno_has_inscricaoTexto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`aluno_has_inscricaoTexto` (
  `aluno_idAluno` INT(11) NOT NULL,
  `inscricaotexto_numInscri` INT(11) NOT NULL,
  `categoria_idCategoria` INT(11) NOT NULL,
  INDEX `fk_aluno_has_inscricaoTexto_aluno1_idx` (`aluno_idAluno` ASC),
  INDEX `fk_aluno_has_inscricaoTexto_inscricaotexto1_idx` (`inscricaotexto_numInscri` ASC),
  INDEX `fk_aluno_has_inscricaoTexto_categoria1_idx` (`categoria_idCategoria` ASC),
  CONSTRAINT `fk_aluno_has_inscricaoTexto_aluno1`
    FOREIGN KEY (`aluno_idAluno`)
    REFERENCES `conclit`.`aluno` (`idAluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_has_inscricaoTexto_inscricaotexto1`
    FOREIGN KEY (`inscricaotexto_numInscri`)
    REFERENCES `conclit`.`inscricaotexto` (`numInscri`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluno_has_inscricaoTexto_categoria1`
    FOREIGN KEY (`categoria_idCategoria`)
    REFERENCES `conclit`.`categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `conclit`.`resultadoFinal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `conclit`.`resultadoFinal` (
  `idresultadoFinal` INT NOT NULL AUTO_INCREMENT,
  `colocacao` VARCHAR(45) NOT NULL,
  `notaFinal` VARCHAR(45) NOT NULL,
  `observacao` VARCHAR(45) NULL,
  `inscricaotexto_numInscri` INT(11) NOT NULL,
  PRIMARY KEY (`idresultadoFinal`),
  INDEX `fk_resultadoFinal_inscricaotexto1_idx` (`inscricaotexto_numInscri` ASC),
  CONSTRAINT `fk_resultadoFinal_inscricaotexto1`
    FOREIGN KEY (`inscricaotexto_numInscri`)
    REFERENCES `conclit`.`inscricaotexto` (`numInscri`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

# INSERT INTO `conclit`.`pre_cadastro` (`idCadastro`, `email`, `matricula`) VALUES ('1', 'andregehgoncalvesz@gmail.com', '2017306663');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
