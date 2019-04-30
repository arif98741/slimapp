create table customers(
	id int(11) not null AUTO_INCREMENT,
	first_name varchar(100) not null,
	last_name  varchar(100) not null,
	phone      varchar(100) not null,
	email      varchar(100) not null,
	address    varchar(100) not null,
	city       varchar(100) not null,
	state      varchar(100) not null,
	primary key(id)
);