-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2018 at 03:16 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AComer`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria_rest`
--

CREATE TABLE `categoria_rest` (
  `id_categoria_rest` int(2) NOT NULL,
  `descripcion` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_rest`
--

INSERT INTO `categoria_rest` (`id_categoria_rest`, `descripcion`) VALUES
(1, 'Fancy'),
(2, 'Comida Rapida'),
(3, 'Cafe y Postres');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(1) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id_rest` int(12) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `categoria_precio` int(1) NOT NULL,
  `ruta_img` varchar(75) NOT NULL,
  `id_categoria_rest` int(2) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id_rest`, `nombre`, `direccion`, `correo`, `tipo`, `categoria_precio`, `ruta_img`, `id_categoria_rest`, `descripcion`) VALUES
(1, 'Mi Ternerita Norte', 'Delicias Norte', 'miternerita@mail.com', 'Churrasqueria, Tex-mex', 4, 'img/paginaPrincipal/Steak.png', 1, 'Mi Ternerita Norte se caracteriza por una excelente atención y excelentes platos. Tiene un menú variado desde platos como pollo capresa hasta hamburguesas. Este lugar también lo hace ser reconocido por sus gran ambiente nocturno.'),
(2, 'Bon Burger', 'Bella Vista', 'bonburger@mail.com', 'Hamburguesas', 4, 'img/paginaPrincipal/Rest1.jpg', 2, 'Un lugar increíble, lleno de hamburguesas completamente originales y gourmet. Este restaurante se caracteriza por su gran variedad de hamburguesas y salsas hechas en casa.'),
(3, 'Gula Coffee & Bistro', 'Sector Indio Mara', 'gula@mail.com', 'Cafe, Bistro', 3, 'img/paginaPrincipal/Gula.png', 3, 'Gula se caracteriza por sus famosos cafés y chessecakes de sabores exóticos, pero a pesar de ser un café tiene también una variedad de platos y hamburguesas igualmente exóticas como la hamburguesa 4 quesos.'),
(4, 'Cuenta Trez', 'Calle 75', 'cuentatrez@mail.com', 'Bar, Pizzeria', 3, 'img/paginaPrincipal/Rest2.jpg', 1, 'Este restaurante se caracteriza por sus grandiosas pizzas a la leña y por su gran ambiente y terrazas. Es el lugar perfecto para tomarse unas cervezas y pasar una noche entretenida distinta.'),
(5, 'Super Arepa', 'Delicias Norte', 'superarepa@mail.com', 'Comida Rápida, Arepa', 2, 'img/paginaPrincipal/superArepa.png', 2, 'En este local de comida rápida puedes encontrar todo lo típico de nuestra Maracaibo como lo son la arepa, el patacón o el tumbarrancho y las famosas arepas 90 grados.');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_favoritos`
--

CREATE TABLE `restaurant_favoritos` (
  `id` int(12) NOT NULL,
  `id_usuario` int(12) NOT NULL,
  `restaurantes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_favoritos`
--

INSERT INTO `restaurant_favoritos` (`id`, `id_usuario`, `restaurantes`) VALUES
(1, 3, 'a:1:{i:0;s:1:\"5\";}');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(2) NOT NULL,
  `descripcion` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'cliente'),
(2, 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(1) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES
(1, 'mujer'),
(2, 'hombre');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `apellido` varchar(75) NOT NULL,
  `direccion` text NOT NULL,
  `edad` int(3) NOT NULL,
  `id_sexo` int(1) NOT NULL,
  `id_estado` int(1) NOT NULL,
  `id_rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `correo`, `contrasena`, `nombre`, `apellido`, `direccion`, `edad`, `id_sexo`, `id_estado`, `id_rol`) VALUES
(2, 'Mario', 'mario@mail.com', 'a123456', 'Mario', 'Rivas', 'Maracaibo', 31, 2, 1, 2),
(3, 'Maria', 'maria@mail.com', 'b123456', 'Maria', 'Labarca', 'Caracas', 25, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_rest`
--
ALTER TABLE `categoria_rest`
  ADD PRIMARY KEY (`id_categoria_rest`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id_rest`),
  ADD KEY `id_categoria_rest` (`id_categoria_rest`);

--
-- Indexes for table `restaurant_favoritos`
--
ALTER TABLE `restaurant_favoritos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_sexo` (`id_sexo`,`id_estado`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_rest`
--
ALTER TABLE `categoria_rest`
  MODIFY `id_categoria_rest` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id_rest` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `restaurant_favoritos`
--
ALTER TABLE `restaurant_favoritos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`id_categoria_rest`) REFERENCES `categoria_rest` (`id_categoria_rest`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
