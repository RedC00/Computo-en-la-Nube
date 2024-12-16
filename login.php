<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Acceso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: whitesmoke;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc70;
            border-radius: 3px;
        }
        .btn-container {
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-cancel {
            background-color: #dc3545;
            color: #fff;
            margin-left: 10px;
        }
        a{
            text-align: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="login-form" action="verificar.php" method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Ingresar</button>
                <button type="button" class="btn btn-cancel" onclick="cancel()">Cancelar</button>
            </div>
        </form>
        <a href="Register.html">Registro</a>
    </div>

    <script>
        function cancel() {
            document.getElementById("login-form").reset();
        }
    </script>


</body>
</html>
