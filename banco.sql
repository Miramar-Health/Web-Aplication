--criando bsnco de dados--
create database aulaphpdb;

--definido banco ativo 
use aulaphpdb;

--criando tabela aluno
create table(
    id int not null autoincrement,
    nome varchar(60) not null,
    cpf varchar(11) unique not null,
    email varchar(60) not null unique,
    data_cad timestamp default current_timestamp
)