
CREATE DATABASE campuslands;
USE campuslands;
create table pais(
    idPais INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombrePais VARCHAR(50) NOT NULL
);

create table departamento(
    idDep INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreDep VARCHAR(50) NOT NULL,
    idPais INT NOT NULL,
    FOREIGN KEY (idPais) REFERENCES pais(idPais)
);

create table region(
    idReg INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreReg VARCHAR(60) NOT NULL,
    idDep INT NOT NULL,
    FOREIGN KEY (idDep) REFERENCES departamento(idDep)
);

create table campers(
    idCamper INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    idReg INT NOT NULL,
    FOREIGN KEY (idReg) REFERENCES region(idReg)
);