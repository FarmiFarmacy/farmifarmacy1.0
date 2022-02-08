create database farmifarmacy;
	use farmifarmacy;

	create table lote (
		cod_lote varchar(6) not null,
		desc_lote varchar(12) not null,
		estado_lote boolean not null,
		primary key (cod_lote)
		);

	create table producto_has_lote (
		cod_producto varchar(6) not null,
		cod_lote varchar(6) not null,
		estado_producto_lote boolean not null,
		primary key (cod_producto,cod_lote)
		); 

	create table producto (
		cod_producto varchar(6) not null,
		fk_cod_lote varchar(6) not null,
		cantidad int(10) not null,
		descripcion varchar(45) not null,
		valor_unitario int(20) not null,
		estado_producto boolean not null,
		ususario_id_usuario varchar(30) not null,
		primary key (cod_producto, fk_cod_lote)
		);

	create table usuario_has_producto (
		id_usuario varchar(15) not null,
		cod_producto varchar(6) not null,
		estado_usuario_pro boolean not null,
		primary key (id_usuario, cod_producto)
		);



	create table usuario (
		id_usuario varchar(15) not null,
		tipo_documento_t_doc varchar(4) not null,
		p_nombre varchar(25) not null,
		s_nombre varchar(20) null,
		p_apellido varchar(25) not null,
		s_apellido varchar(20) null,
		direccion varchar(45) not null,
		telefono int(15) not null,
		email varchar(45) not null,
		estado_usuario boolean not null,
		primary key (id_isuario)
		);

	create table t_doc (
		t_doc varchar(10) not null,
		desc_tdoc varchar(30) not null,
		estado_tdoc boolean not null,
		primary key (t_doc)
		);	

	create table usuario_has_tdoc (
		id_usuario varchar(15) not null,
		t_doc varchar(10) not null,
		estado_usu_tdoc boolean not null,
		primary key (id_usuario,t_doc)
		);

    create table rol (
		cod_rol varchar(6) not null,
		fk_id_usuario varchar(15) not null,
		rol varchar(10) not null,
		estado_rol boolean not null,
		primary key (cod_rol, fk_id_cliente)
		);

    create table rol_has_usuario (
		ususario_id_usuario varchar(30) not null,
		rol_cod_rol varchar(6) not null,
		roles_fk_id_usuario varchar(15) not null,
		primary key (usuario_id_ususario,rol_cod_rol,roles_fk_id_usuario)
		);

    create table carro_de (
		id_cotizacion int(6) not null,
		fk_id_usuario varchar(15) not null,
		fecha datetime not null,
		valor_total int(20) not null,
		estado_cotizacion boolean not null,
		primary key (id_cotizacion)
		);

    create table cotizacion_has_usuario (
    	ususario_id_usuario varchar (30) not null,
    	cotizacion_id_cotizacion varchar(6) not null,
    	primary key (usuario_id_ususario,cotizacion_id_cotizacion,cotizacion_fk_id_usuario)
    	);


    alter table producto add
	foreign key (fk_cod_lote)
	references lote (cod_lote);

	alter table usuario_has_producto add
	foreign key (id_usuario)
	references usuario (id_usuario);

	alter table usuario_has_producto add
	foreign key (cod_producto)
	references producto (cod_producto);

	alter table cotizacion add
	foreign key (fk_id_usuario)
	references usuario (id_usuario);

	alter table roles add
	foreign key (fk_id_usuario)
	references usuario (id_usuario);

	alter table roles_has_usuario add
	foreign key (usuario_id_ususario)
	references usuario (id_usuario);

	alter table tdoc_has_usuario add
	foreign key (t_doc)
	references t_doc (t_doc);

	alter table usuario add
	foreign key (fk_id_usuario)
	references usuario (id_usuario);

	insert into producto
	values 
	("PRO001","Caja Jarabe Abrilar",1),
	("PRO002","Aceite de Bacalao",1),
	("PRO003","Caja Acetaminofem 500mg",1),
	("PRO004","Jarabe Acetaminofem",1);

	insert into usuario
	values
	('1013576811','Andres','Felipe','Orjuela','null','Cll 95 Sur #5G 12 Este','3122151254','aforjuela11@misena.edu.co',1,'1016841206'),
	('1001096125','Samuel','Esteban','Castaño','Gonzales','Cll 152A 99-60','3012514581','samicasta11@gmail.com',1,'1003275748'),
	('1012316243','Andres','Felipe','Monroy','Moreno','dg 74 Sur #78 i 39','3204125846','afmonroy34@misena.edu.co',1,'1011153857'),
	('1016942358','Juan','David','Camargo','Useche','Cll 4 A #93 Sur 34','3043385964','jdcamargo853@misena.edu.co',1,'1026238784'),
	('1192831945','Maria','Paula','Patiño','Aparicio','calle 130 d bis # 99 - 27','3172727783','mapu302929@gmail.com',1,'1011752470'),
	('1016943117','José','Manuel','Posada','Restrepo','calle 6a #94a 25','3003441688','josemanuelposada14@gmail.com',1,'1000016762'),
	('1010051342','Yasmin','Lucia','Moreno','Suarez','Cll 104 #5-62 Sur','3118271726','ylmoreno243@misena.edu.co',1,'1021928374'),
	('1006051207','Camilo','Andres','Osorio','colmenares','Cll130#94-08','3235940505','Camiloandresosoriocolmenares@gmail.com',1,'1015159424'),
	('1014176160','Paula','Alejandra','Cuéllar','Rodríguez','Carrera 18 G# 15 35','3137528493','pacuellar06@misena.edu.co',1,'1009812763'),
	('1000350620','Esteban','David','Pedrozo','Aldana','Ac 68 sur No 69-45','3044568380','edpedrozo02@misena.edu.co',1,'1028192736'),
	('1019602056','Jenifer','Carolina','Russi','Benavides','Calle79 sur #3-05','3015551357','Jcrussi6@misena.edu.co',1,'1016841206'),
	('1016942409','Brayan','Andres','Puello','Sanchez','Calle 70 a # 122 a 76','3208357118','Bapuello9@misena.edu.co',1,'1003275748'),
	('1000464506','Sebastian','Danilo','Correa','Boyaca','Carrera 87 #129c 19 Interior 8','3195890562','sdcorrea60@misena.edu.co',1,'1011153857'),	
	('1023903053','Gary','Daniela','Vargas','Saenz','cr 8 este # 9-28 sur','3219240401','gdvargas35@misena.edu.co',1,'1026238784');

	insert into t_doc
	values 
	('CC','Cédula de Ciudadania',1),
	('CE','Cédula de Extranjeria',1),
	('TI','Tarjeta de Identidad',1),
	('Nit','Número de Identificación Tributaria',1);

	insert into rol
	values
	('clientes'1),
	('empleado'1),
	('administrador'1);

	insert into cotizacion
	values
	('N° cotizzasion 0001','NOW','1192831945','Maria Paula Patiño Aparicio','calle 130 d bis # 99 - 27','3172727783','mapu302929@gmail.com','item','PRO001',3,'Caja Jarabe Abrilar','valor unitario','valor total','valor en letra','subtotal','iva19%','total cotizacion','1009812763','Johana Marcela Aparicio Suarez');

    
    select id_usuario,p_nombre,s_nombre,p_apellido,s_apellido,direccion,telefono,email,estado_usuario,desc_tdoc,estado_tdoc,rol
	   from usuario 
	   join ususario ON id_usuario =fk_id_usuario
	   join t_doc ON t_doc =t_doc

	select cod_producto,cantidad,descripcion,valor_unitario,estado_producto,
	   from producto
	   join producto ON cod_producto =cod_producto
	   join lote ON cod_lote =fk_cod_lote 

	select id_cotizacion,fecha,valor_total,estado_cotizacion,usuario,
	   from cotizacion
	   join cotizacion ON id_cotizacion =id_cotizacion
	   join ususario ON id_usuario =fk_id_usuario
	   







