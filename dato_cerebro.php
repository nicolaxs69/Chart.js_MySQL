<?php


$servername = "localhost";
$username = "root";
$password = "legolas4129";
$dbname = "epilepsy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$nombre = $_GET['nombre'];
$estado = $_GET['estado'];
$val = $_GET['dato'];
$cod = $_GET['identificacionPaciente'];


//$sql = "INSERT INTO lecturas (valor, id)
//VALUES ('510', '03')";
//$sql = "INSERT INTO lecturas (valor)
//VALUES (".$val.")";

//$sql = "INSERT INTO lecturas (valor, id, 	nombre)
//VALUES (".$val.",".$id.",'".$nombre."')";

$sql = "INSERT INTO dato_cerebro (identificacionPaciente, dato, estado)
VALUES (".$cod.",".$val.",'".$estado."')";

//mysqli_query($con,"INSERT INTO Persons (FirstName,LastName,Age) 
//VALUES ('Glenn','Quagmire',33)");

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados Correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

