<?php
 include("seguridad.php"); 
?>

<?php
if(isset($_POST["guardar"])){
    require("conexion.php");
    $user = htmlentities(addslashes($_POST["user"]));
    $pwd = htmlentities(addslashes($_POST["pwd"]));
    $contador = 0;

    if (!empty($user) && !empty($pwd)){

        $sql = "SELECT * FROM usuario WHERE usuario = :user";
        $result = $conex->prepare($sql);
        $result->bindValue(":user",$user);
        $result->execute();
        $numero_registro = $result->rowCount();

        if ($numero_registro > 0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            if ($user === $row['Usuario'] && password_verify($pwd, $row['Password'])){
                $contador++;
            }
            if ( $contador > 0){
                $contador = 0 ;

                session_start();
                $_SESSION["usuario"] = $row['Usuario'];
                header("location: usuarios.php");
            }else{
                require("formulario.html");
                echo("<script>alert('El usuario y/o contraseña son incorrectos');</script>");
            }
            $result->closeCursor();
        }else{
            require("formulario.html");
                echo("<script>alert('El usuario y/o contraseña son incorrectos');</script>");
        }
    }else{
        require("formulario.html");
        echo("<script>alert('Los campos estan vacios');</script>");
    }
    echo("<meta http-equiv='Refresh'content='2;url=formulario.html'>");
}else{
    header("location:formulario.html");
}
?>