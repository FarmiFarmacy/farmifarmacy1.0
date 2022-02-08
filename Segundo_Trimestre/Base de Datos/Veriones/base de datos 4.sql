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

insert into usuario (nombres, apellidos, direccion, teléfono, email, estado_usuario)
values ('Andres Felipe','Orjuela','Cll 95 Sur #5G 12 Este',3122151254,'aforjuela11@misena.edu.co',1),
       ('Samuel Esteban','Castaño Gonzales','Cll 152A 99-60',3012514581,'samicasta11@gmail.com',1),
       ('Andres Felipe','Monroy Moreno','dg 74 Sur #78 i 39',3204125846,'afmonroy34@misena.edu.co',1),
       ('Juan David','Camargo Useche','Cll 4 A #93 Sur 34',3043385964,'jdcamargo853@misena.edu.co',1),
       ('Maria Paula','Patiño Aparicio','calle 130 d bis # 99 - 27',3172727783,'mapu302929@gmail.com',1),
       ('José Manuel','Posada Restrepo','calle 6a #94a 25',3003441688,'josemanuelposada14@gmail.com',1),
       ('Yasmin Lucia','Moreno Suarez','Cll 104 #5-62 Sur',3118271726,'ylmoreno243@misena.edu.co',1),
       ('Camilo Andres','Osorio Colmenares','Cll130#94-08',3235940505,'Camiloandresosoriocolmenares@gmail.com',1),
       ('Paula Alejandra','Cuellar Rodriguez','Carrera 18 G# 15 35',3137528493,'pacuellar06@misena.edu.co',1),
       ('Esteban David','Pedrozo Aldana','Ac 68 sur No 69-45',3044568380,'edpedrozo02@misena.edu.co',1),
       ('Jenifer Carolina','Russi Benavides','Calle79 sur #3-05',3015551357,'Jcrussi6@misena.edu.co',1),
       ('Brayan Andres','Puello Sanchez','Calle 70 a # 122 a 76',3208357118,'Bapuello9@misena.edu.co',1),
       ('Sebastian Danilo','Correo Boyaca','Carrera 87 #129c 19 Interior 8',3195890562,'sdcorrea60@misena.edu.co',1),
       ('Gary Daniela','Vargas Saenz','cr 8 este # 9-28 sur',3219240401,'gdvargas35@misena.edu.co',1),
       ('Carlos Alfredo','Lopez Garzón','Cra 2 este #79-08 Sur',3197729848,'calopez2651@misena.edu.co',1),
       ('Mario Andres','Veléz Bravo','Cl. 129a #94c-56 a 94c',3226262960,'Mariiovelez15@gmail.com',1),
       ('Valentina','Grillo Martinez','Calle 107 Sur #4-59',3209854322,'vgrillo@misena.edu.co',1),
       ('Valeria','Criollo Cardenaas','Cra 11 # 65-70 sur Int 3',3223377850,'vcriollo6@misena.edu.co',1),
       ('Daniela Valentina','Fonseca Díaz','Cra 47b#71-28 sur',3015554404,'Dvfonseca94@misena.edu.co',1),
       ('Kevin','Pulido Delgado','Cra 4#91-75 sur',3108995144,'kpulido857@misena.edu.co',1),
       ('Juan Pablo','Contreras Lopes','Calle 128 b bis a #91-67',3132597471,'contreraslopezjuanpablo026@gmail.com',1),
       ('Milton Stiven','Gonzales Pinzón','Cra 72 #76 a 45 sur',3042217481,'miltonstivenpinzon@gmail.com',1),
       ('Sharon Guissell','Quintero Espinel','carrera 121 N 128 B 21',3043748447,'espinelsharon@gmail.com',1),
       ('Ivan Mauricio','Cuervo Campos','cra 14 # 91a 71 sur',3138144742,'maocuervo13@gmail.com',1),
       ('Maria Paula','Gomez Marín','null','null','null',1),
       ('Jhojan Alexander','Perez','null','null','null',1),
       ('Mauricio','Castañeda','null','null','null',1),
       ('Danna Alejandra','Moreno Vargas','null','null','null',1),
       ('Karen Paola','Muñoz','null','null','null',1),
       ('Laura Valentina','Vargas Sanchez','null','null','null',1),
       ('Jessica Lorena','Paez','null','null','null',1),
       ('Juan','Herrera','null','null','null',1),
       ('Johana Marcela','Aparicio Suarez','null','null','null',1),
       ('Juan Manuel','Lopez Bravo','null','null','null',1);

insert into tipo_documento (desc_tdoc, estado_tdoc)       
values ('Tarjeta de Identidad',1),
       ('Cédula de Ciudadanía',1),
       ('Número de Identificación Tributaría',1),
       ('Cédula de Extranjería',1);

insert into rol (rol, estado_rol)       
values ('Empleado',1),
       ('Administrador',1),
       ('Cliente',1);       