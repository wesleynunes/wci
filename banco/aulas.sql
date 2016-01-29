CREATE DATABASE IF NOT EXISTS aulas; 

--
-- CRIAR TABELA USUARIOS
--
CREATE TABLE IF NOT EXISTS ci(
	id tinyint(11) not null auto_increment,
	nome varchar(50) not null,
	email varchar(50) not null, 
	login varchar(25) not null,
	senha varchar(32) not null,
	PRIMARY KEY(id),
	UNIQUE INDEX email_UNIQUE (email ASC),
	UNIQUE INDEX login_UNIQUE (login ASC)
)ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `uploads` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`img_name` varchar(32) NOT NULL,
`thumb_name` varchar(32) NOT NULL,
`ext` varchar(8) NOT NULL,
`upload_date` varchar(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;
