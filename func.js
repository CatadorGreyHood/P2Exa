// Función para editar un autor existente
function editarAutor(id) {
    // Implementar según la lógica necesaria
    // Ejemplo de llamada AJAX para editar
}

// Función para eliminar un autor
function eliminarAutor(id) {
    $.ajax({
        url: 'eliminar_autor.php',  // Cambia esto por el archivo que maneja la eliminación SQL
        type: 'POST',
        data: {
            id: id
        },
        success: function(response) {
            listarAutores();
        }
    });
}

// Función para editar un libro existente
function editarLibro(id) {
    // Implementar según la lógica necesaria
    // Ejemplo de llamada AJAX para editar
}

// Función para eliminar un libro
function eliminarLibro(id) {
    $.ajax({
        url: 'eliminar_libro.php',  // Cambia esto por el archivo que maneja la eliminación SQL
        type: 'POST',
        data: {
            id: id
        },
        success: function(response) {
            listarLibros();
        }
    });
}
