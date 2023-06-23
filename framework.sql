-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 12:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `Nombre`, `Descripcion`) VALUES
(1, 'Tennis', NULL),
(2, 'Guayos', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `tipoCliente` varchar(20) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`idCliente`, `tipoCliente`, `Estado`, `idPersona`) VALUES
(1, 'frecuente', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `informaciones`
--

CREATE TABLE `informaciones` (
  `idInformacion` int(11) NOT NULL,
  `Contenido` longtext DEFAULT NULL,
  `fechaAct` datetime DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `idMarca` int(11) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`idMarca`, `Nombres`, `Descripcion`) VALUES
(1, 'Adidas', NULL),
(2, 'Nike', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paginas`
--

CREATE TABLE `paginas` (
  `idPagina` int(11) NOT NULL,
  `Pagina` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `Documento` varchar(20) DEFAULT NULL,
  `Nombres` varchar(20) DEFAULT NULL,
  `Apellidos` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `idTipoDocumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`idPersona`, `Documento`, `Nombres`, `Apellidos`, `Email`, `Telefono`, `Direccion`, `Genero`, `Fecha_Nacimiento`, `idTipoDocumento`) VALUES
(8, 'wefqf', 'safwfqwf', 'efwefwef', 'wefwef@sdfbwf.com', '21342', 'Call 73b 472', NULL, '2023-06-28', 1),
(9, '456567', 'hdgfihwbf', 'Lozano', 'manuellozanobo@gmail', '3222554326', 'Call 73b 472', NULL, '2023-05-30', 1),
(10, '12131233', 'Manuel', 'Lozano', 'manuellgjadanobo@gma', '3222554326', 'Call 73b 472', NULL, '2023-05-31', 1),
(11, '123213', 'Manuel', 'Lozano', 'manuellozanobo@gmail', '3222554326', 'Call 73b 472', NULL, '2023-06-07', 0),
(12, '123213', 'Manuel', 'Lozano', 'manuellozanobo@gmail', '3222554326', 'Call 73b 472', NULL, '2023-06-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `Nom_Producto` varchar(50) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Garantia` varchar(50) DEFAULT NULL,
  `Fecha_Garantia` date DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `Serie` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`idProducto`, `Nom_Producto`, `Precio`, `Estado`, `Cantidad`, `Garantia`, `Fecha_Garantia`, `Descripcion`, `idMarca`, `idCategoria`, `Serie`) VALUES
(1, 'Zapato', 234242, 0, 34, '3', '2023-06-13', 'aa', 1, 1, 'AAAEE3');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `Descripcion` varchar(15) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRol`, `Descripcion`, `Estado`) VALUES
(1, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipodocumentos`
--

CREATE TABLE `tipodocumentos` (
  `idTipoDocumento` int(11) NOT NULL,
  `Descripcion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tipodocumentos`
--

INSERT INTO `tipodocumentos` (`idTipoDocumento`, `Descripcion`) VALUES
(1, 'Cédula');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Clave` varchar(20) DEFAULT NULL,
  `Foto` varchar(30) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Usuario`, `Clave`, `Foto`, `idPersona`, `idRol`, `Estado`) VALUES
(11, 'hello', '12345', NULL, 8, 1, 1),
(12, 'dan12', '1234', NULL, 9, 1, 1),
(13, 'hi', '678', NULL, 10, 1, 1),
(14, 'dan12', '3', NULL, 11, 1, 1),
(15, 'hi', '1', NULL, 12, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `informaciones`
--
ALTER TABLE `informaciones`
  ADD PRIMARY KEY (`idInformacion`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indexes for table `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`idPagina`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informaciones`
--
ALTER TABLE `informaciones`
  MODIFY `idInformacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipodocumentos`
--
ALTER TABLE `tipodocumentos`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
