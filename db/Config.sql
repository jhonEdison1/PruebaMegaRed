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