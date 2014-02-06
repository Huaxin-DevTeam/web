-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-02-2014 a las 13:13:04
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `huaxin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `is_mobile` tinyint(1) NOT NULL DEFAULT '0',
  `num_views` int(11) NOT NULL DEFAULT '0',
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ad`
--

INSERT INTO `ad` (`id`, `image_url`, `link`, `is_mobile`, `num_views`, `date_published`, `date_end`) VALUES
(1, 'url1', 'link1', 0, 102, '2013-12-20 14:43:41', '2015-01-06 23:00:00'),
(2, 'img2', 'link2', 1, 0, '2013-12-20 14:44:25', '2015-12-29 23:00:00'),
(3, 'img3', 'link3', 0, 103, '2013-12-17 23:00:00', '2015-12-18 23:00:00'),
(4, 'img4', 'link4', 1, 0, '2013-12-19 23:00:00', '2015-01-09 23:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET gbk NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(3, 'Alquiler y Venta'),
(6, 'Amistad y Relaciones'),
(7, 'Ofertas (Rebajas)'),
(1, 'Ofertas de Trabajo'),
(4, 'Ofertas de Viajes'),
(8, 'Otros anuncios'),
(9, 'Páginas Amarillas'),
(5, 'Segunda Mano'),
(2, 'Traspaso de Negocios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET gbk NOT NULL,
  `description` longtext CHARACTER SET gbk NOT NULL,
  `price` float NOT NULL,
  `phone` int(15) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `num_views` int(11) NOT NULL DEFAULT '0',
  `premium` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `user_id`, `category_id`, `title`, `description`, `price`, `phone`, `image_url`, `location`, `date_published`, `date_end`, `num_views`, `premium`) VALUES
(1, 2, 1, 'title1', 'Este es un anuncio de prueba', 22, 666123456, 'placeholder_contacts.png', 'Barcelona', '2014-01-07 16:05:05', '2015-01-08 16:05:05', 7, 0),
(2, 2, 2, 'title1', 'Este es un anuncio de prueba', 22, 666123456, 'placeholder_contacts.png', 'Barcelona', '2014-01-07 16:39:28', '2015-01-08 16:39:28', 0, 0),
(3, 2, 1, 'title1', 'Este es un anuncio de prueba', 22, 666123456, 'placeholder_contacts.png', 'Barcelona', '2014-01-07 16:39:31', '2015-01-08 16:39:31', 0, 0),
(4, 2, 1, 'title1', 'Este es un anuncio de prueba', 22, 666123456, 'DISEÑO-FINAL.png', 'Barcelona', '2014-01-13 14:06:14', '2015-01-14 14:06:14', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(60) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `type`, `message`, `datetime`) VALUES
(1, 'error', 'Not Found - Id not found.', '2014-01-22 17:33:26'),
(2, 'error', 'Not Found - ', '2014-01-22 17:33:41'),
(3, 'error', 'Not Found - This id was not found.', '2014-01-22 17:34:02'),
(4, 'error', 'Not Found - This item was not found.', '2014-01-23 11:46:37'),
(5, 'error', 'Not Found - This item was not found.', '2014-01-23 11:47:14'),
(6, 'error', 'Unauthorized - Wrong password', '2014-02-03 17:24:07'),
(7, 'error', 'Unauthorized - Wrong username', '2014-02-03 17:24:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `method` enum('BANK_TRANSFER','PAYPAL') NOT NULL,
  `num_credits` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `purchase`
--

INSERT INTO `purchase` (`id`, `user_id`, `method`, `num_credits`, `date`, `token`) VALUES
(1, 1, 'BANK_TRANSFER', 200, '2013-12-20 09:13:32', '123asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `phone` int(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL DEFAULT '0',
  `date_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `push_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `active`, `phone`, `email`, `password`, `credits`, `date_register`, `token`, `device_id`, `push_id`) VALUES
(1, 1, NULL, 'admin', 'e5b13ebaa3229236c5456575a7d24e1dc1f73ef4', 0, '2013-12-19 17:38:07', NULL, NULL, NULL),
(2, 1, 645155625, 'friko67@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 92, '2013-12-27 10:06:57', 'xirOfSj8jHeHji0GHNY58pr9K', NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_items_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Filtros para la tabla `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_purchases_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
