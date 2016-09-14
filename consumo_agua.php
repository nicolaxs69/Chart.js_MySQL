<?php


$servername = "localhost";
$username = "root";
$password = "legolas4129";
$dbname = "mediciones";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$nombre = $_GET['nombre'];
$litros = $_GET['litros'];
$precio = $_GET['precio'];


//$sql = "INSERT INTO lecturas (valor, id, 	nombre)
//VALUES (".$val.",".$id.",'".$nombre."')";

$sql = "INSERT INTO consumo_agua (litros, precio)
VALUES (".$litros.",'".$precio."')"; // Al final de cada sentencia debe ir '".$variable."'


if ($conn->query($sql) === TRUE) {
    echo "Datos insertados Correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

