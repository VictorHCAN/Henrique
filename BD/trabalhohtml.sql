create database formulario2;
use formulario2;

create table usuario(
matricula int unsigned auto_increment not null primary key,
dif int,
nome varchar(80),
email varchar(100),
senha varchar(30),
telefone char(14),
sexo varchar(20),
data_nasc datetime,
cidade varchar(100),
estado varchar(100),
endereco varchar(150)
);

drop database formulario2;