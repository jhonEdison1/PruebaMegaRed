Create Database If not exists 'inventario' CHARACTER SET utf8 COLLATE utf8_general_ci;

Create table if not exists usuarios (
    id int(11) NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    apellido varchar(50) NOT NULL,
    email varchar(50) NOT NULL UNIQUE,
    password varchar(50) NOT NULL,
    permisos int(11) NOT NULL,
    rol  enum('admin','user') NOT NULL,
    PRIMARY KEY (id) 


) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table if not exists productos(
    id int (11) NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    decripcion varchar(280) NOT NULL ,
    precioBase float(10,2) NOT NULL  ,
    impuesto float(10,2) NOT NULL,
    estado enum('0','1') NOT NULL,
    stock int(11) NOT NULL ,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


"Tabal ordenes, una orden puede tener muchos productos"

create table if not exists ordenes(
    id int (11) Not null AUTO_INCREMENT,
    idProductos json NOT NULL,
    idUsuario int(11) NOT NULL,
    precio float(10,2) NOT NULL,
    fecha date NOT NULL,
    estado enum('0','1') NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table if not exists intentosLogin(
    id int (11) Not null AUTO_INCREMENT,
    idUsuario int(11) NOT NULL,
    fecha date NOT NULL,
    intentos int(11) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;