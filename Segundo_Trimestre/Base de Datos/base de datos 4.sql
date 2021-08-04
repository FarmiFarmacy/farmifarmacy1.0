create database farmifarmacy;
use farmifarmacy;

create table usuario (
    id_usuario int not null,
    tipo_documento_t_doc int not null,
    nombres varchar(20) not null,
    apellidos varchar(20) not null,
    direccion varchar(45) not null,
    teléfono int(30) not null,
    email varchar(30) not null,
    estado_usuario tinyint not null,
    carro_de_compras_cod_carro int not null,
    primary key (id_usuario)
);

create table tipo_documento (
    t_doc int not null,
    desc_tdoc varchar(30) not null,
    estado_tdoc tinyint not null,
    primary key (t_doc)
);

create table carro_de_compras (
    cod_carro int not null,
    fecha date not null,
    subtotal int(50) not null,
    estado_carro tinyint not null,
    venta_cod_venta int not null,
    primary key (cod_carro, venta_cod_venta)
);

create table venta (
    cod_venta int not null,
    total int(50) not null,
    estado_venta tinyint not null,
    primary key (cod_venta)
);

create table producto (
    cod_producto int(20) not null,
    cantidad int(10) not null,
    descripcion varchar(45) not null,
    valor_unitario int(50) not null,
    imagen varchar(45) not null,
    estado_producto tinyint not null,
    usuario_id_usuario varchar(30) not null,
    lote_cod_lote varchar(20) not null,
    primary key (cod_producto, usuario_id_usuario)
);

create table lote (
    cod_lote varchar(20) not null,
    estado_lote tinyint not null,
    primary key (cod_lote)
); 

create table rol (
    cod_rol int not null,
    rol varchar(20) not null,
    estado_rol tinyint not null,
    primary key (cod_rol)
);

create table usuario_has_rol (
    usuario_id_usuario int not null,
    rol_cod_rol int not null,
    primary key (usuario_id_usuario, rol_cod_rol)
);

alter table usuario_has_rol add
foreign key (usuario_id_usuario)
references usuario (id_usuario);

alter table usuario_has_rol add
foreign key (rol_cod_rol)
references rol (cod_rol);

alter table producto add
foreign key (lote_cod_lote)
references lote (cod_lote);

alter table producto add
foreign key (usuario_id_usuario)
references usuario (id_usuario);

alter table carro_de_compras add
foreign key (venta_cod_venta)
references venta (cod_venta);

alter table usuario add
foreign key (carro_de_compras_cod_carro)
references carro_de_compras (cod_carro);

alter table usuario add
foreign key (tipo_documento_t_doc)
references tipo_documento (t_doc);