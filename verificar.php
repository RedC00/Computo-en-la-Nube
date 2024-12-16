<?php
// Configuración de la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en otro lugar
$usuario_db = "root"; // Cambia esto al usuario de tu base de datos
$contrasena_db = ""; // Cambia esto a la contraseña de tu base de datos
$nombre_db = "proyecto"; // Cambia esto al nombre de tu base de datos
// Conexión a la base de datos
$conexion = new mysqli($host, $usuario_db, $contrasena_db, $nombre_db);
// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST["username"];
    $contrasena = $_POST["password"];

    // Consulta SQL para verificar las credenciales
    $consulta = "SELECT * FROM usuarios WHERE user = '$usuario' AND password = '$contrasena'";
    $resultado = $conexion->query($consulta);

    // Verificar si se encontró algún usuario
    if ($resultado->num_rows > 0) {
    // Inicio de sesión exitoso, redirigir al usuario a otra página con JavaScript
        echo "<script>window.location.href = 'menu.php';</script>";
    exit();
    } else {
    // Credenciales incorrectas, mostrar un mensaje de error
        echo "Usuario o contraseña incorrectos.";
    }
}
// Cerrar la conexión a la base de datos
$conexion->close();
?>
