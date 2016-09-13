<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pacientes";

$con = mysqli_connect($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$val = $_GET['valor'];
$id = $_GET['id'];

$var ="INSERT INTO lecturas (valor,id) VALUES (".$val.,.$id.")";
mysqli_query($con,$var);
echo($var)
?>