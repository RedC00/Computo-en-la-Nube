<?php
// Configuración de la conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en otro lugar
$usuario_db = "root"; // Cambia esto al usuario de tu base de datos
$contrasena_db = ""; // Cambia esto a la contraseña de tu base de datos
$nombre_db = "proyecto"; // Cambia esto al nombre de tu base de datos
$mensaje = "Correo Ya Existente, Redirigiendo.... Por favor Intentelo Nuevamente!";

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario_db, $contrasena_db, $nombre_db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Verificar si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["password"];

    // Verificar si el correo ya está registrado
    $consulta_email_existente = "SELECT * FROM usuarios WHERE user = '$email'";
    $resultado_email_existente = $conexion->query($consulta_email_existente);

    if ($resultado_email_existente->num_rows > 0) {
        echo "<script>alert('$mensaje');
        setTimeout(function() {
            window.location.href = 'Register.html';
        }, " . (2000) . ");
        </script>";
    } else {
        // Consulta SQL para insertar los datos en la tabla de usuarios
        $consulta = "INSERT INTO usuarios (nombre, user, password) VALUES ('$nombre', '$email', '$contrasena')";

        // Ejecutar la consulta y verificar si se realizó correctamente
        if ($conexion->query($consulta) === TRUE) {
            echo "Registro exitoso. ¡Ahora puedes iniciar sesión!";
            // Redirigir al usuario a la página de inicio de sesión
            header("Location: login.php");
            exit();
        } else {
            echo "Error al registrar el usuario: " . $conexion->error;
        }
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
