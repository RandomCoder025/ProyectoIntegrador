-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2022 a las 18:54:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pire`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos`
--

CREATE TABLE `amigos` (
  `id_relacion` int(11) NOT NULL,
  `id_usuario1` int(11) NOT NULL,
  `id_usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `amigos`
--

INSERT INTO `amigos` (`id_relacion`, `id_usuario1`, `id_usuario2`) VALUES
(7, 8, 3),
(9, 3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID` int(11) NOT NULL,
  `IDPublicacion` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `Contenido` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`ID`, `IDPublicacion`, `IDUsuario`, `Contenido`) VALUES
(1, 27, 11, 'asdegyhrhr'),
(2, 27, 3, 'Hola'),
(3, 27, 3, 'Buenas'),
(6, 30, 3, 'Graaande Sinpuuu!!!'),
(7, 32, 3, 'Comentario de prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `ID` int(11) NOT NULL,
  `Calle` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `NumeroPortal` int(11) NOT NULL,
  `Piso` int(11) DEFAULT NULL,
  `Puerta` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigoPostal` int(11) NOT NULL,
  `ciudad` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`ID`, `Calle`, `NumeroPortal`, `Piso`, `Puerta`, `codigoPostal`, `ciudad`) VALUES
(1, 'pito', 24, NULL, NULL, 2345, 'madriz'),
(2, 'no', 11, 1, 'A', 22, 'Alcalá de Henares (Madrid)'),
(3, 'no', 11, 1, 'A', 22, 'Murcia'),
(5, 'Vicente', 11, 1, 'A', 22, 'Murcia'),
(6, 'si', 13, 2, 'X', 12, 'Bejar (Salamanca)'),
(7, 'nose', 56, 3, 'B', 28000, 'Madrid'),
(8, 'chunga', 9, 2, 'A', 28000, 'Madrid'),
(9, '', 1210, 12, 'ESP', 12, 'Sevilla'),
(10, 'via de la iglesia', 25, 0, 'Baj', 3, 'Rindaril'),
(11, 'a tu casa', 2, 5, 'gor', 28000, 'Madrid'),
(12, 'colina', 1, 2, '1', 1, 'inventada'),
(13, 'pito', 24, 0, '', 2345, 'madriz'),
(14, 'falsa', 124, 1, 'A', 1010, 'madriz'),
(15, 'pito', 24, 0, 'Izq', 2345, 'madriz'),
(16, 'pito', 24, 3, 'Izq', 2345, 'madriz'),
(17, '', 0, 0, '', 0, ''),
(18, 'Falsa', 43, 1, 'A', 280240, 'Hoyo del Manzanares'),
(19, 'Plaza España', 36, 11, 'F', 28008, 'Madrid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ensayo`
--

CREATE TABLE `ensayo` (
  `ID` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdGrupo` int(11) DEFAULT NULL,
  `NumeroDePersonas` int(11) NOT NULL,
  `Hora` time NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `Género` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenespublicaciones`
--

CREATE TABLE `imagenespublicaciones` (
  `id` int(11) NOT NULL,
  `IDPublicacion` int(11) NOT NULL,
  `RutaImagen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenespublicaciones`
--

INSERT INTO `imagenespublicaciones` (`id`, `IDPublicacion`, `RutaImagen`) VALUES
(7, 16, 'atardeceres-1b2829bd-e28f-47e5-9a55-8d9988f8e184.jpg'),
(8, 16, 'predeterminadoA6RJ45B.jpg'),
(11, 22, 'avatar South Park.png'),
(12, 24, 'chema.jpeg'),
(13, 25, 'PipBoy.png'),
(15, 27, 'dormir 3 horas.jpeg'),
(16, 27, 'meme llorando alcal.png'),
(17, 27, 'meme trigger.png'),
(18, 27, 'monke.png'),
(19, 28, 'ratas.jpg'),
(20, 28, 'taberna.jpg'),
(21, 32, 'Musigente.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `id_publicacion`, `Id_Usuario`) VALUES
(26, 22, 10),
(28, 20, 10),
(29, 16, 10),
(31, 24, 10),
(33, 24, 3),
(35, 28, 3),
(36, 30, 3),
(37, 22, 8),
(39, 30, 8),
(40, 29, 3),
(43, 27, 3),
(44, 27, 10),
(45, 32, 8),
(50, 22, 3),
(52, 16, 3),
(53, 28, 10),
(54, 20, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listagrupos`
--

CREATE TABLE `listagrupos` (
  `id` int(11) NOT NULL,
  `Id_Grupo` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `Id_Lider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeschat`
--

CREATE TABLE `mensajeschat` (
  `ID` int(11) NOT NULL,
  `IDEmisor` int(11) NOT NULL,
  `IDReceptor` int(11) NOT NULL,
  `Contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `id_usuario`, `titulo`, `contenido`) VALUES
(16, 3, 'algo', ''),
(20, 10, 'Prueba Imagen', 'as'),
(22, 3, 'Mirad que wapo soy', 'Avatar South Park'),
(24, 3, 'Aweonao', 'awlíhgoñugashrgr'),
(25, 3, 'prueba imagen', 'ñoihño8yh'),
(27, 3, 'MEMES', 'MEMES BIEN PERRONES'),
(28, 10, 'Vengan a la taberna La rueda!!!', 'tenemos cerveza para todas las ratas de Rindaril. Bajo el respaldo del Mega-Lider, la taberna crece con fuerzas'),
(29, 10, 'Prueba', 'ñañañañañañ'),
(30, 8, 'Escuchen mi nuevo temita', 'Se vienen cositas\r\nhttps://www.youtube.com/watch?v=qOTnDwg-ih0'),
(31, 9, 'prueba amiwis', 'awawa'),
(32, 3, 'Prueba Validar', 'Awachuzrilleeeer');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `publicacionesylikes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `publicacionesylikes` (
`id` int(11)
,`id_usuario` int(11)
,`titulo` varchar(60)
,`contenido` text
,`id_like` int(11)
,`id_usuario_like` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `Nickname` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Instrumento` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellido1` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido2` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `GeneroP` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `Genero` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Anos de experiencia` int(11) DEFAULT NULL,
  `IdGrupo` int(11) DEFAULT NULL,
  `IdDomicilio` int(11) NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `ImagenDePerfil` varchar(60) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'predeterminadoA6RJ45B.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nickname`, `email`, `Password`, `Nombre`, `Instrumento`, `Apellido1`, `Apellido2`, `GeneroP`, `Genero`, `Anos de experiencia`, `IdGrupo`, `IdDomicilio`, `Descripcion`, `ImagenDePerfil`) VALUES
(3, 'Santi', 'manolo@jimenez.es', '1dfb64bff8a4503d2ae9e8e9b010dcceca214b1369bac203d1fd87d78c64a613', 'Santi', 'Arco de Diddley', 'pito', NULL, 'M', 'Punk albano', 4, NULL, 16, 'Prueba cambios en el perfil', 'sowilo.png'),
(5, 'JuanGuarnision', '', 'a099f12f5e243b990baee4a4f0b2656b923da148122c361eb2c0c70a0de55a30', 'Juan', 'Arco de Diddley', 'Guarnision', '', '', 'Gato', 1, NULL, 5, NULL, 'predeterminadoA6RJ45B.jpg'),
(6, 'Tchai', '', '1dfb64bff8a4503d2ae9e8e9b010dcceca214b1369bac203d1fd87d78c64a613', 'Alejandra', 'Erke', 'Hinojosa', 'Gonzales', 'O', 'Folk', 1, NULL, 6, NULL, 'predeterminadoA6RJ45B.jpg'),
(8, 'Kira249', 'sinpu@sinpu.sinpu', '1dfb64bff8a4503d2ae9e8e9b010dcceca214b1369bac203d1fd87d78c64a613', 'Sergio', 'Canto', 'Reyero', '', 'M', 'rap', 6, NULL, 8, NULL, 'sinpu.jpeg'),
(9, 'pepechorizo1210', 'awachu@zri.ler', '9bb81d1afa1c1857d33f4fb87dff1ed380e6300baf0168d40153d76c530f5f9a', 'Jose', 'Castañuelas', 'Martínez', 'Soria', 'M', 'FLAMENQUITO', 3, NULL, 9, NULL, 'predeterminadoA6RJ45B.jpg'),
(10, 'Raalmudena', 'lasratas@notienen.mail', '022486307a9f2e95aabf9e643dfa200b28c0f79413b5dd2479df0d025744342d', 'Raalmudena', 'Canto', 'La', 'Rata', 'F', 'Rata', 0, NULL, 10, NULL, 'ralmudena.jpg'),
(11, 'arion', 'javi@lachu.pa', '8617f366566a011837f4fb4ba5bedea2b892f3ed8b894023d16ae344b2be5881', 'Javier', 'Batería', 'Campos', 'Penas', 'M', 'Cagarme encima', 5, NULL, 11, NULL, 'predeterminadoA6RJ45B.jpg'),
(12, 'pepa', 'pepa@pig.oink', '8617f366566a011837f4fb4ba5bedea2b892f3ed8b894023d16ae344b2be5881', 'pepa', 'Canto', 'la', 'cerda', 'F', 'Death metal', 40, NULL, 12, NULL, 'predeterminadoA6RJ45B.jpg'),
(13, 'prueba', 'ñaba@ña.ña', '8617f366566a011837f4fb4ba5bedea2b892f3ed8b894023d16ae344b2be5881', 'prueba', '', '', '', '', '', 1, NULL, 17, NULL, 'predeterminadoA6RJ45B.jpg'),
(15, 'Carlos', 'crufi@gmail.com', '1dfb64bff8a4503d2ae9e8e9b010dcceca214b1369bac203d1fd87d78c64a613', 'Carlos', 'Trombón', 'Rufiángel', 'García', 'M', 'Clásica', 5, NULL, 18, NULL, 'predeterminadoA6RJ45B.jpg'),
(16, 'CapitánEspaña', 'jcarceles@imffalso.es', '8617f366566a011837f4fb4ba5bedea2b892f3ed8b894023d16ae344b2be5881', 'Javier', 'Contrabajo', 'Cárceles', 'Moreno', 'O', '', 4, NULL, 19, NULL, 'predeterminadoA6RJ45B.jpg');

-- --------------------------------------------------------

--
-- Estructura para la vista `publicacionesylikes`
--
DROP TABLE IF EXISTS `publicacionesylikes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `publicacionesylikes`  AS SELECT `publicaciones`.`id` AS `id`, `publicaciones`.`id_usuario` AS `id_usuario`, `publicaciones`.`titulo` AS `titulo`, `publicaciones`.`contenido` AS `contenido`, `likes`.`id` AS `id_like`, `likes`.`Id_Usuario` AS `id_usuario_like` FROM (`publicaciones` join `likes` on(`publicaciones`.`id` = `likes`.`id_publicacion`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_relacion`),
  ADD KEY `id_usuario1` (`id_usuario1`),
  ADD KEY `id_usuario2` (`id_usuario2`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDPublicacion` (`IDPublicacion`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ensayo`
--
ALTER TABLE `ensayo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IdGrupo` (`IdGrupo`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `imagenespublicaciones`
--
ALTER TABLE `imagenespublicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDPublicacion` (`IDPublicacion`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `listagrupos`
--
ALTER TABLE `listagrupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_Grupo` (`Id_Grupo`),
  ADD KEY `Id_Lider` (`Id_Lider`),
  ADD KEY `Id_Usuario` (`Id_Usuario`);

--
-- Indices de la tabla `mensajeschat`
--
ALTER TABLE `mensajeschat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDEmisor` (`IDEmisor`),
  ADD KEY `IDReceptor` (`IDReceptor`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nickname` (`Nickname`),
  ADD KEY `IdDomicilio` (`IdDomicilio`),
  ADD KEY `IdGrupo` (`IdGrupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ensayo`
--
ALTER TABLE `ensayo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenespublicaciones`
--
ALTER TABLE `imagenespublicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `listagrupos`
--
ALTER TABLE `listagrupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajeschat`
--
ALTER TABLE `mensajeschat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`id_usuario1`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`id_usuario2`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`IDPublicacion`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ensayo`
--
ALTER TABLE `ensayo`
  ADD CONSTRAINT `ensayo_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ensayo_ibfk_2` FOREIGN KEY (`IdGrupo`) REFERENCES `grupo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenespublicaciones`
--
ALTER TABLE `imagenespublicaciones`
  ADD CONSTRAINT `imagenespublicaciones_ibfk_1` FOREIGN KEY (`IDPublicacion`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listagrupos`
--
ALTER TABLE `listagrupos`
  ADD CONSTRAINT `listagrupos_ibfk_1` FOREIGN KEY (`Id_Grupo`) REFERENCES `grupo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listagrupos_ibfk_2` FOREIGN KEY (`Id_Lider`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listagrupos_ibfk_3` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajeschat`
--
ALTER TABLE `mensajeschat`
  ADD CONSTRAINT `mensajeschat_ibfk_1` FOREIGN KEY (`IDEmisor`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `mensajeschat_ibfk_2` FOREIGN KEY (`IDReceptor`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`IdDomicilio`) REFERENCES `domicilio` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`IdGrupo`) REFERENCES `grupo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
