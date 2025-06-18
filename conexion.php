<?php
error_reporting(0);

$conexion = mysqli_connect("localhost", "root", "", "conexion");
if (!$conexion) {
    exit("Error al intentar conectarse al servidor MySQL.");
}

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$esMayorDeEdad = $_POST["esMayorDeEdad"];

if (empty($email)) {
    exit("Fallo en el registro, para poder registrarte debes introducir tu dirección de email.");
}

$consulta = "INSERT INTO usuarios (nombre, telefono, email, esMayorDeEdad) VALUES ('$nombre', '$telefono', '$email', '$esMayorDeEdad')";
$resultado = mysqli_query($conexion, $consulta);
$num = mysqli_affected_rows($conexion);

if ($num > 0) {
    echo "Su registro se ha completado. Gracias!";
} else {
    echo "Error! Su registro no se ha podido completar.";
}

mysqli_close($conexion);
?>