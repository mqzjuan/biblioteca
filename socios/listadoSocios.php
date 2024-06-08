<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de socios</title>
    <link rel="stylesheet" href="listado.css">
</head>
<body>
    <h2>Listado de socios</h2>
    <table border="1">
        <tr>
            <th>Codigo de socio</th>
            <th>Nombre y apellido</th>
            <th>Fecha de nacimiento</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Operacion</th>
        </tr>
        <?php
        // Conexión a la base de datos
        include 'conexion.php';

        // Consulta SQL para obtener los datos de los socios
        $sql = "SELECT * FROM socios";
        $result = $conn->query($sql);

        // Verificar si hay filas de datos
        if ($result->num_rows > 0) {
            // Iterar sobre cada fila de datos
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["cod_socio"]."</td>";
                echo "<td>".$row["nomyape"]."</td>";
                echo "<td>".$row["fnac"]."</td>";
                echo "<td>".$row["direccion"]."</td>";
                echo "<td>".$row["telefono"]."</td>";
                echo "<td>".$row["email"]."</td>";
                echo "<td><button>Editar</button><button>Eliminar</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay socios registrados</td></tr>";
        }
        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
    </table>
   <button onclick="location.href='socios/registrarSocio.php'">Registrar socio</button>
   <button onclick="location.href='../gestor.php'">Volver al inicio</button>
</body>
</html>