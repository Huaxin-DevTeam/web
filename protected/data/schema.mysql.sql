--
-- Base de datos: huaxin
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ad
--

CREATE TABLE ad (
  id int(11) NOT NULL AUTO_INCREMENT,
  image_url varchar(255) NOT NULL,
  link varchar(255) NOT NULL,
  is_mobile tinyint(1) NOT NULL DEFAULT '0',
  num_clicks int(11) NOT NULL DEFAULT '0',
  date_published timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_end timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla category
--

CREATE TABLE category (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(255) CHARACTER SET gbk NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY name (name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla item
--

CREATE TABLE item (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  category_id int(11) NOT NULL,
  title varchar(255) CHARACTER SET gbk NOT NULL,
  description longtext CHARACTER SET gbk NOT NULL,
  price float NOT NULL,
  phone int(15) NOT NULL,
  image_url varchar(255) NOT NULL,
  location varchar(255) NOT NULL,
  date_published timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  date_end timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  num_views int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY user (user_id),
  UNIQUE KEY category (category_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla purchase
--

CREATE TABLE purchase (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  method enum('BANK_TRANSFER','PAYPAL') NOT NULL,
  num_credits int(11) NOT NULL,
  date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  token varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY user_id (user_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla purchase
--

INSERT INTO purchase (id, user_id, method, num_credits, date, token) VALUES
(1, 1, 'BANK_TRANSFER', 200, '2013-12-20 09:13:32', '123asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla user
--

CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  phone int(15) DEFAULT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  credits int(11) NOT NULL DEFAULT '0',
  date_register timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  token varchar(255) DEFAULT NULL,
  devide_id varchar(255) DEFAULT NULL,
  push_id varchar(255) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla user
--

INSERT INTO user (id, phone, email, password, credits, date_register, token, devide_id, push_id) VALUES
(1, NULL, 'admin', 'e5b13ebaa3229236c5456575a7d24e1dc1f73ef4', 0, '2013-12-19 17:38:07', NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla item
--
ALTER TABLE item
  ADD CONSTRAINT fk_items_user FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT fk_item_category FOREIGN KEY (category_id) REFERENCES category (id);

--
-- Filtros para la tabla purchase
--
ALTER TABLE purchase
  ADD CONSTRAINT fk_purchases_user FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE ON UPDATE CASCADE;
