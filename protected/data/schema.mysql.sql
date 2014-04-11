-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-04-2014 a las 19:00:07
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
(1, 'http://www.parajunkee.com/wp-content/uploads/2014/01/ad_160x200.png', 'http://dev.mihx.es', 0, 3088, '2013-12-20 14:43:41', '2015-01-06 23:00:00'),
(2, '/images/ads/iSquid_______iPod_parody_ad_by_ashbet.jpg', 'http://dev.mihx.es', 0, 3080, '2013-12-20 14:44:25', '2015-12-29 23:00:00'),
(3, 'http://www.ecoeastend.com/images/ad%20images/half-ad-1.gif', 'http://dev.mihx.es', 0, 3344, '2013-12-17 23:00:00', '2015-12-18 23:00:00'),
(4, 'http://farm5.staticflickr.com/4078/4743777048_e8ac9c0c8a.jpg', 'http://dev.mihx.es', 0, 3074, '2013-12-19 23:00:00', '2015-01-09 23:00:00');

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
-- Estructura de tabla para la tabla `credits`
--

CREATE TABLE `credits` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `num_credits` int(11) NOT NULL,
  `price` float NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `credits`
--

INSERT INTO `credits` (`id`, `name`, `num_credits`, `price`, `text`) VALUES
(1, 'Single Ad', 1, 3, 'Simple, but useful'),
(2, 'Premium Ad Pack', 5, 12, '20% discount'),
(3, 'Large Credits Pack', 25, 50, '33% discount'),
(4, 'Full Credits Pack', 100, 150, '50% discount');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `user_id`, `category_id`, `title`, `description`, `price`, `phone`, `image_url`, `location`, `date_published`, `date_end`, `num_views`, `premium`) VALUES
(2, 1, 2, 'titulo1', 'Anuncio 2, negocios', 22450, 666123456, '/img/placeholder.png', 'Barcelona', '2014-01-07 15:39:28', '2015-01-08 15:39:28', 8, 1),
(3, 2, 3, 'title1', 'Anuncio 3, trabajo', 13072, 666123456, '/img/placeholder.png', 'Barcelona', '2014-02-25 15:39:31', '2015-03-04 15:39:31', 0, 1),
(5, 2, 3, 'Title a bit longer', 'Description, alquiler', 432, 666666666, '/img/placeholder.png', 'Barcelona', '2014-02-25 16:03:18', '2015-03-02 16:03:18', 0, 1),
(6, 2, 7, 'Titulo uno', 'Texto texto texto, rebajas!', 1982, 666666666, '/img/placeholder.png', 'Barcelona', '2014-02-25 17:52:15', '2015-02-28 17:52:15', 0, 1),
(7, 2, 1, '中国 苏州 三香路999号707室', '(西班牙独资) 苏州西利克贸易有限公司', 2000, 666666666, '/img/placeholder.png', 'Barcelona', '2014-02-26 15:01:45', '2015-03-04 15:01:45', 5, 1),
(8, 2, 3, '中国 苏州 三香路999号707室', '(西班牙独资) 苏州西利克贸易有限公司', 2200, 666666666, '/img/placeholder.png', 'Madrid', '2014-02-26 15:01:45', '2015-03-04 15:01:45', 0, 0),
(16, 1, 3, '123123123123', 'Experiencia de 3 a?os', 2000, 666666666, '/images/uploads/Icon~ipad.png', 'Barcelona', '2014-04-02 11:08:07', '2015-04-03 11:08:07', 0, 0),
(17, 1, 3, 'title1, test', 'una habitación por 200&euro;', 200, 666666666, '/images/uploads/JI004.png', 'Barcelona', '2014-04-02 11:19:07', '2015-04-03 11:19:07', 18, 1),
(18, 1, 3, 'test', 'test', 123, 666666666, '/img/placeholder.png', 'Barcelona', '2014-04-11 14:51:55', '2014-06-10 14:51:55', 2, 1),
(19, 1, 3, 'test', 'test', 123, 666666666, '/img/placeholder.png', 'Barcelona', '2014-04-11 14:53:08', '2014-06-10 14:53:08', 1, 0),
(20, 1, 6, 'test', 'Texto texto texto', 123, 666666666, '/img/placeholder.png', 'Barcelona', '2014-04-11 14:53:37', '2014-06-10 14:53:37', 1, 1);

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
  `method` enum('BANK_TRANSFER','PAYPAL','CREDIT_CARD') NOT NULL,
  `price` float NOT NULL,
  `num_credits` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `payment_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `active`, `phone`, `email`, `password`, `credits`, `date_register`, `token`, `device_id`, `push_id`) VALUES
(1, 1, NULL, 'admin', '$2a$13$DAKriMormJCmK.rU3UmeY.4FJu5CjkNYVErs9cIe3KntIZgTctQBC', 160, '2013-12-19 17:38:07', '', '', ''),
(2, 1, 666666666, 'friko1@gmail.com', '$2a$13$duhqzJpn1rKcNev6LMQXL.sZqTeYATYtcILZ7gFLLhCoBzczzWpBW', 17, '2014-02-12 17:10:20', 'Mdhb02EpG5aK8M2HIy2lqgPSv', NULL, NULL),
(4, 0, 666666172, 'lalala@lalala.com', '$2a$13$CZ9lTX.MNqIivfRxpE0z2uLpv52FDsRnlspPpxfKyEjTJL9fuhPQa', 0, '2014-03-27 16:41:46', '4Y2RjOOZyx42qnO0UcRAmzP1N', NULL, NULL),
(5, 1, 645155625, 'friko67@gmail.com', '$2a$13$Y5zkrbpfQh/tJLCQxORRb.r0MRpp7VQWXZdQYt6Q9KnYAsmZBwljq', 1, '2014-04-08 13:47:05', 'lbdUTHjba6WjZxB4e4p27OhF7', NULL, NULL);

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
