-- Script para crear las tablas necesarias

-- Tabla para almacenar información de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    total DECIMAL(10, 2),
    direccion_envio VARCHAR(255),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Puedes agregar más columnas según tus necesidades
);

-- Tabla para almacenar detalles de productos en un pedido
CREATE TABLE IF NOT EXISTS detalles_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT,
    producto_id INT,
    cantidad INT,
    -- Puedes agregar más columnas según tus necesidades
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    -- Agrega claves foráneas según sea necesario
    -- FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Asegúrate de ajustar las relaciones de las claves foráneas según la estructura real de tu base de datos

-- Tabla de ejemplo para productos (puedes tener una tabla real de productos)
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    precio DECIMAL(10, 2)
    -- Puedes agregar más columnas según tus necesidades
);
-- Script para crear las tablas necesarias

-- Tabla para almacenar información de pedidos
CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    total DECIMAL(10, 2),
    direccion_envio VARCHAR(255),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Puedes agregar más columnas según tus necesidades
);

-- Tabla para almacenar detalles de productos en un pedido
CREATE TABLE IF NOT EXISTS detalles_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT,
    producto_id INT,
    cantidad INT,
    -- Puedes agregar más columnas según tus necesidades
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    -- Agrega claves foráneas según sea necesario
    -- FOREIGN KEY (producto_id) REFERENCES productos(id)
);

-- Asegúrate de ajustar las relaciones de las claves foráneas según la estructura real de tu base de datos

-- Tabla de ejemplo para productos (puedes tener una tabla real de productos)
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    precio DECIMAL(10, 2)
    -- Puedes agregar más columnas según tus necesidades
);
