create database lusonay_imobiliaria
default character set utf8
default collate utf8_general_ci;
use lusonay_imobiliaria;

select * from user;

create table user(
cod_user int not null auto_increment,
num_utilizador varchar(20) not null, 
senha varchar(255) not null, 
nome varchar(50) not null,
email varchar(100) not null,
telefone varchar(50) not null,
primary key (cod_user)
)default CHARSET=utf8;


create table localizacao(
cod_localizacao int not null auto_increment,
pais varchar(50) not null, 
regiao varchar(100) not null, 
localidade varchar(100) not null,
municipio varchar(100) not null,
primary key (cod_localizacao)
)default CHARSET=utf8;


create table casa(
cod_casa int not null auto_increment,
cod_local int not null,
cod_imagem_fk int not null,
preco double not null, 
data_registo date not null,
estado varchar(255) not null,
tipo_negocio varchar(255) not null, 
tipologia varchar(255) not null, 
mobilada varchar(100) not null,
wcs int not null,
desc_interior text not null,
desc_exterior text not null,
telefone varchar(20) not null,
email varchar(100) ,
primary key (cod_casa),
FOREIGN KEY (cod_local) references localizacao(cod_localizacao),
FOREIGN KEY (cod_imagem_fk) references imagem(cod_imagem)
)default CHARSET=utf8;

drop table veiculo;

create table imagem(
cod_imagem int not null auto_increment,
foto_principal varchar(255) not null, 
foto1 varchar(255) not null, 
foto2 varchar(255) not null, 
foto3 varchar(255) not null, 
foto4 varchar(255) not null, 
primary key (cod_imagem)
)default CHARSET=utf8;


create table veiculo(
cod_veiculo int not null auto_increment,
cod_local_fk int not null,
cod_imagem_fk int not null,
preco double not null, 
data_registo date not null,
estado varchar(255) not null,
tipo_negocio varchar(255) not null, 
airbag varchar(255) not null, 
arcondicionado varchar(100) not null,
ele_seguranca varchar(255) not null,
equipam_interior varchar(255) not null,
kilometragem varchar(100) not null,
caixa_velocidade varchar(100) not null,
tipo varchar(100) not null,
modelo varchar(100) not null,
marca varchar(100) not null,
matricula varchar(100) not null,
cor varchar(100) not null,
comustivel varchar(100) not null,
telefone varchar(20) not null,
email varchar(100) ,
primary key (cod_veiculo),
FOREIGN KEY (cod_local_fk) references localizacao(cod_localizacao),
FOREIGN KEY (cod_imagem_fk) references imagem(cod_imagem)
)default CHARSET=utf8;


create table terreno(
cod_terreno int not null auto_increment,
cod_local_fk int not null,
cod_imagem_fk int not null,
preco double not null, 
data_registo date not null,
estado varchar(255) not null,
dimensao varchar(100) not null, 
descricao text not null, 
tipo_de_negocio varchar(255) not null,
telefone varchar(20) not null,
email varchar(100) ,
primary key (cod_terreno),
FOREIGN KEY (cod_local_fk) references localizacao(cod_localizacao),
FOREIGN KEY (cod_imagem_fk) references imagem(cod_imagem)
)default CHARSET=utf8;

desc terreno;
create table newsletter(
cod_fk int not null auto_increment,
email varchar(255) not null, 
primary key (cod_fk)
)default CHARSET=utf8;


create table teste(
cod int not null auto_increment,
valor double  not null, 
primary key (cod)
)default CHARSET=utf8;

insert into teste (valor) value (1.000,00);

insert into newsletter (email) valueS ('FF@GMAIL.COM');
-- alter table
use lusonay;
alter table casa 
add column prioridade int;
alter table terreno
add column prioridade int;
alter table veiculo
add column prioridade int;
alter table terreno
add column desc_exterior text not null;
alter table terreno
add column desc_interior text not null;
alter table terreno
drop column descricao;
alter table veiculo
rename column matricula;
desc veiculo;
INSERT INTO terreno (cod_local_fk,cod_imagem_fk, preco, estado, tipo_de_negocio, 
			dimensao, telefone, email, data_registo, desc_exterior, desc_interior, prioridade) 
         VALUES (1,2,11111,'novo','venda','2/2','999999','ff@gmail.com','2022-02-25','kkk','ppp',0);
UPDATE terreno  SET preco=1111 ,estado='usado',tipo_de_negocio='venda', 
			dimensao='2/7', telefone='2345', email='ff@gmail.com', desc_exterior='gn', desc_interior='rfg', prioridade=0 WHERE cod_terreno=2;

SELECT Max(cod_imagem) as codigo FROM  imagem;
SELECT Max(cod_localizacao) as codigo FROM localizacao;
select * from terreno, localizacao,imagem  where terreno.cod_local_fk=localizacao.cod_localizacao 
AND terreno.cod_imagem_fk=imagem.cod_imagem  order by cod_terreno desc;
select * from casa;
select * from veiculo;
select * from localizacao;
select * from terreno;
select * from imagem;
delete  from localizacao where cod_localizacao between 7 and 8;
select * from casa, localizacao,imagem  where casa.cod_local=localizacao.cod_localizacao AND casa.cod_imagem_fk=imagem.cod_imagem  order by cod_casa desc;
select * from casa, localizacao,imagem  where casa.cod_local=localizacao.cod_localizacao 
		AND casa.cod_imagem_fk=imagem.cod_imagem and cod_casa=1;
select * from terreno, localizacao,imagem  where terreno.cod_local_fk=localizacao.cod_localizacao AND terreno.cod_imagem_fk=imagem.cod_imagem  order by cod_terreno desc;
select * from veiculo, localizacao,imagem  where veiculo.cod_local_fk=localizacao.cod_localizacao 
		AND veiculo.cod_imagem_fk=imagem.cod_imagem  AND cod_veiculo=3;
select * from terreno;
delete from terreno where cod_terreno=1;
select count(*) as total from casa;

select * from terreno limit 5;