<?php
include("conexion.php");
$con = conexion();

$consulta = "SELECT * FROM persona";
$resultado = pg_query($con, $consulta);

if (!$resultado) {
    die("Error al ejecutar la consulta: " . pg_last_error($con));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Registros</title>
</head>
<body>
    <h1>Listado de Registros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nro Documento</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Celular</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = pg_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['nro_documento'] . "</td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['apellidos'] . "</td>";
                echo "<td>" . $fila['direccion'] . "</td>";
                echo "<td>" . $fila['celular'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
