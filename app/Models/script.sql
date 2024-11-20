 CREATE TABLE roles (
    rol_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE permisos (
    permiso_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE roles_permisos (
    roles_permisos_id SERIAL PRIMARY KEY,
    rol_id INT NOT NULL,
    permiso_id INT NOT NULL,
    FOREIGN KEY (rol_id) REFERENCES roles(rol_id),
    FOREIGN KEY (permiso_id) REFERENCES permisos(permiso_id)
);

CREATE TABLE usuarios (
    usuario_id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    password_resset VARCHAR(255) NOT NULL,
    rol_id INT NOT NULL,
    FOREIGN KEY (rol_id) REFERENCES roles(rol_id)
);

CREATE TABLE categorias (
    categoria_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE unidad_medidas (
    unidad_medida_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE productos (
    producto_id SERIAL PRIMARY KEY,
    codigo_barra VARCHAR(255),
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fecha_venc DATE NOT NULL,
    imagen_url VARCHAR(255) NOT NULL,
    costo_unitario DECIMAL(10,2) NOT NULL,
    demanda_anual INT NOT NULL,
    punto_reorden INT NOT NULL,
    stock_actual INT NOT NULL,
    stock_minimo INT NOT NULL,
    categoria_id INT NOT NULL,
    unidad_medida_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id),
    FOREIGN KEY (unidad_medida_id) REFERENCES unidad_medidas(unidad_medida_id)
);

-- Create the 'registros_stock' table to track product stock history
CREATE TABLE registro_stocks (
    registro_stock_id SERIAL PRIMARY KEY,
    producto_id INT NOT NULL,
    fecha_registro DATE NOT NULL,
    cantidad INT NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(producto_id)
);

-- Create the 'tipo_agente' table to classify agents
CREATE TABLE tipo_agentes (
    tipo_agente_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Create the 'agentes' table to store information about agents
CREATE TABLE agentes (
    agente_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    tipo_agente_id INT NOT NULL,
    FOREIGN KEY (tipo_agente_id) REFERENCES tipo_agentes(tipo_agente_id)
);

-- Create the 'tipo_operacion' table to classify operations
CREATE TABLE tipo_operaciones (
    tipo_operacion_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Create the 'operaciones' table to store information about operations
CREATE TABLE operaciones (
    operacion_id SERIAL PRIMARY KEY,
    producto_id INT NOT NULL,
    fecha DATE NOT NULL,
    cantidad INT NOT NULL,
    tipo_operacion_id INT NOT NULL,
    agente_id INT NOT NULL,
    usuario_id INT NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(producto_id),
    FOREIGN KEY (tipo_operacion_id) REFERENCES tipo_operaciones(tipo_operacion_id),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(usuario_id),
    FOREIGN KEY (agente_id) REFERENCES agentes(agente_id)
);

-- Create the 'estante' table to store information about shelves
CREATE TABLE estantees (
    estante_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT
);

-- Create the 'nivel' table to store information about levels
CREATE TABLE niveles (
    nivel_id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

-- Create the 'nivel_estante' table to store shelf level information
CREATE TABLE nivel_estantes (
    nivel_estante_id SERIAL PRIMARY KEY,
    estante_id INT NOT NULL,
    nivel_id INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    FOREIGN KEY (estante_id) REFERENCES estantes(estante_id),
    FOREIGN KEY (nivel_id) REFERENCES niveles(nivel_id)
);

-- Create the 'producto_estante' table to store product-shelf associations
CREATE TABLE producto_estantes (
    producto_estante_id SERIAL PRIMARY KEY,
    cantidad INT NOT NULL,
    producto_id INT NOT NULL,
    nivel_estante_id INT NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(producto_id),
    FOREIGN KEY (nivel_estante_id) REFERENCES nivel_estantes(nivel_estante_id)
);
 
-- Insert roles
INSERT INTO roles (nombre, descripcion) VALUES
('Administrador', 'Usuario con acceso completo a todas las funcionalidades del sistema'),
('Almacenero', 'Usuario encargado del manejo y control de inventarios'),
('Ayudante', 'Usuario con acceso limitado a ciertas funcionalidades del sistema');

-- Insert permisos
INSERT INTO permisos (nombre, descripcion) VALUES
('Ver productos', 'Permiso para visualizar productos'),
('Modificar productos', 'Permiso para modificar productos'),
('Eliminar productos', 'Permiso para eliminar productos'),
('Agregar productos', 'Permiso para agregar nuevos productos'),
('Ver reportes', 'Permiso para visualizar reportes');

-- Assign permissions to roles
INSERT INTO roles_permisos (rol_id, permiso_id) VALUES
(1, 1),  -- Administrador: Ver productos
(1, 2),  -- Administrador: Modificar productos
(1, 3),  -- Administrador: Eliminar productos
(1, 4),  -- Administrador: Agregar productos
(1, 5),  -- Administrador: Ver reportes
(2, 1),  -- Almacenero: Ver productos
(2, 2),  -- Almacenero: Modificar productos
(2, 4),  -- Almacenero: Agregar productos
(2, 5),  -- Almacenero: Ver reportes
(3, 1),  -- Ayudante: Ver productos
(3, 5);  -- Ayudante: Ver reportes

-- Insert example categories
INSERT INTO categorias (nombre, descripcion) VALUES
('Fertilizantes', 'Productos utilizados para enriquecer el suelo con nutrientes'),
('Herbicidas', 'Productos utilizados para controlar las malas hierbas'),
('Insecticidas', 'Productos utilizados para controlar insectos plaga');

-- Insert example units of measure
INSERT INTO unidad_medida (nombre, descripcion) VALUES
('Litro', 'Unidad de medida para líquidos'),
('Kilogramo', 'Unidad de medida para sólidos');

INSERT INTO usuarios (name, email, password, rol_id) VALUES
('Tito', 'titocarlos080@gmail.com', '123', (SELECT rol_id FROM roles WHERE nombre = 'Administrador')),
('Juan Pérez', 'juan.perez@example.com', 'password123', (SELECT rol_id FROM roles WHERE nombre = 'Administrador')),
('Ana Gómez', 'ana.gomez@example.com', 'password456', (SELECT rol_id FROM roles WHERE nombre = 'Almacenero')),
('Luis Fernández', 'luis.fernandez@example.com', 'password789', (SELECT rol_id FROM roles WHERE nombre = 'Ayudante'));

///

DO $$ 
DECLARE
    r RECORD;
BEGIN
    FOR r IN (SELECT tablename FROM pg_tables WHERE schemaname = 'public') LOOP
        EXECUTE 'DROP TABLE IF EXISTS ' || quote_ident(r.tablename) || ' CASCADE';
    END LOOP;
END $$;
