-- phpMyAdmin SQL Dump

-- version 5.2.1

-- https://www.phpmyadmin.net/

--

-- Host: localhost

-- Generation Time: Nov 29, 2023 at 07:18 AM

-- Server version: 10.4.28-MariaDB

-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `card`

--

-- --------------------------------------------------------

--

-- Table structure for table `categorias`

--

CREATE TABLE
    `categorias` (
        `id` int(11) NOT NULL,
        `categoria` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Dumping data for table `categorias`

--

INSERT INTO
    `categorias` (`id`, `categoria`)
VALUES (2, 'Bebidas'), (3, 'Muebles'), (4, 'Ropas'), (10, 'Libros'), (12, 'Vehiculos');

-- --------------------------------------------------------

--

-- Table structure for table `compra`

--

CREATE TABLE
    `compra` (
        `id` int(11) NOT NULL,
        `id_transaccion` varchar(20) NOT NULL,
        `fecha` datetime NOT NULL,
        `status` varchar(20) NOT NULL,
        `email` int(50) NOT NULL,
        `id_cliente` int(20) NOT NULL,
        `total` decimal(10, 2) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--

-- Table structure for table `detalle_compra`

--

CREATE TABLE
    `detalle_compra` (
        `id` int(11) NOT NULL,
        `id_compra` int(11) NOT NULL,
        `id_productos` int(11) NOT NULL,
        `nombre` varchar(200) NOT NULL,
        `precio` decimal(10, 2) NOT NULL,
        `cantidad` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- --------------------------------------------------------

--

-- Table structure for table `productos`

--

CREATE TABLE
    `productos` (
        `id` int(11) NOT NULL,
        `nombre` varchar(255) NOT NULL,
        `descripcion` text NOT NULL,
        `precio_normal` decimal(10, 2) NOT NULL,
        `precio_rebajado` decimal(10, 2) NOT NULL,
        `cantidad` int(11) NOT NULL,
        `imagen` varchar(50) NOT NULL,
        `id_categoria` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Dumping data for table `productos`

--

INSERT INTO
    `productos` (
        `id`,
        `nombre`,
        `descripcion`,
        `precio_normal`,
        `precio_rebajado`,
        `cantidad`,
        `imagen`,
        `id_categoria`
    )
VALUES (
        5,
        'Vino',
        'Ninguna',
        28.00,
        20.00,
        30,
        '20211212082421.jpg',
        2
    ), (
        6,
        'Pepsy',
        '1.5 ml',
        5.00,
        4.25,
        50,
        '20231026055601.jpg',
        2
    ), (
        7,
        'Escritorio',
        'Meterial Fino',
        230.00,
        200.00,
        10,
        '20211212082759.jpg',
        3
    ), (
        8,
        'Abrigo',
        'Para niños',
        130.00,
        120.00,
        90,
        '20211212083037.jpg',
        4
    ), (
        11,
        'Carro',
        'carro',
        25000.00,
        20000.00,
        15,
        '20231027214638.jpg',
        12
    );

-- --------------------------------------------------------

--

-- Table structure for table `usuarios`

--

CREATE DATABASE card;

USE card;

CREATE TABLE
    `usuarios` (
        `id` int(11) NOT NULL,
        `usuario` varchar(20) NOT NULL,
        `nombre` varchar(100) NOT NULL,
        `clave` varchar(100) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Dumping data for table `usuarios`

--

INSERT INTO
    `usuarios` (
        `id`,
        `usuario`,
        `nombre`,
        `clave`
    )
VALUES (
        1,
        'admin',
        'Ivan Lainez',
        '21232f297a57a5a743894a0e4a801fc3'
    );

--

-- Indexes for dumped tables

--

--

-- Indexes for table `categorias`

--

ALTER TABLE `categorias` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `compra`

--

ALTER TABLE `compra` ADD PRIMARY KEY (`id`);

--

-- Indexes for table `productos`

--

ALTER TABLE `productos`
ADD PRIMARY KEY (`id`),
ADD
    KEY `id_categoria` (`id_categoria`);

--

-- Indexes for table `usuarios`

--

ALTER TABLE `usuarios` ADD PRIMARY KEY (`id`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `categorias`

--

ALTER TABLE
    `categorias` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 13;

--

-- AUTO_INCREMENT for table `compra`

--

ALTER TABLE `compra` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT for table `productos`

--

ALTER TABLE
    `productos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 12;

--

-- AUTO_INCREMENT for table `usuarios`

--

ALTER TABLE
    `usuarios` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `productos`

--

ALTER TABLE `productos`
ADD
    CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;