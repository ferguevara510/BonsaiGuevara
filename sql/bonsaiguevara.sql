CREATE DATABASE bonsaiguevara;
USE bonsaiguevara;

CREATE TABLE administrador (
  usuario varchar(25) PRIMARY KEY NOT NULL,
  nombre varchar(100) NOT NULL,
  apellidoPaterno varchar(100) NOT NULL,
  apellidoMaterno varchar(100) NOT NULL,
  correo varchar(100) NOT NULL,
  direccion varchar(200) NOT NULL,
  numTelefono varchar(10) NOT NULL,
  contrasena varchar(64) NOT NULL
);

CREATE TABLE cliente (
  id_cliente int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombre varchar(100) NOT NULL,
  apellidoPaterno varchar(100) NOT NULL,
  apellidoMaterno varchar(100) NOT NULL,
  correo varchar(100) NOT NULL,
  contrasena varchar(64) NOT NULL,
  numTelefono varchar(10) NOT NULL,
  imagenPerfil varchar(300) NOT NULL
);

CREATE TABLE especie (
  id_especie int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nombreEspecie varchar(50) NOT NULL
);

CREATE TABLE bonsai (
  id_bonsai int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  imagenBonsai varchar(250) NOT NULL,
  id_especie int(5) NOT NULL,
  estilo int(1) NOT NULL,
  nombreCientifico varchar(50) NOT NULL,
  nombreComun varchar(50) NOT NULL,
  edad varchar(50) NOT NULL,
  precio float NOT NULL,
  FOREIGN KEY (id_especie) REFERENCES especie (id_especie)
);

CREATE TABLE cuidado (
  id_cuidado int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_especie int(5) NOT NULL,
  estilo int(1) NOT NULL,
  cantidadRiego varchar(100) NOT NULL,
  lugar varchar(100) NOT NULL,
  maceta varchar(100) NOT NULL,
  tiempoTransplante varchar(50) NOT NULL,
  tipoCultivo varchar(100) NOT NULL,
  FOREIGN KEY (id_especie) REFERENCES especie (id_especie)
); 

CREATE TABLE cita (
  folio int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fecha date NOT NULL,
  hora time NOT NULL,
  duracion int(1) NOT NULL,
  descripcion varchar(300) NOT NULL,
  id_cliente int(5) NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
);

CREATE TABLE duda (
  id_duda int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  correo varchar(75) NOT NULL,
  descripcion varchar(500) NOT NULL,
  respuesta varchar(500) NOT NULL,
  id_cliente int(5) NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
);

CREATE TABLE pago (
  id_pago int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  fecha date NOT NULL,
  monto float NOT NULL
); 

CREATE TABLE direccion (
  id_direccion int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  calle varchar(50) NOT NULL,
  numExt varchar(5) NOT NULL,
  numInt varchar(5) NOT NULL,
  colonia varchar(50) NOT NULL,
  codigoPostal varchar(5) NOT NULL,
  cuidad varchar(50) NOT NULL,
  estado varchar(50) NOT NULL
);

CREATE TABLE carritoVenta (
  id_carrito int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_cliente int(5) NOT NULL,
  id_bonsai int(5) NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente),
  FOREIGN KEY (id_bonsai) REFERENCES bonsai (id_bonsai)
);

CREATE TABLE venta (
  folio int(5) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id_carrito int(5) NOT NULL,
  id_direccion int(5) NOT NULL,
  id_pago int(5) NOT NULL,
  FOREIGN KEY (id_carrito) REFERENCES carritoVenta (id_carrito),
  FOREIGN key (id_direccion) REFERENCES direccion (id_direccion),
  FOREIGN KEY (id_pago) REFERENCES pago (id_pago)
);

INSERT INTO especie (nombreEspecie) VALUES ('CONIFERA');
INSERT INTO especie (nombreEspecie) VALUES ('FICOS RETUSA');
INSERT INTO especie (nombreEspecie) VALUES ('FICOS NERIFOLIA');
INSERT INTO especie (nombreEspecie) VALUES ('FICOS VARIEGADO');
INSERT INTO especie (nombreEspecie) VALUES ('CAPALES');
INSERT INTO especie (nombreEspecie) VALUES ('BUGAMBILIA ESPECTABILIS');
INSERT INTO especie (nombreEspecie) VALUES ('JUNIPEROS PROCUMBENS');
INSERT INTO especie (nombreEspecie) VALUES ('GINGO BILOBA');
INSERT INTO especie (nombreEspecie) VALUES ('PINO PINEA');
INSERT INTO especie (nombreEspecie) VALUES ('ABIES RELIGIOSA');
INSERT INTO especie (nombreEspecie) VALUES ('ABIES ALBA');
INSERT INTO especie (nombreEspecie) VALUES ('PIRACANTA ANGUSTITULIA AMARILLA');
INSERT INTO especie (nombreEspecie) VALUES ('PIRACANTA ANGUSTITULIA ROJA');
INSERT INTO especie (nombreEspecie) VALUES ('ACACIA PENATULA');
INSERT INTO especie (nombreEspecie) VALUES ('ACER PALMATUM');
INSERT INTO especie (nombreEspecie) VALUES ('JACARANDA MIMOSIDOLIA');
INSERT INTO especie (nombreEspecie) VALUES ('CRIJOTOMENA JAPONICA');
INSERT INTO especie (nombreEspecie) VALUES ('CEIBA PENTANDRA');
INSERT INTO especie (nombreEspecie) VALUES ('RODADEN DRUM INDICUM');
INSERT INTO especie (nombreEspecie) VALUES ('CEDRELLA O DORATA');

INSERT INTO administrador (usuario, nombre, apellidoPaterno, apellidoMaterno, correo, direccion, numTelefono, contrasena) VALUES 
('OctavioGuevara','OCTAVIO CESAR','GUEVARA','TORRES','bonsai_guevara@outlook.com','CALLE DEL CAMPESINO #46 COLONIA OBRERO CAMPESINA CP:91020 XALAPA VERACRUZ','2281774694','62f82f9a8d525347bcbfec24924fd6ad');