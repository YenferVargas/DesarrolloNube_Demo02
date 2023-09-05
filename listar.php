<?php
// Incluye la función de conexión a la base de datos
include("conexion.php");

// Establece la conexión
$con = conexion();

// Realiza la consulta para obtener los registros de la tabla persona
$query = "SELECT * FROM persona";

// Ejecuta la consulta
$result = pg_query($con, $query);

// Verifica si la consulta fue exitosa
if (!$result) {
    die("Error al realizar la consulta.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Registros</title>
</head>
<body>
    <h1>Listado de Registros</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nro Documento</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Celular</th>
        </tr>
        <?php
        // Recorre los resultados y muestra cada fila en la tabla
        while ($row = pg_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nro_documento'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['apellidos'] . "</td>";
            echo "<td>" . $row['direccion'] . "</td>";
            echo "<td>" . $row['celular'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cierra la conexión a la base de datos
pg_close($con);
?>
