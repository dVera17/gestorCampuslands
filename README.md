MODULO DE ADMINISTRADOR PARA LA GESTION DE INFORMACION DE LA EMPRESA CAMPUSLANDS.

El backend de este aplicativo se encuentra finalizado.
La data se consume por medio de fetch, la base de datos se creó y se implemento teniendo en cuenta el 
modelo relacional dado, se hicieron arreglos a este modelo, mas adelante se explica a detalle.

- SENTENCIAS UTILIZADAS PARA LA CREACION DE LA BASE DE DATOS
- CREATE DATABASE campuslands;
- USE campuslands;
- create table pais(
    -> idPais INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombrePais VARCHAR(50) NOT NULL);

- create table departamento(
    idDep INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombreDep VARCHAR(50) NOT NULL,
    -> idPais INT NOT NULL,
    -> FOREIGN KEY (idPais) REFERENCES pais(idPais));

- create table region(
    -> idReg INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombreReg VARCHAR(60) NOT NULL,
    -> idDep INT NOT NULL,
    -> FOREIGN KEY (idDep) REFERENCES departamento(idDep));

- create table campers(
    -> idCamper INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -> nombreCamper VARCHAR(50) NOT NULL,
    -> apellidoCamper VARCHAR(50) NOT NULL,
    -> fechaNac DATE NOT NULL,
    -> idReg INT NOT NULL,
    -> FOREIGN KEY (idReg) REFERENCES region(idReg));

- Se hizo la correcion de algunos tipos de dato de algunos campos presentados en el modelo relacional
- de la tabla pais-> nombrePais: INT se cambio por nombrePais: VARCHAR(50)
- de la tabla camper-> idCamper:VARCHAR(20) se cambio por idCamper: INT
