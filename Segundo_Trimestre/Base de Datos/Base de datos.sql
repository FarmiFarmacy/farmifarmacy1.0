create database farmifarmacy;

	use farmifarmacy; 

	create table cliente (
		id_cliente varchar(15) not null,
		fk_id_vendedor varchar(15) not null,
		p_nombre varchar(25) not null,
		s_nombre varchar(20) null,
		p_apellido varchar(25) not null,
		s_apellido varchar(20) null,
		direccion varchar(45) not null,
		telefono INT(15) not null,
		email varchar(45) not null,
		estado_cliente boolean not null,
		primary key (id_cliente) 
		);

	create table cliente_has_tdoc (
		id_cliente varchar(15) not null,
		t_doc varchar(10) not null,
		estado_cli_tdoc boolean not null, 
		primary key (id_cliente, t_doc)
		);

	create table t_doc (
		t_doc varchar(10) not null,
		desc_tdoc varchar(30) not null,
		estado_tdoc boolean not null,
		primary key (t_doc)
		);

	create table tdoc_has_vendedor (
		t_doc varchar(10) not null,
		id_vendedor varchar(15) not null,
		estado_tdoc_ven boolean not null,
		primary key (t_doc, id_vendedor)
		);

	create table vendedor (
		id_vendedor varchar(15) not null,
		p_nombre varchar(25) not null,
		s_nombre varchar(20) null,
		p_apellido varchar(25) not null,
		s_apellido varchar(20) null,
		estado_vendedor boolean not null,
		primary key (id_vendedor)
		);

	create table cliente_has_producto (
		id_cliente varchar(15) not null,
		cod_producto varchar(6) not null,
		estado_cli_pro boolean not null,
		primary key (id_cliente, cod_producto)
		);

	create table producto (
		cod_producto varchar(6) not null,
		fk_cod_lote varchar(6) not null,
		cantidad INT(10) not null,
		descripcion varchar(45) not null,
		valor_unitario INT(20) not null,
		estado_producto boolean not null,
		primary key (cod_producto)
		);	

	create table lote (
		cod_lote varchar(6) not null,
		desc_lote datetime not null,
		estado_lote boolean not null,
		primary key (cod_lote)
		);	

	create table cotizacion (
		id_cotizaciion INT(6) not null,
		fkpk_id_cliente varchar(15) not null,
		fecha datetime not null,
		valor_total INT(20) not null,
		estado_cotizacion boolean not null,
		primary key (id_cotizaciion)
		);

	create table roles (
		cod_rol varchar(6) not null,
		fkpk_id_cliente varchar(15) not null,
		rol varchar(10) not null,
		estado_rol boolean not null,
<<<<<<< HEAD
		primary key (cod_rol, fkpk_id_cliente)
		);

	create table roles_has_vendedor (
		vendedor_id_vendedor varchar(15) not null,
		roles_cod_rol varchar(6) not null,
		roles_fkpk_id_cliente varchar(15) not null,
		primary key (vendedor_id_vendedor, roles_cod_rol, roles_fkpk_id_cliente)
=======
		primary key (cod_rol)
>>>>>>> de6b97ea8e13dee945b7624d356c169954123c54
		);

	Alter table cliente_has_tdoc add
	foreign key (id_cliente)
	references cliente(id_cliente);

	Alter table cliente_has_tdoc add
	foreign key (t_doc)
	references t_doc(t_doc);

	Alter table tdoc_has_vendedor add
	foreign key (t_doc)
	references t_doc(t_doc);

	Alter table tdoc_has_vendedor add
	foreign key (id_vendedor)
	references vendedor(id_vendedor);

	Alter table cliente_has_producto add
	foreign key (id_cliente)
	references cliente(id_cliente);

	Alter table cliente_has_producto add
	foreign key (cod_producto)
	references producto(cod_producto);

	Alter table producto add
	foreign key (fk_cod_lote)         
	references lote (cod_lote);

	Alter table cotizacion add
	foreign key (fkpk_id_cliente)               
<<<<<<< HEAD
	references cliente (id_cliente);
=======
	references cliente_has_producto (id_cliente);
>>>>>>> de6b97ea8e13dee945b7624d356c169954123c54

	Alter table cliente add
	foreign key (fk_id_vendedor)                     
	references vendedor (id_vendedor);

	Alter table roles add
<<<<<<< HEAD
	foreign key (fkpk_id_cliente)
	references cliente(id_cliente);

	Alter table roles_has_vendedor add
	foreign key (vendedor_id_vendedor)
	references vendedor (id_vendedor);

	Alter table roles_has_vendedor add
	foreign key (roles_cod_rol, roles_fkpk_id_cliente)
	references roles (cod_rol, fkpk_id_cliente);
=======
	foreign key (cod_rol)
	references cliente(id_cliente);
>>>>>>> de6b97ea8e13dee945b7624d356c169954123c54
