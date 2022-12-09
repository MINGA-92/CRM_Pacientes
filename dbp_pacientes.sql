-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2022 a las 11:12:32
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbp_pacientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pacientes`
--

CREATE TABLE `tbl_pacientes` (
  `PAC_ID` int(11) NOT NULL,
  `PAC_TIPO_DOCUMENTO` varchar(11) DEFAULT NULL,
  `PAC_DOCUMENTO` int(28) DEFAULT NULL,
  `PAC_NOMBRES` varchar(92) DEFAULT NULL,
  `PAC_APELLIDOS` varchar(92) DEFAULT NULL,
  `PAC_GENERO` varchar(11) DEFAULT NULL,
  `PAC_DEPARTAMENTO` varchar(28) DEFAULT NULL,
  `PAC_MUNICIPIO` varchar(28) DEFAULT NULL,
  `PAC_FECHA_REGISTRO` datetime DEFAULT current_timestamp(),
  `PAC_REGISTRADO_POR` varchar(92) DEFAULT NULL,
  `PAC_ESTADO` varchar(11) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pacientes`
--

INSERT INTO `tbl_pacientes` (`PAC_ID`, `PAC_TIPO_DOCUMENTO`, `PAC_DOCUMENTO`, `PAC_NOMBRES`, `PAC_APELLIDOS`, `PAC_GENERO`, `PAC_DEPARTAMENTO`, `PAC_MUNICIPIO`, `PAC_FECHA_REGISTRO`, `PAC_REGISTRADO_POR`, `PAC_ESTADO`) VALUES
(1, 'CC', 10191919, 'JAIME ALFONSO', 'BATEMAN CAYÓN', 'Masculino', 'ARAUCA', 'TAME', '2022-12-05 00:26:37', 'MINGA RENDON', 'Activo'),
(2, 'CC', 101420420, 'JUANA MARIA', 'LOPEZ RESTREPO', 'Femenino', 'CUNDINAMARCA', 'BOGOTA D.C.', '2022-12-05 00:00:00', 'MINGA RENDON', 'Activo'),
(3, 'CC', 17830724, 'SIMÓN JOSÉ', 'BOLÍVAR PALACIOS', 'Masculino', 'BOYACA', 'TUNJA', '2022-12-05 00:00:00', 'JORGE CAMILO TORRES RESTREPO', 'Activo'),
(4, 'CC', 17950125, 'POLICARPA', 'SALAVARRIETA RÍOS', 'Femenino', 'AMAZONAS', 'LETICIA', '2022-12-07 00:46:28', 'MINGA RENDON', 'Activo'),
(5, 'CC', 19601024, 'JAIME HERNANDO', 'GARZÓN FORERO', 'Masculino', 'CUNDINAMARCA', 'BOGOTA D.C.', '2022-12-07 00:29:57', 'MINGA RENDON', 'Activo'),
(6, 'CC', 19491201, 'PABLO EMILIO', 'ESCOBAR GAVIRIA', 'Masculino', 'ANTIOQUIA', 'MEDELLIN', '2022-12-07 00:35:31', 'MINGA RENDON', 'Activo'),
(7, 'CC', 19470205, 'ÁNGELA STELLA ', 'CAMACHO', 'Femenino', 'CUNDINAMARCA', 'BOGOTA D.C.', '2022-12-09 00:50:50', 'JORGE CAMILO TORRES RESTREPO', 'Activo'),
(8, 'CC', 19000312, 'GUSTAVO', 'ROJAS PINILLA', 'Masculino', 'BOYACA', 'TUNJA', '2022-12-09 00:58:40', 'MINGA RENDON', 'Activo'),
(9, 'CC', 19660413, 'FREDDY EUSEBIO', 'RINCÓN VALENCIA', 'Masculino', 'VALLE DEL CAUCA', 'BUENAVENTURA', '2022-12-09 01:01:57', 'MINGA RENDON', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_restandar`
--

CREATE TABLE `tbl_restandar` (
  `REST_PK` int(11) NOT NULL,
  `REST_CONSULTA` varchar(92) DEFAULT NULL,
  `REST_DETALLE` varchar(92) DEFAULT NULL,
  `REST_DETALLE_2` varchar(92) DEFAULT NULL,
  `REST_DETALLE_3` varchar(92) DEFAULT NULL,
  `REST_FECHA_REGISTRO` date DEFAULT current_timestamp(),
  `REST_FECHA_MODIFICADO` date DEFAULT current_timestamp(),
  `REST_ESTADO` varchar(11) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_restandar`
--

INSERT INTO `tbl_restandar` (`REST_PK`, `REST_CONSULTA`, `REST_DETALLE`, `REST_DETALLE_2`, `REST_DETALLE_3`, `REST_FECHA_REGISTRO`, `REST_FECHA_MODIFICADO`, `REST_ESTADO`) VALUES
(1, 'TipoDocumento', 'CC', 'Cedula De Ciudadania', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(2, 'TipoDocumento', 'CE', 'Cedula De Extranjeria', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(3, 'TipoDocumento', 'MS', 'Menor Sin Identificación', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(4, 'TipoDocumento', 'PA', 'Pasaporte', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(5, 'TipoDocumento', 'RC', 'Registro Civil', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(6, 'TipoDocumento', 'TI', 'Tarjeta De Identidad', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(7, 'Ubicacion', 'AMAZONAS', 'EL ENCANTO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(8, 'Ubicacion', 'AMAZONAS', 'LA CHORRERA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(9, 'Ubicacion', 'AMAZONAS', 'LA PEDRERA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(10, 'Ubicacion', 'AMAZONAS', 'LA VICTORIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(11, 'Ubicacion', 'AMAZONAS', 'LETICIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(12, 'Ubicacion', 'AMAZONAS', 'MIRITI PARANA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(13, 'Ubicacion', 'AMAZONAS', 'PUERTO ALEGRIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(14, 'Ubicacion', 'AMAZONAS', 'PUERTO ARICA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(15, 'Ubicacion', 'AMAZONAS', 'PUERTO NARIÑO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(16, 'Ubicacion', 'AMAZONAS', 'PUERTO SANTANDER', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(17, 'Ubicacion', 'AMAZONAS', 'TARAPACA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(18, 'Ubicacion', 'ANTIOQUIA', 'ABEJORRAL', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(19, 'Ubicacion', 'ANTIOQUIA', 'ALEJANDRIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(20, 'Ubicacion', 'ANTIOQUIA', 'EL CARMEN DE VIBORAL', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(21, 'Ubicacion', 'ANTIOQUIA', 'GRANADA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(22, 'Ubicacion', 'ANTIOQUIA', 'GUATAPE', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(23, 'Ubicacion', 'ANTIOQUIA', 'JERICO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(24, 'Ubicacion', 'ANTIOQUIA', 'MEDELLIN', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(25, 'Ubicacion', 'ANTIOQUIA', 'NECOCLI', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(26, 'Ubicacion', 'ANTIOQUIA', 'PUERTO BERRIO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(27, 'Ubicacion', 'ANTIOQUIA', 'SABANALARGA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(28, 'Ubicacion', 'ANTIOQUIA', 'SABANETA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(29, 'Ubicacion', 'ARAUCA', 'ARAUCA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(30, 'Ubicacion', 'ARAUCA', 'ARAUQUITA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(31, 'Ubicacion', 'ARAUCA', 'CRAVO NORTE', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(32, 'Ubicacion', 'ARAUCA', 'FORTUL', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(33, 'Ubicacion', 'ARAUCA', 'PUERTO RONDON', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(34, 'Ubicacion', 'ARAUCA', 'SARAVENA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(35, 'Ubicacion', 'ARAUCA', 'TAME', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(36, 'Ubicacion', 'ARCHIPIELAGO DE SAN ANDRES, PROVIDENCIA Y SANTA CATALINA', 'PROVIDENCIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(37, 'Ubicacion', 'ARCHIPIELAGO DE SAN ANDRES, PROVIDENCIA Y SANTA CATALINA', 'SAN ANDRES', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(38, 'Ubicacion', 'ATLANTICO', 'BARANOA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(39, 'Ubicacion', 'ATLANTICO', 'BARRANQUILLA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(40, 'Ubicacion', 'ATLANTICO', 'CAMPO DE LA CRUZ', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(41, 'Ubicacion', 'ATLANTICO', 'GALAPA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(42, 'Ubicacion', 'ATLANTICO', 'MALAMBO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(43, 'Ubicacion', 'ATLANTICO', 'MANATI', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(44, 'Ubicacion', 'ATLANTICO', 'PIOJO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(45, 'Ubicacion', 'BOYACA', 'AQUITANIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(46, 'Ubicacion', 'BOYACA', 'BELEN', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(47, 'Ubicacion', 'BOYACA', 'BOAVITA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(48, 'Ubicacion', 'BOYACA', 'BRICENO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(49, 'Ubicacion', 'BOYACA', 'CHIQUINQUIRA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(50, 'Ubicacion', 'BOYACA', 'CHIVATA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(51, 'Ubicacion', 'BOYACA', 'DUITAMA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(52, 'Ubicacion', 'BOYACA', 'FIRAVITOBA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(53, 'Ubicacion', 'BOYACA', 'SUTAMARCHAN', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(54, 'Ubicacion', 'BOYACA', 'TUNJA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(55, 'Ubicacion', 'BOYACA', 'VENTAQUEMADA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(56, 'Ubicacion', 'CUNDINAMARCA', 'ANAPOIMA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(57, 'Ubicacion', 'CUNDINAMARCA', 'ANOLAIMA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(58, 'Ubicacion', 'CUNDINAMARCA', 'APULO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(59, 'Ubicacion', 'CUNDINAMARCA', 'BOGOTA D.C.', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(60, 'Ubicacion', 'CUNDINAMARCA', 'BOJACA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(61, 'Ubicacion', 'CUNDINAMARCA', 'CHOCONTA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(62, 'Ubicacion', 'CUNDINAMARCA', 'EL ROSAL', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(63, 'Ubicacion', 'CUNDINAMARCA', 'FACATATIVA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(64, 'Ubicacion', 'CUNDINAMARCA', 'FUNZA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(65, 'Ubicacion', 'CUNDINAMARCA', 'FUSAGASUGA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(66, 'Ubicacion', 'CUNDINAMARCA', 'GIRARDOT', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(67, 'Ubicacion', 'CUNDINAMARCA', 'GRANADA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(68, 'Ubicacion', 'CUNDINAMARCA', 'GUADUAS', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(69, 'Ubicacion', 'CUNDINAMARCA', 'GUASCA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(70, 'Ubicacion', 'CUNDINAMARCA', 'GUATAVITA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(71, 'Ubicacion', 'CUNDINAMARCA', 'MOSQUERA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(72, 'Ubicacion', 'CUNDINAMARCA', 'NEMOCON', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(73, 'Ubicacion', 'CUNDINAMARCA', 'PACHO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(74, 'Ubicacion', 'CUNDINAMARCA', 'SASAIMA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(75, 'Ubicacion', 'CUNDINAMARCA', 'UBATE', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(76, 'Ubicacion', 'HUILA', 'ACEVEDO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(77, 'Ubicacion', 'HUILA', 'ALTAMIRA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(78, 'Ubicacion', 'HUILA', 'CAMPOALEGRE', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(79, 'Ubicacion', 'HUILA', 'COLOMBIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(80, 'Ubicacion', 'HUILA', 'GARZON', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(81, 'Ubicacion', 'HUILA', 'GIGANTE', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(82, 'Ubicacion', 'HUILA', 'NEIVA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(83, 'Ubicacion', 'HUILA', 'PALERMO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(84, 'Ubicacion', 'HUILA', 'SAN AGUSTIN', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(85, 'Ubicacion', 'HUILA', 'YAGUARA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(86, 'Ubicacion', 'TOLIMA', 'ALPUJARRA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(87, 'Ubicacion', 'TOLIMA', 'CARMEN DE APICALA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(88, 'Ubicacion', 'TOLIMA', 'HONDA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(89, 'Ubicacion', 'TOLIMA', 'IBAGUE', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(90, 'Ubicacion', 'TOLIMA', 'MARIQUITA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(91, 'Ubicacion', 'TOLIMA', 'MELGAR', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(92, 'Ubicacion', 'TOLIMA', 'RIO BLANCO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(93, 'Ubicacion', 'TOLIMA', 'VALLE DE SAN JUAN', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(94, 'Ubicacion', 'TOLIMA', 'VENADILLO', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(95, 'Ubicacion', 'TOLIMA', 'VILLARRICA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(96, 'Ubicacion', 'VALLE DEL CAUCA', 'ANDALUCIA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(97, 'Ubicacion', 'VALLE DEL CAUCA', 'BOLIVAR', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(98, 'Ubicacion', 'VALLE DEL CAUCA', 'BUENAVENTURA', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(99, 'Ubicacion', 'VALLE DEL CAUCA', 'BUGA LA GRANDE', NULL, '2022-12-07', '2022-12-07', 'Activo'),
(100, 'Ubicacion', 'VALLE DEL CAUCA', 'CALI', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(101, 'Ubicacion', 'VALLE DEL CAUCA', 'JAMUNDI', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(102, 'Ubicacion', 'VALLE DEL CAUCA', 'TULUA', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(103, 'Ubicacion', 'VALLE DEL CAUCA', 'YUMBO', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(104, 'Ubicacion', 'VICHADA', 'CUMARIBO', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(105, 'Ubicacion', 'VICHADA', 'LA PRIMAVERA', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(106, 'Ubicacion', 'VICHADA', 'PUERTO CARRENO', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(107, 'Ubicacion', 'VICHADA', 'SANTA ROSALIA', NULL, '2022-12-08', '2022-12-08', 'Activo'),
(108, 'Genero', 'Femenino', NULL, NULL, '2022-12-08', '2022-12-08', 'Activo'),
(109, 'Genero', 'Masculino', NULL, NULL, '2022-12-08', '2022-12-08', 'Activo'),
(110, 'Genero', 'No Binario', NULL, NULL, '2022-12-08', '2022-12-08', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `USU_ID` int(11) NOT NULL,
  `USU_TIPO_DOCUMENTO` varchar(11) DEFAULT NULL,
  `USU_DOCUMENTO` int(28) DEFAULT NULL,
  `USU_NOMBRE` varchar(92) DEFAULT NULL,
  `USU_EMAIL` varchar(92) DEFAULT NULL,
  `USU_PASWORD` varchar(28) DEFAULT NULL,
  `USU_FECHA_REGISTRO` date DEFAULT current_timestamp(),
  `USU_ESTADO` varchar(11) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`USU_ID`, `USU_TIPO_DOCUMENTO`, `USU_DOCUMENTO`, `USU_NOMBRE`, `USU_EMAIL`, `USU_PASWORD`, `USU_FECHA_REGISTRO`, `USU_ESTADO`) VALUES
(1, 'CC', 1234567890, 'JORGE CAMILO TORRES RESTREPO', 'Camilotorres@gmail.com', 'Padre19', '2022-12-05', 'Activo'),
(2, 'CC', 1014238383, 'MINGA RENDON', 'Minga92@hotmail.com', 'Minga420', '2022-12-05', 'Activo'),
(3, 'CC', 18691002, 'MAHATMA GANDHI ', 'MahatmaGandhi@gmail.com', 'Gandhi1869', '2022-12-07', 'Activo'),
(4, 'CC', 19550418, 'ALBERT EINSTEIN', 'AlbertEinstein@hotmail.com', 'Einstein1955', '2022-12-09', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD PRIMARY KEY (`PAC_ID`);

--
-- Indices de la tabla `tbl_restandar`
--
ALTER TABLE `tbl_restandar`
  ADD PRIMARY KEY (`REST_PK`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`USU_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  MODIFY `PAC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_restandar`
--
ALTER TABLE `tbl_restandar`
  MODIFY `REST_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `USU_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
