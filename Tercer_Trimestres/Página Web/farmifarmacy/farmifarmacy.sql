create database farmifarmacy;
use database farmifarmacy;

create table categoria (
    id int(11) not null,
    nombre varchar(60) not null,
    primary key (id);
);

create table grupo_usuario (
    id int(11) not null,
    nombre_grupo varchar(150) not null,
    nivel_grupo int(11) not null,
    estado_grupo int(11) not null,
    primary key (id)
);

create table media (
    id int(11) not null,
    nombre_archivo varchar(225) not null,
    tipo_archivo varchar(100) not null,
    primary key (id)
);

create table producto (
    id int(11) not null,
    nombre varchar(225) not null,
    cantidad varchar(50) null,
    precio_compra decimal(25.0) null,
    precio_venta decimal(25.0) not null,
    id_categoria int(11) not null,
    id_media int(11) null,
    fecha datetime not null,
    primary key (id)
);

create table usuario (
    id int(11) not null,
    nombre varchar(60) not null,
    nombre_usuario varchar(60) not null,
    contraseña varchar(225) not null,
    nivel_usuario int(11) not null,
    imagen varchar(225) null,
    estado int(1) not null,
    último_acceso datetime null,
    primary key (id)
);

create table venta (
    id int(11) not null,
    id_producto int(11) not null,
    cantidad int(11) not null,
    precio decimal(25.0) no null,
    fecha date not null,
    primary key (id)
);