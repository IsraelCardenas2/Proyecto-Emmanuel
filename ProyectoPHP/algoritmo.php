
<?php
include("seguridad.php"); 


$nombre = "Emmanuel";
$hash = '$2y$12$EwhVq2MCdgbm760FinjzXOoX3kxf7399PxIpF2yu3RiltsulfqAT. ';

$nombre_cifrado = password_hash($nombre, PASSWORD_DEFAULT, array("cost" => 12));
    echo $nombre_cifrado. "\n";
    if (password_verify('Emmanuel', $hash)) {
        echo "Válido";
    } else {
        echo "Inválido";
    }

?>
