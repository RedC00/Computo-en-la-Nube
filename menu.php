<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
        }

        .contenedor_general{
            width: 75%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: whitesmoke;
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

        /* Estilos para la ventana modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilos para los campos de la ventana modal */
        .modal-input {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>

</head>
<body>
<div class="contenedor_general">
        <p class="parrafo_prueba">BIENVENIDO!!!</p>
        <div>
            <button onclick="abrirModal()" class="btn btn-primary">Nuevo proyecto</button>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="cerrarModal()">&times;</span>
                    <h2>Nuevo proyecto</h2>
                    <form action="guardar_proyecto.php" method="POST">
                        <label for="nombre">Nombre:</label><br>
                        <input type="text" id="nombre" name="nombre" class="modal-input" required><br>

                        <label for="descripcion">Descripción:</label><br>
                        <textarea id="descripcion" name="descripcion" class="modal-input" required></textarea><br>

                        <label for="objetivo_general">Objetivo General:</label><br>
                        <input type="text" id="objetivo_general" name="objetivo_general" class="modal-input" required><br>

                        <label for="objetivo_especifico">Objetivo Especifico:</label><br>
                        <input type="text" id="objetivo_especifico" name="objetivo_especifico" class="modal-input" required><br>

                        <label for="fecha_inicio">Fecha de Inicio:</label><br>
                        <input type="Date" id="fecha_inicio" name="fecha_inicio" class="modal-input" required><br>

                        <label for="fecha_fin">Fecha Final:</label><br>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="modal-input" required><br>

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>

        <div>
            <h2>Proyectos</h2>
            <?php include_once("mostrar_proyectos.php"); ?>
        </div>
    </div>

    <!-- Agrega este formulario de edición en tu HTML -->
<div id="modalEditar" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="cerrarModalEditar()">&times;</span>
        <h2>Editar proyecto</h2>
        <form id="formEditarProyecto" action="editar_proyecto.php" method="POST">
            <input type="hidden" id="idProyectoEditar" name="idProyecto">
            <label for="nombreEditar">Nombre:</label><br>
            <input type="text" id="nombreEditar" name="nombre" class="modal-input" required><br>
            <label for="descripcionEditar">Descripción:</label><br>
            <textarea id="descripcionEditar" name="descripcion" class="modal-input" required></textarea><br>
            <label for="objetivoGeneralEditar">Objetivo General:</label><br>
            <textarea id="objetivoGeneralEditar" name="objetivo_general" class="modal-input" required></textarea><br>
            <label for="objetivoEspecificoEditar">Objetivos específicos:</label><br>
            <textarea id="objetivoEspecificoEditar" name="objetivo_especifico" class="modal-input" required></textarea><br>
            <label for="fechaInicioEditar">Fecha inicio</label><br>
            <input type="date" id="fechaInicioEditar" name="fecha_inicio" class="modal-input" required><br>
            <label for="fechaFinEditar">Fecha de finalización</label><br>
            <input type="date" id="fechaFinEditar" name="fecha_fin" class="modal-input" required><br>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</div>


    <script>
    function abrirModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function cerrarModal() {
        document.getElementById("myModal").style.display = "none";
    }

    function editarProyecto(id, nombre, descripcion, objetivoGeneral, objetivoEspecifico, fechaInicio, fechaFin) {
    console.log("Editar proyecto llamado");
    document.getElementById("idProyectoEditar").value = id;
    document.getElementById("nombreEditar").value = nombre;
    document.getElementById("descripcionEditar").value = descripcion;
    document.getElementById("objetivoGeneralEditar").value = objetivoGeneral;
    document.getElementById("objetivoEspecificoEditar").value = objetivoEspecifico;
    document.getElementById("fechaInicioEditar").value = fechaInicio;
    document.getElementById("fechaFinEditar").value = fechaFin;
    document.getElementById("modalEditar").style.display = "block";
}

function cerrarModalEditar() {
    document.getElementById("modalEditar").style.display = "none";
}

function guardarCambios() {
    var idProyecto = document.getElementById("idProyectoEditar").value;
    var nombre = document.getElementById("nombreEditar").value;
    var descripcion = document.getElementById("descripcionEditar").value;
    var objetivoGeneral = document.getElementById("objetivoGeneralEditar").value;
    var objetivoEspecifico = document.getElementById("objetivoEspecificoEditar").value;
    var fechaInicio = document.getElementById("fechaInicioEditar").value;
    var fechaFin = document.getElementById("fechaFinEditar").value;

    var parametros = "idProyecto=" + idProyecto + "&nombre=" + nombre + "&descripcion=" + descripcion +
        "&objetivo_general=" + objetivoGeneral + "&objetivo_especifico=" + objetivoEspecifico +
        "&fecha_inicio=" + fechaInicio + "&fecha_fin=" + fechaFin;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "mostrar_proyectos.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Actualizar la tabla de proyectos después de guardar los cambios
            document.getElementById("tabla-proyectos").innerHTML = xhr.responseText;
            // Cerrar la ventana modal de edición
            cerrarModalEditar();
        }
    };

    xhr.send(parametros);
}

    function eliminarProyecto(idProyecto) {
        // Confirmar con el usuario antes de eliminar el proyecto
        if (confirm("¿Estás seguro de que deseas eliminar este proyecto?")) {
            // Crear una nueva instancia de XMLHttpRequest
            var xhr = new XMLHttpRequest();
            
            // Configurar la solicitud
            xhr.open("POST", window.location.href, true); // Usar la misma URL actual
            
            // Configurar el encabezado de la solicitud
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
            // Definir la función de devolución de llamada cuando la solicitud esté completa
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Recargar la página para mostrar los cambios después de la eliminación
                    location.reload();
                } else {
                    // Manejar errores de eliminación
                    console.error('Error al eliminar el proyecto');
                }
            };
            
            // Enviar la solicitud con los datos del proyecto a eliminar
            xhr.send("eliminar=&idProyecto=" + idProyecto);
        }
    }
    </script>

</body>
</html>