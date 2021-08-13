create database farmifarmacy;
use farmifarmacy;

create table tipo_documento (
    t_doc int not null,
    desc_tdoc varchar(30) not null,
    estado_tdoc tinyint not null,
    primary key (t_doc)
);

create table usuario (
    id_usuario int not null,
    nombres varchar(20) not null,
    apellidos varchar(20) not null,
    direccion varchar(45) null,
    telefono int(30) not null,
    email varchar(45) not null,
    estado_usuario tinyint not null,
    tipo_documento_t_doc int not null,
    carro_cod_carro int not null,
    primary key (id_usuario, carro_cod_carro)
);

create table carro (
    cod_carro int not null,
    fecha date not null,
    subtotal int(30) not null,
    estado_carro tinyint not null,
    primary key (cod_carro)
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

create table producto (
    cod_producto int(20) not null,
    descripcion varchar(45) not null,
    valor_unitario int(30) not null,
    imagen varchar(45) not null,
    estado_producto tinyint not null,
    primary key (cod_producto)
);

create table producto_has_carro (
    producto_cod_producto int(20) not null,
    carro_cod_carro int not null,
    primary key (producto_cod_producto, carro_cod_carro)
);

create table ingreso (
    id_ingreso int not null,
    fecha date not null,
    id_empleado int not null,
    factura varchar(45) not null,
    estado_ingreso tinyint not null,
    usuario_id_usuario int not null,
    usuario_carro_cod_carro int not null,
    primary key (id_ingreso, usuario_id_usuario, usuario_carro_cod_carro)
);  

create table ingreso_has_producto (
    ingreso_id_ingreso int not null,
    ingreso_usuario_id_usuario int not null,
    ingreso_usuario_carro_cod_carro int not null,
    producto_cod_producto int(20) not null,
    cantidad int(10) not null,
    lote varchar(20) not null,
    primary key (ingreso_id_ingreso, ingreso_usuario_id_usuario, ingreso_usuario_carro_cod_carro, producto_cod_producto)
);

create table compra (
    id_compra int not null,
    fecha date not null,
    subtotal int(30) not null,
    iva int(30) not null,
    estado_compra tinyint not null,
    usuario_id_usuario int not null,
    usuario_carro_cod_carro int not null,
    primary Key (id_compra, usuario_id_usuario, usuario_carro_cod_carro)
);

create table compra_has_producto (
    compra_id_compra int not null,
    compra_usuario_id_usuario int not null,
    compra_usuario_carro_cod_carro int not null,
    producto_cod_producto int(20) not null,
    primary key (compra_id_compra, compra_usuario_id_usuario, compra_usuario_carro_cod_carro, producto_cod_producto)
);

alter table compra_has_producto add
foreign key (compra_id_compra, compra_usuario_id_usuario, compra_usuario_carro_cod_carro)
references compra (id_compra, usuario_id_usuario, usuario_carro_cod_carro);

alter table compra_has_producto add
foreign key (producto_cod_producto)
references producto (cod_producto);

alter table compra add
foreign key (usuario_id_usuario, usuario_carro_cod_carro)
references usuario (id_usuario, carro_cod_carro);

alter table ingreso_has_producto add
foreign key (ingreso_id_ingreso, ingreso_usuario_id_usuario, ingreso_usuario_carro_cod_carro)
references ingreso (id_ingreso, usuario_id_usuario, usuario_carro_cod_carro);

alter table ingreso_has_producto add
foreign key (producto_cod_producto)
references producto (cod_producto);

alter table ingreso add
foreign key (usuario_id_usuario, usuario_carro_cod_carro)
references usuario (id_usuario, carro_cod_carro);

alter table producto_has_carro add
foreign key (producto_cod_producto)
references producto (cod_producto);

alter table producto_has_carro add
foreign key (carro_cod_carro)
references carro (cod_carro);

alter table usuario_has_rol add
foreign key (usuario_id_usuario)
references usuario (id_usuario);

alter table usuario_has_rol add
foreign key (rol_cod_rol)
references rol (cod_rol);

alter table usuario add
foreign key (tipo_documento_t_doc)
references tipo_documento (t_doc);

alter table usuario add
foreign key (carro_cod_carro)
references carro (cod_carro);