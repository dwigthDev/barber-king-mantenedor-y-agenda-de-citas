drop database if exists barberia;
create database barberia;
use barberia;
/*se crean primero las que no lleva fk*/
create table cliente (
 rut_cliente varchar(45) PRIMARY KEY   not null,
 nombre_cliente varchar(45) not null,
 apellido_cliente varchar(45)  null,
 edad_cliente int  null,
 telefono_cliente varchar(45)
);
create table sede (
id_sede int PRIMARY KEY not null auto_increment,
nombre_sede varchar(50) not null,
direccion_sede varchar(45) not null
);

/*ahora las que llevan fk*/
create table barbero (
 id_barbero varchar(45) PRIMARY KEY not null,
 nombre_barbero varchar(45) not null,
 apellido_barbero varchar(45) not null,
 edad_barbero int not null,
 fk_sede_barbero int,
 foreign key ( fk_sede_barbero) references sede (id_sede)
 
);

create table cita (
id_citas int PRIMARY KEY not null auto_increment,
hora_cita time not null,
fecha_cita date not null,
fecha_emision_cita date not null,
fk_rut_cliente varchar(15),
fk_id_sede int,
foreign key (fk_rut_cliente) references cliente (rut_cliente),
foreign key (fk_id_sede) references sede (id_sede)
);

create table usuario (
id_usuario int PRIMARY KEY not null auto_increment,
contraseña_usuario varchar(45) not null,
gmail_usuario varchar(45) not null,
fk_rut_cliente_us varchar(15),
foreign key (fk_rut_cliente_us) references cliente (rut_cliente)
);




