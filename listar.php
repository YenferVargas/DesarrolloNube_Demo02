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
    <div class="container">
    <h2>Listado de Registros</h2>
    <table class="table">
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
            // Recorre los resultados y muestra cada fila en la tabla
            while ($fila = pg_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . (isset($fila['id']) ? $fila['id'] : '') . "</td>";
                echo "<td>" . (isset($fila['nro_documento']) ? $fila['nro_documento'] : '') . "</td>";
                echo "<td>" . (isset($fila['nombre']) ? $fila['nombre'] : '') . "</td>";
                echo "<td>" . (isset($fila['apellidos']) ? $fila['apellidos'] : '') . "</td>";
                echo "<td>" . (isset($fila['direccion']) ? $fila['direccion'] : '') . "</td>";
                echo "<td>" . (isset($fila['celular']) ? $fila['celular'] : '') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
// Cierra la conexión a la base de datos
pg_close($con);
?>
