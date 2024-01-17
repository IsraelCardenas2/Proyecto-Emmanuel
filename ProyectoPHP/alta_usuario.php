<?php

$Nombre = $_POST['Nombre'];
$Apellidos = $_POST['Apellidos'];
$Genero = $_POST['Genero'];
$Direccion = $_POST['Direccion'];
$Usuario = $_POST['Usuario'];
$Password = $_POST['Password'];

$pwd_cifrado = password_hash($Password, PASSWORD_DEFAULT, array("cost" => 9));

include("conexion.php");

$sql = "INSERT INTO `usuario` (`id_usuario`, `Nombre`, `Apellidos`, `Genero`, `Direccion`, `Usuario`, `Password`) VALUES (NULL, :Nombre, :Apellidos, :Genero, :Direccion, :Usuario, :Password)";
$result = $conex->prepare($sql);
$result->execute(array(":Nombre" => $Nombre, ":Apellidos" => $Apellidos, ":Genero" => $Genero, ":Direccion" => $Direccion, ":Usuario" => $Usuario, ":Password" => $pwd_cifrado));

header("location: formulario.html");
?>
