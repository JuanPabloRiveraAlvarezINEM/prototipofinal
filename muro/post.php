<?php
require("index.php");
require("para.php");
$r=NULL;
$comentario="";
$comentario=$_POST["comentario"];

if(!isset($_SESSION["mail"])){
    header("location:/ModeloAltaFidelidad/ingresar/ingresar.html");
}


function imprimir($conexion){
    $consulta="SELECT * FROM `muro` ORDER BY fecha DESC";
          $r=mysqli_query($conexion,$consulta);
          while($puntero=mysqli_fetch_row($r)){
            ?>
            <div id="impresion">
              <p><?php echo "$puntero[1]"."<br>";?></p>
            </div>
            <?php
          }
  }
  

$conexion=mysqli_connect($host,$us,$pass,$bd);
if(isset($_GET['m'])){
  $m=$_GET['m'];
  if($m==1){
    imprimir($conexion);
    $m=0;
  }
}

if(isset($_POST["boton"])){
    
    
    try{
      $consulta="INSERT INTO muro VALUES(NULL,'$comentario', CURRENT_TIMESTAMP)";
      $r=mysqli_query($conexion,$consulta);
      $r=NULL;
      imprimir($conexion);
      $m=0;
      $comentario="";
    }catch(exception $e){
        echo "Error";
    }
}
?>