<?php
    try {
        $conex = new PDO('mysql:host=localhost; dbname=registro', 'root', '');
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conex->exec("SET CHARACTER SET utf8");
    } catch (PDOException $e) {
        die('Error: ' . $e->getMessage());
    }

?>