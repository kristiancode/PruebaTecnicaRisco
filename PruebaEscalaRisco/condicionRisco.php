<?php
// incluimos la conexion a sql server
include_once("Conexion.php");

//validar si se preciono el boton insertar y realizamos la insercion a la bd 
if(isset($_POST['insertar'])){
    $nombre = $_POST['nombre'];
    $pesoCompleto = $_POST['pesoCompleto'];
    $calorias = $_POST['calorias'];

    //"INSERT INTO Tbl_Risco (PesoCompleto,Calorias)VALUES ('$nombre','$pesoCompleto','$calorias')";
    $Sentencia = $con->prepare("INSERT INTO Tbl_Risco (Nombre,PesoCompleto,Calorias) VALUES (?,?,?)");
    $Ejecutar = $Sentencia->execute([$nombre, $pesoCompleto, $calorias]);
    if($Ejecutar){
        echo "<h3 style = 'color: white;' >Datos insertados correctamente</h3>.<br />.<br />";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Estilos.css">
    <title>Resultado</title>    
</head>
<body>
    <!-- inicio menu navegacion -->
    <nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="Index.html">Inicio</a>
        </li>        
    </ul>
    </nav>
    <!-- Fin menu navegacion -->
    <div class="container">
        <div class="ColorTexto">
            <h1 class="ColorTexto">Resultados de los datos de escala al risco</h1>
            <p class="ColorTexto"><strong>Nombre:</strong><?php echo " ".$nombre ?></p>
            <p class="ColorTexto"><strong>Peso corporal y de los elementos:</strong><?php echo " ".$pesoCompleto ?></p>
            <p class="ColorTexto"><strong>Calorias:</strong><?php echo " ".$calorias ?></p>
            <p><strong>Estado:</strong>
                <?php 
                if ($pesoCompleto >= 30 && $pesoCompleto <= 75 && $calorias >= 100 && $calorias <= 1600) {
                    echo "Cumple con los requisitos para escalar el risco";
                }else{
                    echo "No cumple con los requisitos para escalar el risco";
                }
                ?>
            </p>
        </div>
    </div>
</body>
</html>