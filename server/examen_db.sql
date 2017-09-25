-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2017 at 05:02 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examen_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fecha_inicio` varchar(255) NOT NULL,
  `hora_inicio` varchar(255) NOT NULL,
  `fecha_fin` varchar(255) NOT NULL,
  `hora_fin` varchar(255) NOT NULL,
  `dia_completo` tinyint(1) NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, `dia_completo`, `usuario`) VALUES
(1, 'ew', '2017-09-21', '05:30', '2017-09-23', '06:30', 0, 'pedro@gmail.com'),
(2, 'DSA', '2017-09-21', '05:30', '2017-09-29', '06:30', 0, 'pedro@gmail.com'),
(3, 'CumpleaÃ±os', '2017-09-06', '20:00', '2017-09-15', '23:30', 0, 'pedro@gmail.com'),
(4, 'CumpleaÃ±os Pedro', '2016-11-10', '20:00', '2016-11-10', '23:30', 0, 'pedro@gmail.com'),
(5, 'CumpleaÃ±os Abuelo', '2016-11-22', '20:00', '2016-11-23', '05:00', 0, 'pedro@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`email`, `nombre`, `password`, `fecha_nac`) VALUES
('carlos@gmail.com', 'Carlos', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00'),
('juan@gmail.com', 'Juan', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00'),
('pedro@gmail.com', 'Pedro', '827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
