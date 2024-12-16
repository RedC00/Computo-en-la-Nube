<?php
$conexion = mysqli_connect("localhost", "root", "", "proyecto");

if ($conexion === false) {
    die("ERROR: No se pudo conectar. " . mysqli_connect_error());
}

// Procesar la eliminación del proyecto si se ha recibido un ID de proyecto y se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProyecto']) && isset($_POST['eliminar'])) {
    $idProyecto = $_POST['idProyecto'];
    
    // Aquí debes agregar el código para eliminar el proyecto de la base de datos
    $sql = "DELETE FROM proyectos WHERE Id = '$idProyecto'";
    if (mysqli_query($conexion, $sql)) {
        //echo "Proyecto eliminado correctamente.";
    } else {
        //echo "Error al eliminar el proyecto: " . mysqli_error($conexion);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProyecto']) && isset($_POST['editar'])) {
    $idProyecto = $_POST['idProyecto'];
    // Aquí debes agregar el código para eliminar el proyecto de la base de datos
    $sql = "UPDATE proyectos SET (nombre,Descripción,Objetivo,Objetivos,FI,FF) VALUES ('$nombre', '$descripcion','$objetivo_general', '$objetivo_especifico','$fecha_inicio', '$fecha_fin') where Id = '$idProyecto'";
    if (mysqli_query($conexion, $sql)) {
        //echo "Proyecto eliminado correctamente.";
    } else {
        //echo "Error al eliminar el proyecto: " . mysqli_error($conexion);
    }
}



// Si se ha recibido un ID de proyecto y los datos de edición, realizar la actualización del proyecto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProyecto']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['objetivo_general']) && isset($_POST['objetivo_especifico']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
    $idProyecto = $_POST['idProyecto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $objetivoGeneral = $_POST['objetivo_general'];
    $objetivoEspecifico = $_POST['objetivo_especifico'];
    $fechaInicio = $_POST['fecha_inicio'];
    $fechaFin = $_POST['fecha_fin'];

    $sql = "UPDATE proyectos SET nombre='$nombre', Descripción='$descripcion', Objetivo='$objetivoGeneral', Objetivos='$objetivoEspecifico', FI='$fechaInicio', FF='$fechaFin' WHERE Id='$idProyecto'";

    if (mysqli_query($conexion, $sql)) {
        //echo "Proyecto actualizado correctamente.";
    } else {
        //echo "Error al actualizar el proyecto: " . mysqli_error($conexion);
    }
}


// Mostrar la tabla de proyectos actualizada después de la edición o eliminación
$sql = "SELECT * FROM proyectos";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<div style='width: 80%; margin: 0 auto;'>";
    echo "<table id='tabla-proyectos' style='width: 100%; border-collapse: collapse;'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>No.</th>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Nombre</th>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Descripción</th>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Objetivo general</th>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Objetivo específico</th>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Fecha de inicio</th>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Fecha de finalización</th>";
    echo "<th style='padding: 8px; text-align: left; background-color: #f2f2f2;'>Acciones</th>"; // Nueva columna para los botones de acción
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>" . $fila['Id'] . "</td>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>" . $fila['nombre'] . "</td>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>" . $fila['Descripción'] . "</td>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>" . $fila['Objetivo'] . "</td>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>" . $fila['Objetivos'] . "</td>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>" . $fila['FI'] . "</td>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>" . $fila['FF'] . "</td>";
        echo "<td style='padding: 8px; border-bottom: 1px solid #ddd;'>
                <button onclick='editarProyecto(\"" . $fila['Id'] . "\", \"" . $fila['nombre'] . "\", \"" . $fila['Descripción'] . "\", \"" . $fila['Objetivo'] . "\", \"" . $fila['Objetivos'] . "\", \"" . $fila['FI'] . "\", \"" . $fila['FF'] . "\")'>Editar</button>
                <button onclick='eliminarProyecto(\"" . $fila['Id'] . "\")'>Eliminar</button>
              </td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "No se encontraron proyectos.";
}

mysqli_close($conexion);
?>
