create database farmifarmacy;
	use farmifarmacy;

	create table lote (
		cod_lote varchar(6) not null,
		desc_lote varchar(12) not null,
		estado_lote boolean not null,
		primary key (cod_lote)
		);

	create table empleado (
		id_vendedor varchar(15) not null,
		p_nombre varchar(25) not null,
		s_nombre varchar(20) null,
		p_apellido varchar(25) not null,
		s_apellido varchar(20) null,
		estado_vendedor boolean not null,
		primary key (id_vendedor)
		);

	create table t_doc (
		t_doc varchar(10) not null,
		desc_tdoc varchar(30) not null,
		estado_tdoc boolean not null,
		primary key (t_doc)
		);	

	create table cliente (
		id_cliente varchar(15) not null,
		p_nombre varchar(25) not null,
		s_nombre varchar(20) null,
		p_apellido varchar(25) not null,
		s_apellido varchar(20) null,
		direccion varchar(45) not null,
		telefono int(15) not null,
		email varchar(45) not null,
		estado_cliente boolean not null,
		fk_id_vendedor varchar(15) not null,
		primary key (id_cliente)
		);

	create table cliente_has_tdoc (
		id_cliente varchar(15) not null,
		t_doc varchar(10) not null,
		estado_cli_tdoc boolean not null,
		primary key (id_cliente,t_doc)
		);

	create table tdoc_has_vendedor (
		t_doc varchar(10) not null,
		id_vendedor varchar(15) not null,
		estado_tdoc_ven boolean not null,
		 primary key (t_doc,id_vendedor)
		);	

	create table roles_has_vendedor (
		vendedor_id_vendedor varchar(15) not null,
		roles_cod_rol varchar(6) not null,
		roles_fkpk_id_cliente varchar(15) not null,
		primary key (vendedor_id_vendedor,roles_cod_rol,roles_fkpk_id_cliente)
		);

	create table roles (
		cod_rol varchar(6) not null,
		fkpk_id_cliente varchar(15) not null,
		rol varchar(10) not null,
		estado_rol boolean not null,
		primary key (cod_rol, fkpk_id_cliente)
		);

	create table cotizacion (
		id_cotizacion int(6) not null,
		fk_id_cliente varchar(15) not null,
		fecha datetime not null,
		valor_total int(20) not null,
		estado_cotizacion boolean not null,
		primary key (id_cotizacion)
		);

	create table cliente_has_producto (
		id_cliente varchar(15) not null,
		cod_producto varchar(6) not null,
		estado_cli_pro boolean not null,
		primary key (id_cliente, cod_producto)
		);

	create table producto (
		cod_producto varchar(6) not null,
		fkpk_cod_lote varchar(6) not null,
		cantidad int(10) not null,
		descripcion varchar(45) not null,
		valor_unitario int(20) not null,
		estado_producto boolean not null,
		primary key (cod_producto, fkpk_cod_lote)
		);

	alter table producto add
	foreign key (fkpk_cod_lote)
	references lote (cod_lote);

	alter table cliente_has_producto add
	foreign key (id_cliente)
	references cliente (id_cliente);

	alter table cliente_has_producto add
	foreign key (cod_producto)
	references producto (cod_producto);

	alter table cotizacion add
	foreign key (fk_id_cliente)
	references cliente (id_cliente);

	alter table roles add
	foreign key (fkpk_id_cliente)
	references cliente (id_cliente);

	alter table roles_has_vendedor add
	foreign key (vendedor_id_vendedor)
	references vendedor (id_vendedor);

	alter table roles_has_vendedor add
	foreign key (roles_cod_rol,roles_fkpk_id_cliente)
	references roles (cod_rol,fkpk_id_cliente);

	alter table tdoc_has_vendedor add
	foreign key (t_doc)
	references t_doc (t_doc);

	alter table tdoc_has_vendedor add
	foreign key (id_vendedor)
	references vendedor (id_vendedor);

	alter table cliente_has_tdoc add
	foreign key (id_cliente)
	references cliente (id_cliente);

	alter table cliente_has_tdoc add
	foreign key (t_doc)
	references t_doc (t_doc);

	alter table cliente add
	foreign key (fk_id_vendedor)
	references vendedor (id_vendedor);

	insert into vendedor 
	values
	('1016841206','Maria','Paula','Gomez','Marin',1),
	('1003275748','Jhojan','Alexander','Perez','null',1),
	('1011153857','Mauricio','null','Castañeda','null',1),
	('1026238784','Danna','Alejandra','Moreno','Vargas',1),
	('1011752470','Karen','Paola','Muñoz','null',1),
	('1000016762','Laura','Valentina','Vargas','Sanchez',1),
	('1021928374','Jessica','Lorena','Paez','null',1),
	('1015159424','Juan','null','Herrera','null',1),
	('1009812763','Johana','Marcela','Aparicio','Suarez',1),
	('1028192736','Juan','Manuel','Lopez','Bravo',1);

	insert into t_doc
	values 
	('CC','Cédula de Ciudadania',1),
	('CE','Cédula de Extranjeria',1),
	('TI','Tarjeta de Identidad',1),
	('Nit','Número de Identificación Tributaria',1);	

	insert into cliente 
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
	('1023903053','Gary','Daniela','Vargas','Saenz','cr 8 este # 9-28 sur','3219240401','gdvargas35@misena.edu.co',1,'1026238784'),
	('1001271562','Carlos','Alfredo','López','Garzón','Cra 2 este #79-08 Sur','3197729848','calopez2651@misena.edu.co',1,'1011752470'),
	('1005573490','Mario','andres','Vélez','Bravo','Cl. 129a #94c-56 a 94c','3226262960','Mariiovelez15@gmail.com',1,'1000016762'),
	('1007105324','Valentina','null','Grillo','Martinez','Calle 107 Sur #4-59','3209854322','vgrillo@misena.edu.co',1,'1021928374'),
	('1022922706','Valeria','null','Criollo','Cardenas','Cra 11 # 65-70 sur Int 3','3223377850','vcriollo6@misena.edu.co',1,'1015159424'),
	('1000807149','Daniela','Valentina','Fonseca','Díaz','Cra 47b#71-28 sur','3015554404','Dvfonseca94@misena.edu.co',1,'1009812763'),
	('1003540758','Kevin','null','Pulido','Delgado','Cra 4#91-75 sur','3108995144','kpulido857@misena.edu.co',1,'1028192736'),
	('1000036556','Juan','Pablo','Contreras','Lopez','Calle 128 b bis a #91-67','3132597471','contreraslopezjuanpablo026@gmail.com',1,'1016841206'),
	('1013099140','Milton','Stiven','Gonzalez','Pinzon','Cra 72 #76 a 45 sur','3042217481','miltonstivenpinzon@gmail.com',1,'1003275748'),
	('1001117202','Sharon','Guissell','Quintero','Espinel','carrera 121 N 128 B 21','3043748447','espinelsharon@gmail.com',1,'1011153857'),
	('1000157790','Ivan','Mauricio','Cuervo','Campos','cra 14 # 91a 71 sur','3138144742','maocuervo13@gmail.com',1,'1026238784');
<<<<<<< HEAD


	   -- joines
	   -- cod_lote,desc_lote,estado_lote
	   select cod_lote,estado_lote,desc_lote
	   from lote
	   join lote ON 


	   select id_cliente,p_nombre,s_nombre,p_apellido,s_apellido,direccion,telefono,email,estado_cliente,fk_id_vendedor,id_vendedor,estado_vendedor,desc_tdoc,estado_tdoc
	   from cliente 
	   join vendedor ON id_vendedor =fk_id_vendedor
	   join t_doc ON t_doc =t_doc











		
=======
>>>>>>> 346d23ed4a380b95e61f170de5ca43801a5bbbaa
