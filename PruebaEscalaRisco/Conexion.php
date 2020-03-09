<?php

 try {
    $con = new PDO("sqlsrv:Server=localhost;Database=BD_Risco", "sa", "12345");
}
catch(PDOException $e) {
    die("Error en la conexion a Sql Server: " . $e->getMessage());
}

//echo "<p>Conexion satisfactoria</p>\n";