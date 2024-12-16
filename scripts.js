function abrirModal() {
    document.getElementById("myModal").style.display = "block";
}

function cerrarModal() {
    document.getElementById("myModal").style.display = "none";
}

        
        function editarProyecto(id, nombre, descripcion) {
        document.getElementById("idProyectoEditar").value = id;
        document.getElementById("nombreEditar").value = nombre;
        document.getElementById("descripcionEditar").value = descripcion;
        document.getElementById("modalEditar").style.display = "block";
    }

    function cerrarModalEditar() {
        document.getElementById("modalEditar").style.display = "none";
    }
    function guardarCambios() {
        var idProyecto = document.getElementById("idProyectoEditar").value;
        var nombre = document.getElementById("nombreEditar").value;
        var descripcion = document.getElementById("descripcionEditar").value;
        
        var parametros = "idProyecto=" + idProyecto + "&nombre=" + nombre + "&descripcion=" + descripcion;
        
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