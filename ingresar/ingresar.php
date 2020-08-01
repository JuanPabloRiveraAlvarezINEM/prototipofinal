<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="LogoR3AI.ico" type="image/x-icon"/>
</head>
<body>

<?php

require("ingresar.html");

require("para.php");

if(isset($_POST["entrar"])){

    try{

        $conexion=mysqli_connect($host,$us,$pass,$bd) or die("Error en la informacion de la base de datos o el host");

        $mail=mysqli_real_escape_string($conexion, $_POST["mail"]);

        $contraseña=mysqli_real_escape_string($conexion,$_POST["contraseña"]);

        $consulta="select * from usuarios";

        $resultado=mysqli_query($conexion,$consulta);

        while($puntero=mysqli_fetch_assoc($resultado)){

            if($mail==$puntero["mail"] && password_verify($contraseña,$puntero['contraseña'])){
                

                header("Location:/ModeloAltaFidelidad/muro/index.php?m=1");

                session_start();

                $_SESSION["mail"]=$_POST["mail"];
            
            }

        }

        echo "
        <script type=text/javascript>
        alert('Datos Incorrectos');
        </script>
        ";
    
    }catch(exception $e){

        echo "<script type=text/javascript>
        alert('Error en credenciales de conexion');
        </script>";
        
    }


}

   
    
?>
    
</body>
</html>
