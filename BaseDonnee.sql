create table association
(
	id int auto_increment
		primary key,
	idUser int not null,
	idComputer int not null
)
;

create index association_computers_id_fk
	on association (idComputer)
;

create index association_users_id_fk
	on association (idUser)
;

create table computers
(
	id int auto_increment
		primary key,
	nom varchar(50) null,
	marque varchar(50) null
)
;

alter table association
	add constraint association_computers_id_fk
		foreign key (idComputer) references computers (id)
;

create table users
(
	id int auto_increment
		primary key,
	nom varchar(50) null,
	prenom varchar(50) null
)
;

alter table association
	add constraint association_users_id_fk
		foreign key (idUser) references users (id)
;
