

use ExaWebApp;

CREATE TABLE Autores (
    id INT PRIMARY KEY,
    nombre VARCHAR(100),  
    apellido VARCHAR(100),  
	fecha_nacimiento DATE  
);

CREATE TABLE Libros (
    id INT PRIMARY KEY,
    título VARCHAR(255),  
    fecha_publicacion DATE,
    autor_id INT,
    precio DECIMAL(10, 2),  
    FOREIGN KEY (autor_id) REFERENCES Autores(id)
);

-- INserción de datos
INSERT INTO Autores (id, nombre, apellido, fecha_nacimiento) 
VALUES
    (1, 'Gabriel', 'García Márquez', '1927-03-06'),
    (2, 'J.K.', 'Rowling', '1965-07-31'),
    (3, 'Haruki', 'Murakami', '1949-01-12'),
    (4, 'Jane', 'Austen', '1775-12-16'),
    (5, 'George', 'Orwell', '1903-06-25');


INSERT INTO Libros (id, título, fecha_publicacion, autor_id, precio) 
VALUES
    (1, 'Cien años de soledad', '1967-05-30', 1, 19.99),
    (2, 'Harry Potter and the Philosopher''s Stone', '1997-06-26', 2, 12.99),
    (3, 'Norwegian Wood', '1987-08-28', 3, 15.50),
    (4, 'Pride and Prejudice', '1813-01-28', 4, 10.25),
    (5, '1984', '1949-06-08', 5, 9.99);
Go


-- Creación de vistas\

-- VISTAS AUTORES

-- Lista a todos los autores
CREATE VIEW Vista_ListaAutores
AS
SELECT id, nombre, apellido, fecha_nacimiento
FROM Autores;
GO

-- Vista y proc. agregar autor

CREATE VIEW Vista_AgregarAutor
AS
SELECT 1 AS Operacion;  
GO

CREATE PROCEDURE AgregarAutor
    @nombre VARCHAR(100),
    @apellido VARCHAR(100),
    @fecha_nacimiento DATE
AS
BEGIN
    INSERT INTO Autores (nombre, apellido, fecha_nacimiento)
    VALUES (@nombre, @apellido, @fecha_nacimiento);
END;
GO

-- Vista y proc. editar autor
CREATE VIEW Vista_EditarAutor
AS
SELECT 1 AS Operacion;  -- Esta vista se utilizará para indicar que se va a editar un autor existente
GO

CREATE PROCEDURE EditarAutor
    @id INT,
    @nombre VARCHAR(100),
    @apellido VARCHAR(100),
    @fecha_nacimiento DATE
AS
BEGIN
    UPDATE Autores
    SET nombre = @nombre,
        apellido = @apellido,
        fecha_nacimiento = @fecha_nacimiento
    WHERE id = @id;
END;
GO

-- Vista y Proc. eliminar autor
CREATE VIEW Vista_EliminarAutor
AS
SELECT 1 AS Operacion;  
GO


CREATE PROCEDURE EliminarAutor
    @id INT
AS
BEGIN
    DELETE FROM Autores
    WHERE id = @id;
END;
GO


-- VISTAS LIBROS

-- Vista y proc. agregar libro
CREATE VIEW Vista_AgregarLibro
AS
SELECT 1 AS Operacion;  
GO

CREATE PROCEDURE AgregarLibro
    @título VARCHAR(255),
    @fecha_publicacion DATE,
    @autor_id INT,
    @precio DECIMAL(10, 2)
AS
BEGIN
    INSERT INTO Libros (título, fecha_publicacion, autor_id, precio)
    VALUES (@título, @fecha_publicacion, @autor_id, @precio);
END;
GO

-- Vista listar libros
CREATE VIEW Vista_ListaLibros
AS
SELECT l.id, l.título, l.fecha_publicacion, l.precio, a.nombre + ' ' + a.apellido AS autor
FROM Libros l
INNER JOIN Autores a ON l.autor_id = a.id;
GO



-- Vista y proc.  editar libro

CREATE VIEW Vista_EditarLibro
AS
SELECT 1 AS Operacion;  
GO

CREATE PROCEDURE EditarLibro
    @id INT,
    @título VARCHAR(255),
    @fecha_publicacion DATE,
    @autor_id INT,
    @precio DECIMAL(10, 2)
AS
BEGIN
    UPDATE Libros
    SET título = @título,
        fecha_publicacion = @fecha_publicacion,
        autor_id = @autor_id,
        precio = @precio
    WHERE id = @id;
END;
GO

-- Vista y procedimiento eliminar libro

CREATE VIEW Vista_EliminarLibro
AS
SELECT 1 AS Operacion; 
GO

CREATE PROCEDURE EliminarLibro
    @id INT
AS
BEGIN
    DELETE FROM Libros
    WHERE id = @id;
END;

