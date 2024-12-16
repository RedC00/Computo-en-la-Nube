<?php
// Verificar si se recibieron datos del formulario
if(isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['objetivo_general']) && isset($_POST['objetivo_especifico']) && isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])){

    // Conectar a la base de datos (reemplaza 'tus_datos' por los datos de tu conexión)
    $conexion = mysqli_connect("localhost", "root", "", "proyecto");

    // Verificar la conexión
    if ($conexion === false) {
        die("ERROR: No se pudo conectar. " . mysqli_connect_error());
    }

    // Escapar las variables para evitar inyección SQL
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $objetivo_general = mysqli_real_escape_string($conexion, $_POST['objetivo_general']);
    $objetivo_especifico = mysqli_real_escape_string($conexion, $_POST['objetivo_especifico']);
    $fecha_inicio = mysqli_real_escape_string($conexion, $_POST['fecha_inicio']);
    $fecha_fin = mysqli_real_escape_string($conexion, $_POST['fecha_fin']);

    // Query para insertar datos en la tabla 'proyectos'
    $idProyecto = $_POST['idProyecto'];
    $sql = "UPDATE proyectos SET nombre='$nombre', Descripción='$descripcion', Objetivo='$objetivo_general', Objetivos='$objetivo_especifico', FI='$fecha_inicio', FF='$fecha_fin' WHERE Id='$idProyecto'";

    // Ejecutar la consulta
    if(mysqli_query($conexion, $sql)){
        // Mostrar un mensaje de éxito y recargar la página automáticamente después de 2 segundos
        echo "<script>alert('Proyecto guardado exitosamente.'); </script>";
        header("Location: menu.php");
    } else{
        echo "ERROR: No se pudo ejecutar la consulta $sql. " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "ERROR: No se recibieron datos del formulario.";
}
?>