<?php
header("Access-Control-Allow-Origin: *");
require '../vendor/autoload.php';
$router = new \Bramus\Router\Router();
$dotenv = Dotenv\Dotenv::createImmutable("../")->load();

/**
 * ! PAIS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*/

$router->get("/pais", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM pais");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/pais", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO pais(nombrePais) VALUES(:nombrePais);");
    $res->bindValue('nombrePais', $_DATA['nombrePais']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/pais", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE pais SET nombrePais = :nombrePais WHERE idPais = :idPais;");
    $res->bindValue('idPais', $_DATA['idPais']);
    $res->bindValue('nombrePais', $_DATA['nombrePais']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/pais", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM pais WHERE idPais = :idPais;");
    $res->bindValue('idPais', $_DATA['idPais']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! DEPARTAMENTO - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*/

$router->get("/departamento", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM departamento");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/departamento", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO departamento(nombreDep, idPais) VALUES(:nombreDep, :idPais);");
    $res->bindValue('nombreDep', $_DATA['nombreDep']);
    $res->bindValue('idPais', $_DATA['idPais']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/departamento", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE departamento SET nombreDep = :nombreDep, idPais = :idPais WHERE idDep = :idDep;");
    $res->bindValue('idDep', $_DATA['idDep']);
    $res->bindValue('nombreDep', $_DATA['nombreDep']);
    $res->bindValue('idPais', $_DATA['idPais']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/departamento", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM departamento WHERE idDep = :idDep;");
    $res->bindValue('idDep', $_DATA['idDep']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! REGION - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*/

$router->get("/region", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM region");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/region", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO region(nombreReg, idDep) VALUES(:nombreReg, :idDep);");
    $res->bindValue('nombreReg', $_DATA['nombreReg']);
    $res->bindValue('idDep', $_DATA['idDep']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/region", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE region SET nombreReg = :nombreReg, idDep = :idDep WHERE idReg = :idReg;");
    $res->bindValue('idReg', $_DATA['idReg']);
    $res->bindValue('nombreReg', $_DATA['nombreReg']);
    $res->bindValue('idDep', $_DATA['idDep']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/region", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM region WHERE idReg = :idReg;");
    $res->bindValue('idReg', $_DATA['idReg']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! CAMPERS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*/

$router->get("/campers", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM campers");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/campers", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO campers(nombreCamper, apellidoCamper, fechaNac, idReg) VALUES(:nombreCamper, :apellidoCamper, :fechaNac, :idReg);");   
    $res->bindValue('nombreCamper', $_DATA['nombreCamper']);
    $res->bindValue('apellidoCamper', $_DATA['apellidoCamper']);
    $res->bindValue('fechaNac', $_DATA['fechaNac']);
    $res->bindValue('idReg', $_DATA['idReg']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/campers", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE campers SET nombreCamper = :nombreCamper, apellidoCamper = :apellidoCamper, fechaNac = :fechaNac, idReg = :idReg WHERE idCamper = :idCamper;");
    $res->bindValue('idCamper', $_DATA['idCamper']);
    $res->bindValue('nombreCamper', $_DATA['nombreCamper']);
    $res->bindValue('apellidoCamper', $_DATA['apellidoCamper']);
    $res->bindValue('fechaNac', $_DATA['fechaNac']);
    $res->bindValue('idReg', $_DATA['idReg']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/campers", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM campers WHERE idCamper = :idCamper;");
    $res->bindValue('idCamper', $_DATA['idCamper']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->run();



?>