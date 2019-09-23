CREATE TABLE usuarios ( 
	id_usuario int AUTO_INCREMENT PRIMARY KEY, 
	nome varchar(100) NOT NULL, 
	email varchar(100) NOT NULL, 
	senha varchar(32) NOT NULL
);