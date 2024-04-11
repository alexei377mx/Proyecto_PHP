-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2024 a las 04:46:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comercio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(200) DEFAULT NULL COMMENT 'MARCA Y MOELO',
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL COMMENT 'PRECIO MXN',
  `status` enum('1','0') DEFAULT NULL,
  `URLimg` text NOT NULL COMMENT 'URL IMAGEN PRODUCTO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `status`, `URLimg`) VALUES
(1, 'Tenis Guess Gmbiachang-N para hombre', 'Tenis Guess elaborado en material sintético con fijación de agujeta,', 1609.00, NULL, 'https://ss237.liverpool.com.mx/sm/1137490168.jpg'),
(2, 'Tenis ADIDAS Courtblock de hombre', 'sin tecnología', 959.20, NULL, 'https://ss203.liverpool.com.mx/sm/1145346871.jpg'),
(3, 'Zapato slip on Negro Total para hombre', 'comodos y ligeros', 986.00, NULL, 'https://ss237.liverpool.com.mx/sm/1122511991.jpg'),
(4, 'Tenis Black Peppers de piel para hombre', ' cuero vacuno premium de la más alta calidad', 1149.00, NULL, 'https://ss237.liverpool.com.mx/sm/1144279081.jpg'),
(5, 'Zapato choclo Merano para hombre ', 'cuidadosamente fabricado con pieles y materiales de la más alta calidad', 899.00, NULL, 'https://ss237.liverpool.com.mx/sm/1149674124.jpg'),
(6, 'Zapato mocasín Flexi para hombre', 'Piel tamboreada que te brindan comodidad y suavidad al instante', 790.30, NULL, 'https://ss237.liverpool.com.mx/sm/1132391339.jpg'),
(7, 'Zapato choclo Dockers para hombre', 'Choclo tipo bostoniano de agujeta de inspiracion vestir fabricado con piel ', 839.30, NULL, 'https://ss237.liverpool.com.mx/sm/1137611396.jpg'),
(8, 'Tenis Trender para hombre', 'fabricados en color camel, tienen un efecto piel al tacto, tienen una suela relativamente alta en color blanco', 999.00, NULL, 'https://ss237.liverpool.com.mx/sm/1145057252.jpg'),
(9, 'Tenis Guess Gmtellah-N para hombre', ' elaborado en material sintético con aplicación liso, estampado liso, forro textil', 1609.50, NULL, 'https://ss237.liverpool.com.mx/sm/1131233431.jpg'),
(10, 'Tenis Triples para hombre', 'Triples especializado en calzado Urbano, ideal para lucir a la moda en cualquier evento con su diseño innovador y versátil', 899.00, NULL, 'https://ss237.liverpool.com.mx/sm/1130902894.jpg'),
(11, 'Zapato choclo Quirelli para hombre ', 'Suela dentada con un pop de color en la parte del patín, brindando modernidad a la línea', 825.30, NULL, 'https://ss237.liverpool.com.mx/sm/1132340491.jpg'),
(12, 'Tenis Viceversa para hombre', 'outfit mucho más juvenil, moderno y casual', 1549.90, NULL, 'https://ss237.liverpool.com.mx/sm/1145898958.jpg'),
(13, 'Zapato oxford Christian Gallery para hombre', 'Modelo 2316-1PC corte sintético forro sintético suela sintética.', 1324.00, NULL, 'https://ss237.liverpool.com.mx/sm/1153022743.jpg'),
(14, 'Tenis ADIDAS X_Plrpulse unisex para correr', 'comodos y ligeros', 929.20, NULL, 'https://ss203.liverpool.com.mx/sm/1145345581.jpg'),
(15, 'Tenis ADIDAS Sportswear Sw Urban Court de hombre casual', 'comodos y ligeros', 999.00, NULL, 'https://ss203.liverpool.com.mx/sm/1145375064.jpg'),
(16, 'Tenis ADIDAS Originals Stan Smith para hombre', 'comodos y ligeros', 1183.20, NULL, 'https://ss237.liverpool.com.mx/sm/1136418398.jpg'),
(17, 'Tenis ADIDAS Sw Advantage de hombre', 'comodos y ligeros', 1399.00, NULL, 'https://ss203.liverpool.com.mx/sm/1144497662.jpg'),
(18, 'Tenis ADIDAS Sw Park St de hombre', 'comodos y ligeros', 1279.80, NULL, 'https://ss203.liverpool.com.mx/sm/1144501848.jpg'),
(19, 'Tenis ADIDAS Run 60S 3.0 de hombre casual', 'El exterior textil ofrece una sensación de comodidad', 1199.20, NULL, 'https://ss203.liverpool.com.mx/sm/1132090517.jpg'),
(20, 'Tenis ADIDAS X_Plrpulse unisex para correr', 'ofrece una sensación de comodidad', 1199.40, NULL, 'https://ss203.liverpool.com.mx/sm/1145331580.jpg'),
(21, 'Tenis ADIDAS Future Of Classic para hombre', 'ofrece una sensación de comodidad', 1479.00, NULL, 'https://ss237.liverpool.com.mx/sm/1140557181.jpg'),
(22, 'Tenis ADIDAS Classic para hombre', 'El exterior textil ofrece una sensación de comodidad', 1429.00, NULL, 'https://ss237.liverpool.com.mx/sm/1140569464.jpg'),
(23, 'Tenis ADIDAS Predator Club Fxg unisex para fútbol', 'El exterior textil ofrece una sensación de comodidad', 1499.00, NULL, 'https://ss203.liverpool.com.mx/sm/1145343341.jpg'),
(24, 'Tenis ADIDAS Grand Court Base 2.0 de hombre casual', 'El exterior textil ofrece una sensación de comodidad', 5815.50, NULL, 'https://ss203.liverpool.com.mx/sm/1129098419.jpg'),
(25, 'Tenis ADIDAS Top Ten para hombre', 'mucho más juvenil, moderno y casual', 1630.00, NULL, 'https://ss237.liverpool.com.mx/sm/1140571272.jpg'),
(26, 'Tenis ADIDAS VL Court 2.0 para hombre', 'mucho más juvenil, moderno y casual', 1080.00, NULL, 'https://ss237.liverpool.com.mx/sm/1141301112.jpg'),
(27, 'Tenis ADIDAS Sw Predator Accuracy.4 Fxg unisex para fútbol', 'El exterior textil ofrece una sensación de comodidad', 2893.00, NULL, 'https://ss203.liverpool.com.mx/sm/1139621143.jpg'),
(28, 'Tenis ADIDAS Run 60S 3.0 Lifestyle de hombre para entrenamiento', 'inspirado en el running se encarga de mantener tus pies cómodos', 1499.00, NULL, 'https://ss203.liverpool.com.mx/sm/1135740299.jpg'),
(29, 'Tenis ADIDAS Adizero Impact Spark de hombre para entrenamiento', 'inspirado en el running se encarga de mantener tus pies cómodos', 1599.20, NULL, 'https://ss203.liverpool.com.mx/sm/1145327001.jpg'),
(30, 'Tenis Adidas unisex para casual', 'inspirado en el running se encarga de mantener tus pies cómodos', 1300.20, NULL, 'https://ss203.liverpool.com.mx/sm/1140642769.jpg'),
(31, 'Tenis ADIDAS Duramo Sl M de hombre para correr', 'inspirado en el running se encarga de mantener tus pies cómodos', 1129.50, NULL, 'https://ss203.liverpool.com.mx/sm/1136476436.jpg'),
(32, 'Tenis Nike Blazer Mid ´77 para mujer', 'mucho más juvenil, moderno y casual', 2499.00, NULL, 'https://ss550.liverpool.com.mx/sm/1122239831.jpg'),
(33, 'Tenis Nike para mujer', 'moderno y casual', 2599.00, NULL, 'https://ss550.liverpool.com.mx/sm/1137978401.jpg'),
(34, 'Tenis Nike Blazer Low Platform para mujer', 'resistrentes y comodos', 2399.00, NULL, 'https://ss550.liverpool.com.mx/sm/1106912749.jpg'),
(35, 'Tenis Nike Air Max 270 para mujer', 'construyen con un exterior de piel, sintético y detalles en gamuza para una gran resistencia al uso constante', 3799.00, NULL, 'https://ss550.liverpool.com.mx/sm/1122238878.jpg'),
(36, 'Tenis Nike Air Max 90 para mujer', 'resistentes y comodos', 2999.00, NULL, 'https://ss550.liverpool.com.mx/sm/1126158542.jpg'),
(37, 'Tenis Nike W blazer low platform para mujer', 'construyen con un exterior de piel, sintético', 2399.00, NULL, 'https://ss550.liverpool.com.mx/sm/1110349136.jpg'),
(38, 'Tenis Nike Air Max 270 para mujer', 'una gran resistencia al uso constante', 2799.20, NULL, 'https://ss550.liverpool.com.mx/sm/1107384479.jpg'),
(39, 'Tenis Nike Blazer Mid 77 VNTG para mujer', 'son un clásico atemporal que combina estilo y comodidad', 2799.00, NULL, 'https://ss550.liverpool.com.mx/sm/1133964201.jpg'),
(40, 'Tenis Nike Air Max 90 LV8 SE para mujer', 'utilizan un ancho cojinete de aire puesto sobre el talón y visible a lado de la intersuola ', 3599.00, NULL, 'https://ss550.liverpool.com.mx/sm/1138410222.jpg'),
(41, 'Tenis Nike W V2k Run Fd0736-003 para mujer', 'se han desarrollado con una parte superior de malla es ligera y ventilada', 2999.00, NULL, 'https://ss550.liverpool.com.mx/sm/1137975819.jpg'),
(42, 'Tenis Nike Phoenix Waffle para mujer', 'utilizan un ancho cojinete de aire puesto sobre el talón y visible a lado de la intersuola', 2499.00, NULL, 'https://ss550.liverpool.com.mx/sm/1134178926.jpg'),
(43, 'Tenis Nike W Phoenix Waffle para mujer', 'presentan una silueta elegante con un corte atrevido para un look casual y a la última', 2499.00, NULL, 'https://ss550.liverpool.com.mx/sm/1134178560.jpg'),
(44, 'Tenis Puma Attacanto FGAG JR unisex para fútbol', 'on un empeine blando que mejora el toque y el control del balón', 1199.00, NULL, 'https://ss402.liverpool.com.mx/sm/1138482069.jpg'),
(45, 'Tenis Puma unisex infantil Rickie Jr', 'están elaborados en material sintético de color blanco, con una textura lisa y una punta redonda. ', 1099.20, NULL, 'https://ss459.liverpool.com.mx/sm/1151369130.jpg'),
(46, 'Tenis Puma Flyer Runner de niño para correr', 'con una textura lisa y una punta redonda', 999.00, NULL, 'https://ss402.liverpool.com.mx/sm/1087401251.jpg'),
(47, 'Tenis Puma unisex Rebound V6 Mid Jr', 'stán diseñados con una inspiración retro y ofrecen una combinación de colores llamativos', 1599.00, NULL, 'https://ss402.liverpool.com.mx/sm/1138480112.jpg'),
(48, 'Tenis Puma para niño Smash 30 L V Inf', 'para niños son una excelente opción para combinar estilo y comodidad', 949.00, NULL, 'https://ss459.liverpool.com.mx/sm/1151369211.jpg'),
(49, 'Tenis Puma Motorsport unisex BMW MMS Anzarun LS AC PS', 'Estos tenis presentan un empeine con base de malla y apliques sintéticos que les aportan un verdadero look PUMA tradicional.', 1199.50, NULL, 'https://ss402.liverpool.com.mx/sm/1147314232.jpg'),
(50, 'Tenis Puma Rebound V6 Mid unisex infantil', ' presentan un empeine con base de malla y apliques sintéticos', 2500.00, NULL, 'https://ss402.liverpool.com.mx/sm/1138481127.jpg'),
(51, 'Tenis Puma Caven 20 Jr unisex para entrenamiento', 'buscan comodidad y estilo durante sus actividades deportivas', 1499.00, NULL, 'https://ss402.liverpool.com.mx/sm/1143215884.jpg'),
(52, 'Tenis Puma unisex para correr', 'buscan comodidad y estilo durante sus actividades deportivas', 2159.40, NULL, 'https://ss402.liverpool.com.mx/sm/1100443381.jpg'),
(53, 'Sandalia GUESS para mujer', ' elaborado en material sintético con fijación 1 tiempo, punta redonda y textura capitonado', 2499.00, NULL, 'https://ss550.liverpool.com.mx/sm/1146526589.jpg'),
(54, 'Sandalia Puma para mujer', 'elaborado en material sintético con fijación 1 tiempo', 1399.00, NULL, 'https://ss203.liverpool.com.mx/sm/1144976289.jpg'),
(55, 'Sandalia RBCOLLECTION para mujer', 'con plataforma exterior piel sintético interior sintético suela sintética cuenta con plantilla acojinada', 859.00, NULL, 'https://ss550.liverpool.com.mx/sm/1134010874.jpg'),
(56, 'Sandalia X10 para mujer', 'piel sintético interior sintético suela sintética', 799.50, NULL, 'https://ss203.liverpool.com.mx/sm/1091075596.jpg'),
(57, 'Sandalia Toms Espadrille para mujer', 'elegante y cómoda para los días cálidos', 1599.00, NULL, 'https://ss550.liverpool.com.mx/sm/1133845309.jpg'),
(58, 'Sandalia RBCollection para mujer', 'confort exterior textil, interior textil, suela sintética.', 899.50, NULL, 'https://ss550.liverpool.com.mx/sm/1141666343.jpg'),
(59, 'Sandalia Rbcollection PV23 para mujer', 'Sandalias con plataforma Exterior Sintético Interior Sintético Suela Sintética Cuenta con Plantilla acojinada', 799.00, NULL, 'https://ss550.liverpool.com.mx/sm/9957141305.jpg'),
(60, 'Sandalia RBCOLLECTION para mujer', 'Sandalias de piso exterior piel interior sin forro suela sintética cuenta con plantilla acojinada', 1100.00, NULL, 'https://ss550.liverpool.com.mx/sm/1134150081.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
