<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRUD de Autores y Libros con Paginación y Tablas</title>
<style>
    /* Estilos básicos para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .pagination {
        list-style-type: none;
        display: inline-block;
        margin: 0;
        padding: 0;
    }
    .pagination li {
        display: inline;
        margin-right: 5px;
    }
    .pagination li.active {
        font-weight: bold;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Función para listar autores con paginación
    function listarAutores(page, limit) {
        $.ajax({
            url: 'listar_autores.php',
            type: 'GET',
            data: {
                page: page,
                limit: limit
            },
            success: function(response) {
                $('#lista-autores').html(response);
            }
        });
    }

    // Función para listar libros con paginación
    function listarLibros(page, limit) {
        $.ajax({
            url: 'listar_libros.php',
            type: 'GET',
            data: {
                page: page,
                limit: limit
            },
            success: function(response) {
                $('#lista-libros').html(response);
            }
        });
    }

    // Listar autores al cargar la página
    listarAutores(1, 10);  // Página 1, 10 registros por página por defecto

    // Listar libros al cargar la página
    listarLibros(1, 10);  // Página 1, 10 registros por página por defecto

    // Manejar la navegación de páginas para autores
    $(document).on('click', '#lista-autores .pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('=')[1];
        var limit = $(this).attr('href').split('=')[2];
        listarAutores(page, limit);
    });

    // Manejar la navegación de páginas para libros
    $(document).on('click', '#lista-libros .pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('=')[1];
        var limit = $(this).attr('href').split('=')[2];
        listarLibros(page, limit);
    });

    // Funciones para editar y eliminar autores y libros (implementar según sea necesario)
    function editarAutor(id) {
        // Implementar según la lógica necesaria
    }

    function eliminarAutor(id) {
        // Implementar según la lógica necesaria
    }

    function editarLibro(id) {
        // Implementar según la lógica necesaria
    }

    function eliminarLibro(id) {
        // Implementar según la lógica necesaria
    }
});
</script>
</head>
<body>
    <h1>CRUD de Autores con Paginación</h1>

    <!-- Lista de autores -->
    <div id="lista-autores">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrará la lista de autores -->
            </tbody>
        </table>
        <div class="pagination-container">
            <!-- Aquí se mostrarán los controles de paginación para autores -->
        </div>
    </div>

    <hr>

    <h1>CRUD de Libros con Paginación</h1>

    <!-- Lista de libros -->
    <div id="lista-libros">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Fecha de Publicación</th>
                    <th>Precio</th>
                    <th>Autor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrará la lista de libros -->
            </tbody>
        </table>
        <div class="pagination-container">
            <!-- Aquí se mostrarán los controles de paginación para libros -->
        </div>
    </div>
</body>
</html>
