<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con HTML5 y CSS3</title>
    <link rel="stylesheet" href="css/estilos_formulario.css">
</head>
<body>
<?php
header('Content-Type: text/html; charset=utf-8');

$nombre = "";
$apellidos = "";
$direccion = "";
$genero = "";
$checkbox = "";
$usuario = "";
$password = "";

$nombreErr = "";
$apellidosErr = "";
$direccionErr = "";
$generoErr = "";
$checkboxErr = "";
$usuarioErr = "";
$passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Nombre"])) {
        $nombreErr = "El campo Nombre es requerido";
    } else {
        $nombre = test_input($_POST["Nombre"]);
        if (!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,}(?:\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,})?$/u", $nombre)) {
            $nombreErr = "El nombre no es válido. Por favor, ingresa un nombre válido sin caracteres especiales y números";
        }


        // $nombre = htmlspecialchars($_POST["Nombre"], ENT_QUOTES, 'UTF-8');
        // if (!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,}(?:\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,})?$/u", $nombre)) {
        //     $nombreErr = "El nombre no es válido. Por favor, ingresa un nombre válido sin caracteres especiales y números";
        // }
    }

    if (empty($_POST["Apellidos"])) {
        $apellidosErr = "El campo Apellidos es requerido";
    } else {
        $apellidos = test_input($_POST["Apellidos"]);
        if (!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,}\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,}$/u", $apellidos)) {
            $apellidosErr = "Los apellidos no son válidos. Por favor, ingresa apellidos válidos sin caracteres especiales y números";
        }
        
        
        // $apellidos = htmlspecialchars($_POST["Apellidos"], ENT_QUOTES, 'UTF-8');
        // if (!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,}\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,}$/u", $apellidos)) {
        //     $apellidosErr = "Los apellidos no son válidos. Por favor, ingresa exactamente dos apellidos válidos sin caracteres especiales y números.";
        // }
    }

    if (empty($_POST["Direccion"])) {
        $direccionErr = "El campo Direccion es requerido";
    } else {
        $direccion = test_input($_POST["Direccion"]);
        if (!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ0-9\s\.,#\-_]+(?:,[\sA-ZÁÉÍÓÚÜÑa-záéíóúüñ0-9\s\.,#\-_]+)*$/u", $direccion)) {
            $direccionErr = "La dirección no cumple con el formato ";
        }
/////////////////////////////////////////////////////////////////////////////////////////////////

        if (empty($_POST["Usuario"])) {
            $usuarioErr = "El campo Usuario es requerido";
        } else {
            $usuario = test_input($_POST["Usuario"]);
            if (!preg_match("/^[A-Za-z0-9_]+$/", $usuario)) {
                $usuarioErr = "El usuario no cumple con el formato permitido";
            }
        }

        if (empty($_POST["Password"])) {
            $passwordErr = "El campo Password es requerido";
        } else {
            $password = test_input($_POST["Password"]);
            if (!preg_match("/^[A-Za-z0-9_]+$/", $password)) {
                $passwordErr = "La contraseña no cumple con el formato permitido";
            }

        }


////////////////////////////////////////////////////////////////////////////////////////////

    //     $direccion = htmlspecialchars($_POST["Direccion"], ENT_QUOTES, 'UTF-8');
    //     if (!preg_match("/^[A-ZÁÉÍÓÚÜÑa-záéíóúüñ][a-záéíóúüñ0-9\s\.,#\-_]{3,}$/u", $direccion)) {
    //     $direccionErr = "La dirección no es valida";
    // }

    }

    if (empty($_POST["Genero"])) {
        $generoErr = "Selecciona tu género";
    } else {
        $genero = test_input($_POST["Genero"]);
    }


    if (empty($_POST["checkbox"])) {
        $checkboxErr = "Acepta términos y condiciones";
    } else {
        $checkbox = test_input($_POST["checkbox"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    // $data = htmlentities($data,  ENT_QUOTES, 'UTF-8');
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}
?>

<div class="contenedor">
    <label for="titulo" class="titulo">Registro de Usuarios</label>
    <form accept-charset="UTF-8" action="alta_usuario.php" onsubmit="return validarFormulario()" class="formulario" name="formulario" method="post">
        <label for="nombre">Nombre:</label>
        <input value="<?php echo $nombre; ?>" type="text" name="Nombre" id="nombre" placeholder="Escribe tu nombre" class="form-control">
        <p class="error"> <?php echo $nombreErr; ?> </p>

        <label for="apellidos">Apellidos:</label>
        <input value="<?php echo $apellidos; ?>" type="text" name="Apellidos" id="apellidos" placeholder="Escribe tus apellidos" class="form-control">
        <p class="error"> <?php echo $apellidosErr; ?> </p>

        <label for="Genero">Seleccione su género:</label>
        <div class="radio">
            <input type="radio" name="Genero" id="H" value="M" <?php echo ($genero == "M") ? "checked" : ""; ?>>
            <label for="H" id="mas">Masculino</label>
            <input type="radio" name="Genero" id="M" value="F" <?php echo ($genero == "F") ? "checked" : ""; ?>>
            <label for="M" id="fem">Femenino</label>
        </div>
        <p class="error"> <?php echo $generoErr; ?> </p>

        <label for="#domicilio">Domicilio</label>
        <input value="<?php echo $direccion; ?>" type="text" name="Direccion" id="domicilio" placeholder="Describe la dirección de tu domicilio" class="form-control">
        <p class="error"> <?php echo $direccionErr; ?> </p>

        <label for="#usuario">Usuario</label>
        <input value="<?php echo $usuario; ?>" type="text" name="Usuario" id="usuario" placeholder="Crea un usuario" class="form-control">
        <p class="error"> <?php echo $usuarioErr; ?> </p>

        <label for="#password">Contraseña</label>
        <input value="<?php echo $password; ?>" type="password" name="Password" id="password" placeholder="Genera una contraseña" class="form-control">
        <p class="error"> <?php echo $passwordErr; ?> </p>


        <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox" <?php echo ($checkbox == "on") ? "checked" : ""; ?> class="form-control">
            <label for="checkbox">Acepto términos y condiciones</label>
        </div>
        <p class="error"> <?php echo $checkboxErr; ?> </p>
        <div class="btn-group">
            <input type="reset" value="Cancelar" class="cancelar">
            <input type="submit" value="Registrar" class="guardar">
        </div>
    </form>
</div>
<script src="js/instrucciones.js"></script>
</body>
</html>
