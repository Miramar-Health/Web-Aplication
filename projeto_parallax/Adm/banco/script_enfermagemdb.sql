use enfermagemdb;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema enfermagemdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema enfermagemdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `enfermagemdb` DEFAULT CHARACTER SET utf8 ;
USE `enfermagemdb` ;

-- -----------------------------------------------------
-- Table `enfermagemdb`.`enfermeiro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermagemdb`.`enfermeiro` (
  `id_enfermeiro` INT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `categoria` VARCHAR(50) NOT NULL,
  `coren` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(60) NOT NULL,
  `situacao` TINYINT NOT NULL,
  `cadastro_admin_id_admin` INT NOT NULL,
  `instituicao_id_instituicao` INT NOT NULL,
  PRIMARY KEY (`id_enfermeiro`),
  INDEX `fk_enfermeiro_cadastro_admin_idx` (`cadastro_admin_id_admin` ASC) ,
  INDEX `fk_enfermeiro_instituicao1_idx` (`instituicao_id_instituicao` ASC) ,
  CONSTRAINT `fk_enfermeiro_cadastro_admin`
    FOREIGN KEY (`cadastro_admin_id_admin`)
    REFERENCES `enfermagemdb`.`cadastro_admin` (`id_admin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_enfermeiro_instituicao1`
    FOREIGN KEY (`instituicao_id_instituicao`)
    REFERENCES `enfermagemdb`.`instituicao` (`id_instituicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enfermagemdb`.`instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermagemdb`.`instituicao` (
  `id_instituicao` INT NOT NULL AUTO_INCREMENT,
  `nome_instituicao` VARCHAR(50) NOT NULL,
  `enfermeiro_id_enfermeiro` INT NOT NULL,
  PRIMARY KEY (`id_instituicao`),
  INDEX `fk_instituicao_enfermeiro1_idx` (`enfermeiro_id_enfermeiro` ASC) ,
  CONSTRAINT `fk_instituicao_enfermeiro1`
    FOREIGN KEY (`enfermeiro_id_enfermeiro`)
    REFERENCES `enfermagemdb`.`enfermeiro` (`id_enfermeiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enfermagemdb`.`cadastro_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermagemdb`.`cadastro_admin` (
  `id_admin` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `categoria` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(60) NOT NULL,
  `instituicao_id_instituicao` INT NOT NULL,
  PRIMARY KEY (`id_admin`),
  INDEX `fk_cadastro_admin_instituicao1_idx` (`instituicao_id_instituicao` ASC) ,
  CONSTRAINT `fk_cadastro_admin_instituicao1`
    FOREIGN KEY (`instituicao_id_instituicao`)
    REFERENCES `enfermagemdb`.`instituicao` (`id_instituicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enfermagemdb`.`tecnico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermagemdb`.`tecnico` (
  `id_tecnico` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `categoria` VARCHAR(60) NOT NULL,
  `coren` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(60) NOT NULL,
  `situacao` TINYINT NOT NULL,
  `celular` VARCHAR(10) NOT NULL,
  `cadastro_admin_id_admin` INT NOT NULL,
  `enfermeiro_id_enfermeiro` INT NOT NULL,
  `instituicao_id_instituicao` INT NOT NULL,
  PRIMARY KEY (`id_tecnico`),
  UNIQUE INDEX `coren_UNIQUE` (`coren` ASC) ,
  INDEX `fk_tecnico_cadastro_admin1_idx` (`cadastro_admin_id_admin` ASC) ,
  INDEX `fk_tecnico_enfermeiro1_idx` (`enfermeiro_id_enfermeiro` ASC) ,
  INDEX `fk_tecnico_instituicao1_idx` (`instituicao_id_instituicao` ASC) ,
  CONSTRAINT `fk_tecnico_cadastro_admin1`
    FOREIGN KEY (`cadastro_admin_id_admin`)
    REFERENCES `enfermagemdb`.`cadastro_admin` (`id_admin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tecnico_enfermeiro1`
    FOREIGN KEY (`enfermeiro_id_enfermeiro`)
    REFERENCES `enfermagemdb`.`enfermeiro` (`id_enfermeiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tecnico_instituicao1`
    FOREIGN KEY (`instituicao_id_instituicao`)
    REFERENCES `enfermagemdb`.`instituicao` (`id_instituicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enfermagemdb`.`paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermagemdb`.`paciente` (
  `id_paciente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(60) NOT NULL,
  `local_ferida` VARCHAR(110) NOT NULL,
  `descricao_inicial_ferida` VARCHAR(400) NOT NULL,
  `data_cadastro` TIMESTAMP NOT NULL,
  `tecnico_id_tecnico` INT NOT NULL,
  PRIMARY KEY (`id_paciente`),
  INDEX `fk_paciente_tecnico1_idx` (`tecnico_id_tecnico` ASC) ,
  CONSTRAINT `fk_paciente_tecnico1`
    FOREIGN KEY (`tecnico_id_tecnico`)
    REFERENCES `enfermagemdb`.`tecnico` (`id_tecnico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enfermagemdb`.`endereco_paciente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermagemdb`.`endereco_paciente` (
  `id_end` INT NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(60) NOT NULL,
  `bairro` VARCHAR(60) NOT NULL,
  `cidade` VARCHAR(30) NOT NULL,
  `estado` VARCHAR(30) NOT NULL,
  `paciente_id_paciente` INT NOT NULL,
  PRIMARY KEY (`id_end`),
  INDEX `fk_endereco_paciente_paciente1_idx` (`paciente_id_paciente` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enfermagemdb`.`registro_atendimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `enfermagemdb`.`registro_atendimento` (
  `id_atendimento` INT NOT NULL AUTO_INCREMENT,
  `tipo_ferida` VARCHAR(100) NOT NULL,
  `img_ferida` VARCHAR(60) NOT NULL,
  `descricao_ferida` VARCHAR(500) NOT NULL,
  `data_atendimento` TIMESTAMP NOT NULL,
  `cobertura_realizada` VARCHAR(200) NOT NULL,
  `tecnico_id_tecnico` INT NOT NULL,
  PRIMARY KEY (`id_atendimento`),
  INDEX `fk_registro_atendimento_tecnico1_idx` (`tecnico_id_tecnico` ASC) ,
  CONSTRAINT `fk_registro_atendimento_tecnico1`
    FOREIGN KEY (`tecnico_id_tecnico`)
    REFERENCES `enfermagemdb`.`tecnico` (`id_tecnico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-------------------------------------------------
-- Store Procedure inserir o administrador --
-------------------------------------------------
delimiter //
create procedure sp_insert_adm (nome_adm varchar(60)
,cpf varchar(11)
,categoria varchar(60)
,email varchar(60)
,senha varchar(60)
,instituicao int)

begin
	insert into cadastro_admin (nome,cpf,categoria,email,senha,instituicao_id_instituicao)
		values (nome_adm, cpf , categoria, email, senha, instituicao);
end//
-------------------------------------------------
-- Store Procedure inserir endereço do cliente --
-------------------------------------------------
delimiter //
create procedure sp_insert_endereco_cliente (rua varchar(60)
, bairro varchar(60)
, cidade varchar(30)
, estado varchar(30)
, paciente int)

begin
	insert into endereco_cliente (rua,bairro,cidade,estado,paciente_id_paciente)
		values (rua, bairro, cidade, estado, paciente);

end//

-------------------------------------------------
-- Store Procedure inserir enfermeiro --
-------------------------------------------------
delimiter //
create procedure sp_insert_enfermeiro (nome varchar(60),cpf varchar(11),categoria varchar(50),coren varchar(60),email varchar(60),senha varchar(60)
,situacao TINYINT
,id_adm int
,instituicao int)

begin
	insert into enfermeiro (nome,cpf,categoria,coren,email,senha,situacao,cadastro_admin_id_admin,instituicao_id_instituicao)
		values (nome
,cpf
,categoria
,coren
,email
,senha
,situacao
,id_adm
,instituicao);

end//

-------------------------------------------------
-- Store Procedure inserir instituicao --
-------------------------------------------------
delimiter //
create procedure instituicao (nome_instituicao varchar(50), id_enfermeiro int)

begin 
	insert into instituicao (nome_instituicao, id_enfermeiro)
		values (nome_instituicao,enfermeiro_id_enfermeiro);
end//

delimiter //
create procedure paciente (nome varchar(60), local_ferida varchar(110), descricao_inicial_ferida varchar(400), data_cadastro timestamp, id_tecnico int)

begin
	insert into paciente (nome, local_ferida, descricao_inicial_ferida, data_cadastro, id_tecnico)
		values (nome,local_ferida,descricao_inicial_ferida,data_cadastro,tecnico_id_tecnico);
end// 

---------------------------------------------------
-- Store Procedure inserir  registro_atendimento --
---------------------------------------------------
delimiter //
create procedure registro_atendimento (tipo_ferida varchar(100), img_ferida varchar(100), descricao_ferida varchar(500), data_atendimento timestamp, cobertura_utilizada varchar(200), id_tecnico int)

begin
	insert into registro_atendimento (tipo_ferida,img_ferida,descricao_ferida,data_atendimento,cobertura_realizada,tecnico_id_tecnico)
		values (tipo_ferida, img_ferida, descricao_ferida, data_atendimento, cobertura_utilizada, id_tecnico);
end//

---------------------------------------------------
-- Store Procedure inserir  tecnico --
---------------------------------------------------
delimiter //
create procedure tecnico (nome varchar(60), cpf varchar(11), categoria varchar(60), coren varchar(60), email varchar(60), senha varchar(60), situacao tinyint, celular varchar(10),id_admin int, id_enfermeiro int, instituicao int)

begin
	insert into tecnico (nome, cpf, categoria, coren, email, senha, situacao, instituicao, celular,cadastro_admin_id_admin,enfermeiro_id_enfermeiro,instituicao_id_instituicao)
		values (nome,cpf,categoria,coren,email,senha,situacao,celular,id_admin,id_enfermeiroid_instituicao);
end//

---------------------------------------------------
-- Store Procedure update tecnico --
---------------------------------------------------
delimiter //
create procedure update_tecnico (id int, nome varchar(60), cpf varchar(11), categoria varchar(60), coren varchar(60), senha varchar(60), situacao tinyint, celular varchar(10),id_admin int, id_enfermeiro int, instituicao int)
begin
	update tecnico set  nome = nome,	
				cpf = cpf,
				categoria = categoria,
                coren = coren,
                senha = senha,
                situacao = situacao,
                celular = celular,
                cadastro_admin_id_admin = id_admin,
                enfermeiro_id_enfermeiro = id_enfermeiro,
                instituicao_id_instituicao = id_instituicao 
                where id_tecnico = id;
end;

---------------------------------------------------
-- Store Procedure Search tecnicos --
---------------------------------------------------
delimiter //
create procedure lista_tecnicos()
begin
	select* from tecnico;
end;

---------------------------------------------------
-- Store Procedure Search a tecnico --
---------------------------------------------------
delimiter // 
create procedure busca_tecnico(id int)
begin
	select* from tecnico where id_tenico = id; 
end;

---------------------------------------------------
-- Store Procedure update registro_atendimento --
---------------------------------------------------
delimiter //
create procedure update_atendimento (id int, tipo_ferida varchar(100), img_ferida varchar(60), descricao_ferida varchar(400), data_atendimento timestamp, cobertura_utilizada varchar(200), id_tecnico int)
begin
	update registro_atendimento set tipo_ferida = tipo_ferida,
								img_ferida = img_ferida,
                                descricao_ferida = descricao_ferida,
                                data_atendimento = data_atendimento,
                                cobertura_realizada = cobertura_realizada,
                                tecnico_id_tecnico = id_tecnico
                                where id_atendimento = id;
end;

---------------------------------------------------
-- Store Procedure search paciente --
---------------------------------------------------
delimiter //
create procedure lista_paciente(nome varchar(60))
begin
	select * from paciente where nome = nome;
end;

---------------------------------------------------
-- Store Procedure update paciente --
---------------------------------------------------
delimiter //
create procedure update_paciente (id int, nome varchar(60), local_ferida varchar(110), descricao_inical_ferida varchar(400), data_cadastro timestamp, id_tecnico int)
begin
	update paciente set nome = nome,
					local_ferida = local_ferida,
                    descricao_inicial_feirida = descricao_inicial_ferida,
                    data_cadastro = data_casdastro,
                    tecnico_id_tecnico = id_tecnico
                    where id_paciente = id;
end;

---------------------------------------------------
-- Store Procedure search atendimento --
---------------------------------------------------
delimiter //
create procedure lista_atendimentos_tecnico(id int)
begin 
	select * from registro_atendimento where id_tecnico = id;
end;

---------------------------------------------------
-- Store Procedure search atendimento paciente --
---------------------------------------------------
delimiter //
create procedure lista_atendimentos_paciente(id int)
begin 
	select * from registro_atendimento where id_paciente = id;
end;

---------------------------------------------------
-- Store Procedure update instituicao --
---------------------------------------------------
delimiter //
create procedure update_instituicao (id int, nome_instituicao varchar(50))
begin
	update instituicao set nome_instituicao = nome_instituicao
					   where id_instituicao = id;
end;

---------------------------------------------------
-- Store Procedure search instituicao --
---------------------------------------------------
delimiter //
create procedure lista_instituicao(id int)
begin 
	select * from instituicao where id_instituicao = id;
end;

---------------------------------------------------
-- Store Procedure update enfermeiro --
---------------------------------------------------
delimiter //
create procedure update_enfermeiro (id int, nome varchar(60), cpf varchar(11), categoria varchar(60), coren varchar(60), email varchar(60), senha varchar(60), situacao tinyint, id_admin int, id_instituicao int)
begin
	update enfermeiro set nome = nome,
					cpf = cpf,
					categoria = categoria,
                    coren = coren,
                    email = email,
                    senha = senha,
                    situicao = situacao,
                    cadastro_admin_id_admin = id_admin,
                    instituicao_id_instituicao = id_instituicao
                    where id_enfermeiro = id;
end;

---------------------------------------------------
-- Store Procedure search enfermeiro --
---------------------------------------------------
delimiter //
create procedure lista_enfermeiros (id int)
begin
	select * from enfermeiro where id_enfermeiro = id;
end;

---------------------------------------------------
-- Store Procedure update endereço_paciente --
---------------------------------------------------
delimiter //
create procedure update_end_paciente(id int, rua varchar(60), bairro varchar(60), cidade varchar(30), estado varchar(30), id_paciente int)
begin
	update endereco_paciente set rua = rua,
						bairro = bairro,
                        cidade = cidade,
                        estado = estado,
                        paciente_id_paciente = id_paciente
                        where id_enfermeiro = id;
end;

---------------------------------------------------
-- Store Procedure search endereço_paciente --
---------------------------------------------------



---------------------------------------------------
-- Store Procedure update administrador --
---------------------------------------------------
delimiter //
create procedure update_admin(id int, nome varchar(60), cpf varchar(11), categoria varchar(60), email varchar(60), senha varchar(60))
begin
	update cadastro_admin set nome = nome,
						cpf = cpf,
                        categoria =  categoria,
                        email = email,
                        senha = senha
                        where id_admin = id;
end;

---------------------------------------------------
-- Store Procedure search administrador --
---------------------------------------------------
delimiter //
create procedure lista_admin(id int)
begin
	select * from cadastro_admin where id_admin = id;
end;


