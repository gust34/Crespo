drop database bdcrespo;

create database bdcrespo;

use bdcrespo;

create table login(
user varchar(30) not null primary key,
senha varchar(30) not null
);

CREATE TABLE imoveis(
Cod_Im INT PRIMARY KEY AUTO_INCREMENT,
nome varchar (100) not null,
tipo varchar (30) not null,
categoria varchar (30) not null,
bairro varchar (30) not null,
qsuite int null,
qquarto int not null,
areatotal decimal(7,2) not null,
areaconstruida decimal(7,2) not null,
qreformas int not null,
qvaga int not null,
qbanheiro int not null,
crad varchar (3) not null,
cond varchar (50) null,
cad1 varchar (30) null,
cad2 varchar (30) null,
cad3 varchar (30) null,
cad4 varchar (30) null,
cad5 varchar (30) null,
cad6 varchar (30) null,
cad7 varchar (30) null,
cad8 varchar (30) null,
cad9 varchar (30) null,
cad10 varchar (30) null,
descricao varchar (200) null,
foto longblob null,
foto2 longblob null,
foto3 longblob null,
foto4 longblob null,
foto5 longblob null,
foto6 longblob null,
foto7 longblob null,
foto8 longblob null,
foto9 longblob null,
foto10 longblob null,
PrecoDeVenda decimal(9,2) NOT NULL,
PrecoDeAluguel decimal(9,2) NOT NULL,
home boolean not null
);


INSERT INTO `bdcrespo`.`login` ( `user`, `senha`) VALUES ('teste', 'teste123');

INSERT INTO `bdcrespo`.`imoveis` (`Cod_Im`, `nome`, `tipo`, `categoria`, `bairro`, `qquarto`, `areatotal`, `areaconstruida`, `qvaga`, `qbanheiro`, `qsuite`, `crad`, `descricao`, `foto`, `PrecoDeVenda`, `PrecoDeAluguel`, `home`, `qreformas`) VALUES ('1', 'Casa', 'Apartamento', 'Compra', 'Rochdale', '2', '3 m', '2 m', '3', '2', '1', 'Não', 'Casa topzera', 'Sei lá', 'R$12', 'R$6', ' ','0');


select * from login;
select * from imoveis;