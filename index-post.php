<?php
include("conexion.php");
$con = conexion();

$doc = $_POST["doc"];
$nom = $_POST["nom"];
$ape = $_POST["ape"];
$dir = $_POST["dir"];
$cel = $_POST["cel"];

// Verificar la longitud de los valores antes de la inserción
if (strlen($doc) <= 9 && strlen($nom) <= 255 && strlen($ape) <= 255 && strlen($dir) <= 255 && strlen($cel) <= 20) {
    $sql = "INSERT INTO persona VALUES (default, '$doc', '$nom', '$ape', '$dir', '$cel')";
    
    $result = pg_query($con, $sql);

    if (!$result) {
        die("Error al ejecutar la consulta: " . pg_last_error($con));
    }

    // Redirigir después de la inserción exitosa
    header("location:index.php");
} else {
    // Mostrar un mensaje de error si los datos exceden las longitudes permitidas
    echo "Error: Alguno de los datos ingresados excede la longitud permitida.";
}
?>
