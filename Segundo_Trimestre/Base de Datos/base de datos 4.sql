create database farmifarmacy;
use farmifarmacy;

create table usuario (
    id_usuario varchar(30) not null,
    tipo_documento_t_doc varchar(4) not null,
    nombres varchar(20) not null,
    apellidos varchar(20) not null,
    direccion varchar(45) not null,
    telefono varchar(20) not null,
    email varchar(30) not null,
    estado_usuario tinyint not null,
    carro_de_compras_cod_carro int not null,
    primary key (id_usuario)
);

create table tipo_documento (
    t_doc varchar(4) not null,
    desc_tdoc varchar(30 not null,
    estado_tdoc tinyint not null,
    primary key (tdoc)
);

create table rol (
    cod_rol varchar(6) not null,
    rol varchar(20) not null,
    estado_rol tinyint not null,
    primary key (cod_rol)
);

create table usuario_has_rol (
    usuario_id_usuario varchar(30) not null,
    rol_cod_rol varchar(6) not null,
    primary key (usuario_id_usuario, rol_cod_rol)
);

create table carro_de_compras (
    cod_carro int not null,
    fecha date not null,
    valor_subtotal int not null,
    estado tinyint not null,
    venta_cod_venta int not null,
    primary key (cod_carro, venta_cod_venta)
);

create table venta (
    cod_venta int not null,
    total int not null,
    estado tinyint not null,
    primary key (cod_venta)
);

create table producto (
    cod_producto varchar(10) not null,
    cantidad int(4) not null,
    descripcion varchar(45) not null,
    valor_unitario varchar(30) not null,
    imagen varchar(45) not null,
    estado_producto tinyint not null,
    usuario_id_usuario varchar(30) not null,
    lote_cod_lote varchar(6) not null,
    primary key (cod_producto, usuario_id_usuario)
);

create table lote (
    cod_lote varchar(6) not null,
    lote varchar(10) not null,
    estado_lote tinyint not null,
    primary key (cod_lote)
);

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
foreign key (tipo_documento_t_doc)
references tipo_documento (t_doc);

alter table usuario add 
foreign key (carro_de_compras)
references carro_de_compras (carro_de_compras);

alter table usuario_has_rol add 
foreign key (usuario_id_usuario)
references usuario (id_usuario);

alter table usuario_has_rol add
foreign key (rol_cod_rol)
references rol (cod_rol);

alter table usuario add
foreign key (carro_de_compras_cod_carro)
references carro_de_compras (cod_carro);