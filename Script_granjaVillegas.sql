create database granjaVillegas;

use granjaVillegas;

create  table cliente(

nombre varchar(50),
cedula varchar(15) primary key,
telefono varchar(15),
correo varchar(30),
direccion varchar(60)
);

create table factura(
id_factura int auto_increment primary key,
fecha varchar(15), 
total int,
cedula_cliente varchar (15),
constraint fk_factura_cliente foreign key (cedula_cliente) references cliente(cedula)
);

create table abono(
codigo_abono int primary key,
id_factura int,
monto int,
fecha_abono varchar(15),
constraint fk_abono_factura foreign key (id_factura) references factura(id_factura)
);

create table productoVenta(
codigo int primary key,
fecha_vencimiento varchar(15),
tipo varchar (30)
);

create table articulo (
id_articulo varchar(100) primary key,
id_animal int,
id_productoVenta int,
constraint fk_articulo_productVenta foreign key (id_productoVenta) references productoVenta(codigo),
constraint fk_articulo_animal foreign key (id_animal) references animal(id_animal)
);

create table detalle(
codigo_detalle int auto_increment,
cantidad int,
id_factura int,
id_articulo varchar(100),
precio int,
constraint fk_detalle_articulo foreign key (id_articulo) references articulo(id_articulo),
constraint fk_detalle_factura foreign key (id_factura) references factura(id_factura),
primary key (codigo_detalle,id_factura)
);

create table cuentasPorCobrar(
idcredito int auto_increment primary key,
id_factura int,
fechaSiguientePago varchar(15),
saldo int,
estado int, -- si esta activo o no
constraint fk_cuentaPorCobrar_factura foreign key (id_factura) references factura(id_factura)
);

create table animal(
fechaIngreso varchar(15),
sexo int,
id_animal int auto_increment primary key,
raza varchar(30)
);

create table parto(
id_parto int auto_increment primary key ,
fechaGestacion varchar (15),
id_animal int,
constraint fk_parto_vaca  foreign key (id_animal) references animal(id_animal)
);

create table medicamento(
id_medicamento int auto_increment primary key,
nombre varchar (30),
descripcion varchar(100)
);

create table chequeoVeterinario(
fechaChequeo varchar(15),
id_chequeo int auto_increment primary key ,
id_medicamento int,
dosis int,
descripcion varchar(150),
id_animal int,
fecha_proximoChequeo varchar (15),

constraint fk_chequeo_medicamento foreign  key(id_medicamento) references medicamento(id_medicamento),
constraint fk_chequeo_vaca foreign  key(id_animal) references animal(id_animal)

);

create table lotePollos(

cantidad int,
numeroLotePollos int,
fechaIngreso varchar(15)

);



