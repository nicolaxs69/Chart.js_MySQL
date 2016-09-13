<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "epilepsy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$val = $_GET['dato'];
$cod = $_GET['identificacionPaciente'];
$estado = $_GET['estado'];

//$sql = "INSERT INTO lecturas (valor, nombre,id,estado)
//VALUES (".$val.",'".$nombre."',".$id.",'".$estado."')";

$sql = "INSERT INTO dato_corazon (identificacionPaciente, dato, estado)
VALUES (".$cod.",".$val.",'".$estado."')";



if ($conn->query($sql) === TRUE) {
    echo "Datos insertados Correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

