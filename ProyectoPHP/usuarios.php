<?php
 include("seguridad.php"); 
?>

<?php
include_once("conexion.php");
$sql = "SELECT * FROM usuario ORDER BY Nombre ASC";
$result = $conex -> prepare($sql);
$result->execute();
$row = $result->fetchAll();
$tot__registros = $result->rowCount();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos_de_usuarios.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Document</title>

    <style>
         
         .fondo{
            background-color: white;
            height: 10%;
            padding: 20px;
            margin-top: 100px;
            margin-left: 150px;
            margin-right: 80px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);   
        }
        .borde{
            background-color: white;
            padding: 10px;
        }
        h2{
            text-align: center;
            color: rgb(42, 42, 136);
        }
        table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: rgb(42, 42, 136);
    color: #fff;
}

/* Estilo para las filas impares (gris) */
tr:nth-child(odd) {
    background-color: #ccc; /* Puedes ajustar el tono de gris según tus preferencias */
    color: #000; /* Color del texto para las filas impares */
}

/* Estilo para las filas pares (blanco) */
tr:nth-child(even) {
    background-color: #fff;
    color: #000; /* Color del texto para las filas pares */
}
 
    </style>
</head>
<body>
     <nav class="barra_de_navegacion">
        <div class="umb">
        <h2 >UMB San Jose del Rincon</h2>
        </div>
    <input class="buscar" type="search" placeholder="¿A quien buscaremos hoy?">
    <h5>Bienvenido <?php $user = $_SESSION['usuario']; echo $user; ?></h5>
    </nav>
    <header id="header">
        <nav id="navigation" class="menu">
            <div class="enlaces" id="enlaces">
                <a href="" ><i class="fa fa-bars" aria-hidden="true"></i> </a>
                <a href="#home" ><i class="fa fa-home" aria-hidden="true"></i> </a>
                <a href="validacion2.html" ><i class="fa fa-plus" aria-hidden="true"></i></a>
                <a href="#acerca" ><i class="fa fa-users" aria-hidden="true"></i></a>
                <a href="logout.php" ><i class="fa fa-power-off" aria-hidden="true"></i></a>   
            </div>

        </nav>
    </header> 
<div class="fondo">
    <div class="borde">
        <h2>Consulta General de Usuarios</h2>
        <h5>Total de registros: <?php echo $tot__registros ?> </h5>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Genero</th>
                <th>Direccion</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($row as $fila):?>
            <tr>
                <td><?php echo $fila['Nombre']; ?></td>
                <td><?php echo $fila['Apellidos']; ?></td>
                <td><?php if ($fila['Genero']=="M"){echo ("Masculino");}else{echo ("Femenino");} ?></td>
                <td><?php echo $fila['Direccion']; ?></td>
                <td><?php echo $fila['Usuario']; ?></td>
            
            
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>