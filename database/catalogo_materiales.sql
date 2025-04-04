-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 16:37:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `catalogo_materiales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `clase` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`clase`, `descripcion`) VALUES
(1, 'Paneles'),
(2, 'Baterías'),
(3, 'Controlador'),
(4, 'Protector de baterías'),
(5, 'Protección principal'),
(6, 'Fusibles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `clave` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `clase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`clave`, `modelo`, `marca`, `clase`) VALUES
(1001, '15113', 'UGREEN', 1),
(1002, '15114', 'UGREEN', 1),
(1003, '66HS605-625W', 'TW Solar', 1),
(1004, 'CSUN330-72P', 'CSUN', 1),
(1005, 'EF-FLEX-220B', 'ECOFLOW', 1),
(1006, 'EF-FLEX-M400', 'ECOFLOW', 1),
(1007, 'EGE450W144M(M6)', 'ECO GREEN ENERGY', 1),
(1008, 'EGE550W144M(M10)', 'ECO GREEN ENERGY', 1),
(1009, 'EPL10012AL', 'EPCOM POWERLINE', 1),
(1010, 'EPL1012AL', 'EPCOM POWERLINE', 1),
(1011, 'EPL-12512', 'EPCOM POWERLINE', 1),
(1012, 'EPL13012AL', 'EPCOM POWERLINE', 1),
(1013, 'EPL15012', 'EPCOM POWERLINE', 1),
(1014, 'EPL118012AL', 'EPCOM POWERLINE', 1),
(1015, 'EPL3012AL', 'EPCOM POWERLINE', 1),
(1016, 'EPL330-24', 'EPCOM POWERLINE', 1),
(1017, 'EPL450M144', 'EPCOM POWERLINE', 1),
(1018, 'EPL-5012', 'EPCOM POWERLINE', 1),
(1019, 'EPL5012AL', 'EPCOM POWERLINE', 1),
(1020, 'EPL540M144', 'EPCOM POWERLINE', 1),
(1021, 'EPL-8512', 'EPCOM POWERLINE', 1),
(1022, 'ETM760BH450WW', 'ETSOLAR / ELITEsolar', 1),
(1023, 'ETM760BH450WW/WB', 'ETSOLAR / ELITEsolar', 1),
(1024, 'ETM772BH540BB', 'ETSOLAR / ELITEsolar', 1),
(1025, 'ETM772BH550WW/WB', 'ETSOLAR / ELITEsolar', 1),
(1026, 'KDP220WP-250W', 'KD ENERGY', 1),
(1027, 'LP182*182M72NH580W', 'LEAPTON', 1),
(1028, 'LP182*182M72NH580WV2', 'LEAPTON', 1),
(1029, 'LP182*199M66NH580W', 'LEAPTON', 1),
(1030, 'LP210*210M66MH665W', 'LEAPTON', 1),
(1031, 'LP210*210M66NB670W', 'LEAPTON', 1),
(1032, 'LP210*210M66NB690W', 'LEAPTON', 1),
(1033, 'LR528HTH225M', 'LONGI', 1),
(1034, 'LR554HTD425M', 'LONGI', 1),
(1035, 'LR554HTH430M', 'LONGI', 1),
(1036, 'LR572HTH575M', 'LONGI', 1),
(1037, 'LR572HTH585M', 'LONGI', 1),
(1038, 'LR572HTHF580M', 'LONGI', 1),
(1039, 'LR772HTH610M', 'LONGI', 1),
(1040, 'PRO10012', 'EPCOM POWERLINE', 1),
(1041, 'PRO1012', 'EPCOM POWERLINE', 1),
(1042, 'PRO12512', 'EPCOM POWERLINE', 1),
(1043, 'PRO-150-12', 'EPCOM POWERLINE', 1),
(1044, 'PRO25024', 'EPCOM POWERLINE', 1),
(1045, 'PRO2512', 'EPCOM POWERLINE', 1),
(1046, 'PRO5012', 'EPCOM POWERLINE', 1),
(1047, 'PRO5012ND', 'EPCOM POWERLINE', 1),
(1048, 'PRO8512', 'EPCOM POWERLINE', 1),
(1049, 'PROSE-15012', 'EPCOM POWERLINE', 1),
(1050, 'PROSE-230W', 'EPCOM POWERLINE', 1),
(1051, 'PROSE-5012', 'EPCOM POWERLINE', 1),
(1052, 'PROSE-8512', 'EPCOM POWERLINE', 1),
(1053, 'RSM1328660M', 'RISEN', 1),
(1054, 'RSM1449550M', 'RISEN', 1),
(1055, 'SE-182*91-460M-120-BH', 'Solarever', 1),
(1056, 'TSM340DE14AII', 'Trina Solar', 1),
(1057, 'ETM760BH450WW/WB', 'ETSOLAR / ELITEsolar', 1),
(2001, 'BAT212070084 ', 'Victron Energy AGM', 2),
(2002, 'BAT212120086', 'Victron Energy AGM', 2),
(2003, 'BAT212200084', 'Victron Energy AGM', 2),
(2004, 'BAT412350084', 'Victron Energy AGM', 2),
(2005, 'BAT412550084', 'Victron Energy AGM', 2),
(2006, 'BAT412800084', 'Victron Energy AGM', 2),
(2007, 'BAT412101084', 'Victron Energy AGM', 2),
(2008, 'BAT412121084', 'Victron Energy AGM', 2),
(2009, 'BAT412151084', 'Victron Energy AGM', 2),
(2010, 'BAT412201084', 'Victron Energy AGM', 2),
(2011, 'BAT406225084', 'Victron Energy AGM', 2),
(2012, 'BAT412124081', 'Victron Energy AGM', 2),
(3001, 'SS-MPPT-15L', 'Morningstar', 3),
(3002, 'EB-MPPT-20', 'Morningstar', 3),
(3003, 'EB-MPPT-20M', 'Morningstar', 3),
(3004, 'PS-MPPT-25', 'Morningstar', 3),
(3005, 'PS-MPPT-25M', 'Morningstar', 3),
(3006, 'EB-MPPT-30', 'Morningstar', 3),
(3007, 'EB-MPPT-30M', 'Morningstar', 3),
(3008, 'TS-MPPT-30', 'Morningstar', 3),
(3009, 'EB-MPPT-40', 'Morningstar', 3),
(3010, 'EB-MPPT-40M', 'Morningstar', 3),
(3011, 'PS-MPPT-40', 'Morningstar', 3),
(3012, 'PS-MPPT-40M', 'Morningstar', 3),
(3013, 'TS-MPPT-45', 'Morningstar', 3),
(3014, 'GS-MPPT-60M-200V', 'Morningstar', 3),
(3015, 'TS-MPPT-60', 'Morningstar', 3),
(3016, 'TS-MPPT-60-600V-48', 'Morningstar', 3),
(3017, 'TS-MPPT-60-600V-48-DB', 'Morningstar', 3),
(3018, 'TS-MPPT-60-600V-48-DB-TR', 'Morningstar', 3),
(3019, 'TS-MPPT-60-600V-48-DB-TR-GFPD', 'Morningstar', 3),
(3020, 'TS-MPPT-60M', 'Morningstar', 3),
(3021, 'GS-MPPT-80M-200V', 'Morningstar', 3),
(3022, 'GS-MPPT-100M-200V', 'Morningstar', 3),
(4001, 'BP-65', 'Victron Energy', 4),
(4002, 'BP 48-100', 'Victron Energy', 4),
(4003, 'BP-100', 'Victron Energy', 4),
(4004, 'BP-220', 'Victron Energy', 4),
(5001, 'A9N61521', 'Schneider', 5),
(5002, 'A9N61522', 'Schneider', 5),
(5003, 'A9N61523', 'Schneider', 5),
(5004, 'A9N61524', 'Schneider', 5),
(5005, 'A9N61525', 'Schneider', 5),
(5006, 'A9N61526', 'Schneider', 5),
(5007, 'A9N61528', 'Schneider', 5),
(5008, 'A9N61529', 'Schneider', 5),
(5009, 'A9N61530', 'Schneider', 5),
(5010, 'A9N61531', 'Schneider', 5),
(5011, 'A9N61532', 'Schneider', 5),
(5012, 'A9N61533', 'Schneider', 5),
(5013, 'A9N61534', 'Schneider', 5),
(5014, 'A9N61535', 'Schneider', 5),
(5015, 'A9N61537', 'Schneider', 5),
(5016, 'A9N61538', 'Schneider', 5),
(5017, 'A9N61539', 'Schneider', 5),
(6001, '2783160000', 'Weidmuller', 6),
(6002, '2783170000', 'Weidmuller', 6),
(6003, '2783180000', 'Weidmuller', 6),
(6004, '2783190000', 'Weidmuller', 6),
(6005, '2783200000', 'Weidmuller', 6),
(6006, '2783210000', 'Weidmuller', 6),
(6007, '2783220000', 'Weidmuller', 6),
(6008, '2783230000', 'Weidmuller', 6),
(6009, '2783240000', 'Weidmuller', 6),
(6010, '2783250000', 'Weidmuller', 6),
(6011, '2783260000', 'Weidmuller', 6),
(6012, '2783280000', 'Weidmuller', 6),
(6013, '2827990000', 'Weidmuller', 6),
(6014, '2828000000', 'Weidmuller', 6),
(6015, '2865970000', 'Weidmuller', 6),
(6016, '4000003732', 'Weidmuller', 6),
(6017, '4000003733', 'Weidmuller', 6),
(6018, '4000003734', 'Weidmuller', 6),
(6019, '2873890000', 'Weidmuller', 6),
(6020, '2870900000', 'Weidmuller', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `clave` int(11) NOT NULL,
  `propiedad` varchar(100) NOT NULL,
  `valor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`clave`, `propiedad`, `valor`) VALUES
(6001, 'Corriente (A) ', '1'),
(6001, 'Medida', '10X38'),
(6002, 'Corriente (A) ', '2'),
(6002, 'Medida', '10X38'),
(6003, 'Corriente (A)', '3'),
(6003, 'Medida', '10X38\r\n'),
(6004, 'Corriente (A)', '4'),
(6004, 'Medida', '10X38'),
(6005, 'Corriente (A)', '5'),
(6005, 'Medida', '10X38'),
(6006, 'Corriente (A)', '6'),
(6006, 'Medida', '10X38'),
(6007, 'Corriente (A)', '8'),
(6007, 'Medida', '10X38'),
(6008, 'Corriente (A)', '10'),
(6008, 'Medida', '10X38'),
(6009, 'Corriente (A)', '12'),
(6009, 'Medida', '10X38'),
(6010, 'Corriente (A)', '15'),
(6010, 'Medida', '10X38'),
(6011, 'Corriente (A)', '16'),
(6012, 'Corriente (A)', '20'),
(6013, 'Corriente (A)', '25'),
(6014, 'Corriente (A)', '30'),
(6015, 'Corriente (A)', '35'),
(6016, 'Corriente (A)', '40'),
(6017, 'Corriente (A)', '50'),
(6018, 'Corriente (A)', '65'),
(6019, 'Corriente (A)', '70'),
(6020, 'Corriente (A)', '75'),
(6011, 'Medida', '10X38'),
(6012, 'Medida', '10X38'),
(6013, 'Medida', '10X38'),
(6014, 'Medida', '10X38'),
(6015, 'Medida', '22x58'),
(6016, 'Medida', '22x59\r\n'),
(6017, 'Medida', '22x60\r\n'),
(6018, 'Medida', '22x61\r\n'),
(6019, 'Medida', '22x62'),
(6020, 'Medida', '22x63\r\n'),
(5001, 'Corriente (A)', '1'),
(5002, 'Corriente (A)', '2'),
(5003, 'Corriente (A)', '3'),
(5004, 'Corriente (A)', '4'),
(5005, 'Corriente (A)', '5'),
(5006, 'Corriente (A)', '6'),
(5007, 'Corriente (A)', '10'),
(5008, 'Corriente (A)', '13'),
(5009, 'Corriente (A)', '15'),
(5010, 'Corriente (A)', '16'),
(5011, 'Corriente (A)', '20'),
(5012, 'Corriente (A)', '25'),
(5013, 'Corriente (A)', '30'),
(5014, 'Corriente (A)', '32'),
(5015, 'Corriente (A)', '40'),
(5016, 'Corriente (A)', '50'),
(5017, 'Corriente (A)', '63'),
(4001, 'Tensión de trabajo Min (V)', '6'),
(4002, 'Tensión de trabajo Min (V)', '24'),
(4003, 'Tensión de trabajo Min (V)', '6'),
(4004, 'Tensión de trabajo Min (V)', '6'),
(4001, 'Tensión de trabajo Max (V)', '35'),
(4002, 'Tensión de trabajo Max (V)', '64'),
(4003, 'Tensión de trabajo Max (V)', '35'),
(4004, 'Tensión de trabajo Max (V)', '35'),
(4001, 'Corriente (A)', '65'),
(4002, 'Corriente (A)', '100'),
(4003, 'Corriente (A)', '100'),
(4004, 'Corriente (A)', '220'),
(3001, 'Corriente máxima (A)', '15'),
(3002, 'Corriente máxima (A)', '20'),
(3003, 'Corriente máxima (A)', '20'),
(3004, 'Corriente máxima (A)', '25'),
(3005, 'Corriente máxima (A)', '25'),
(3006, 'Corriente máxima (A)', '30'),
(3007, 'Corriente máxima (A)', '30'),
(3008, 'Corriente máxima (A)', '30'),
(3009, 'Corriente máxima (A)', '40'),
(3010, 'Corriente máxima (A)', '40'),
(3011, 'Corriente máxima (A)', '40'),
(3012, 'Corriente máxima (A)', '40'),
(3013, 'Corriente máxima (A)', '45'),
(3014, 'Corriente máxima (A)', '60'),
(3015, 'Corriente máxima (A)', '60'),
(3016, 'Corriente máxima (A)', '60'),
(3017, 'Corriente máxima (A)', '60'),
(3018, 'Corriente máxima (A)', '60'),
(3019, 'Corriente máxima (A)', '60'),
(3020, 'Corriente máxima (A)', '60'),
(3021, 'Corriente máxima (A)', '80'),
(3022, 'Corriente máxima (A)', '100'),
(3001, 'VoC (V)', '60'),
(3002, 'VoC (V)', '120'),
(3003, 'VoC (V)', '120'),
(3004, 'VoC (V)', '120'),
(3005, 'VoC (V)', '120'),
(3006, 'VoC (V)', '120'),
(3007, 'VoC (V)', '120'),
(3008, 'VoC (V)', '150'),
(3009, 'VoC (V)', '120'),
(3010, 'VoC (V)', '120'),
(3011, 'VoC (V)', '120'),
(3012, 'VoC (V)', '120'),
(3013, 'VoC (V)', '150'),
(3014, 'VoC (V)', '200'),
(3015, 'VoC (V)', '150'),
(3016, 'VoC (V)', '600'),
(3017, 'VoC (V)', '600'),
(3018, 'VoC (V)', '600'),
(3019, 'VoC (V)', '600'),
(3020, 'VoC (V)', '150'),
(3021, 'VoC (V)', '200'),
(3022, 'VoC (V)', '200'),
(3001, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3002, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3003, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3004, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3005, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3006, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3007, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3008, 'Voltaje nominal de funcionamiento (V)', '12 / 24 / 36 / 48'),
(3009, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3010, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3011, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3012, 'Voltaje nominal de funcionamiento (V)', '12 / 24'),
(3013, 'Voltaje nominal de funcionamiento (V)', '12 / 24 / 36 / 48'),
(3014, 'Voltaje nominal de funcionamiento (V)', '12 / 24 / 36'),
(3015, 'Voltaje nominal de funcionamiento (V)', '12 / 24 / 36 / 48'),
(3016, 'Voltaje nominal de funcionamiento (V)', '24 / 36 / 48 / 60'),
(3017, 'Voltaje nominal de funcionamiento (V)', '24 / 36 / 48 / 60'),
(3018, 'Voltaje nominal de funcionamiento (V)', '24 / 36 / 48 / 60'),
(3019, 'Voltaje nominal de funcionamiento (V)', '24 / 36 / 48 / 60'),
(3020, 'Voltaje nominal de funcionamiento (V)', '12 / 24 / 36 / 48'),
(3021, 'Voltaje nominal de funcionamiento (V)', '12 / 24 / 48'),
(3022, 'Voltaje nominal de funcionamiento (V)', '12 / 24 / 48'),
(3001, 'Rango de voltaje de batería (V)', '7-36'),
(3002, 'Rango de voltaje de batería (V)', '10-35'),
(3003, 'Rango de voltaje de batería (V)', '10-35'),
(3004, 'Rango de voltaje de batería (V)', '10-35'),
(3005, 'Rango de voltaje de batería (V)', '10-35'),
(3006, 'Rango de voltaje de batería (V)', '10-35'),
(3007, 'Rango de voltaje de batería (V)', '10-35'),
(3008, 'Rango de voltaje de batería (V)', '8-72'),
(3009, 'Rango de voltaje de batería (V)', '10-35'),
(3010, 'Rango de voltaje de batería (V)', '10-35'),
(3011, 'Rango de voltaje de batería (V)', '10-35'),
(3012, 'Rango de voltaje de batería (V)', '10-35'),
(3013, 'Rango de voltaje de batería (V)', '8-72'),
(3014, 'Rango de voltaje de batería (V)', '8-72'),
(3015, 'Rango de voltaje de batería (V)', '8-72'),
(3016, 'Rango de voltaje de batería (V)', '16-72'),
(3017, 'Rango de voltaje de batería (V)', '16-72'),
(3018, 'Rango de voltaje de batería (V)', '16-72'),
(3019, 'Rango de voltaje de batería (V)', '16-72'),
(3020, 'Rango de voltaje de batería (V)', '8-72'),
(3021, 'Rango de voltaje de batería (V)', '8-72'),
(3022, 'Rango de voltaje de batería (V)', '8-72'),
(2001, 'Ah', '8'),
(2002, 'Ah', '14'),
(2003, 'Ah', '22'),
(2004, 'Ah', '38'),
(2005, 'Ah', '60'),
(2006, 'Ah', '90'),
(2007, 'Ah', '110'),
(2008, 'Ah', '130'),
(2009, 'Ah', '165'),
(2010, 'Ah', '220'),
(2011, 'Ah', '240'),
(2012, 'Ah', '240'),
(2001, 'V', '12'),
(2002, 'V', '12'),
(2003, 'V', '12'),
(2004, 'V', '12'),
(2005, 'V', '12'),
(2006, 'V', '12'),
(2007, 'V', '12'),
(2008, 'V', '12'),
(2009, 'V', '12'),
(2010, 'V', '12'),
(2011, 'V', '6'),
(2012, 'V', '12'),
(2001, 'L x An x Al (mm)', '151 x 65 x 101'),
(2002, 'L x An x Al (mm)', '151 x 98 x 101'),
(2003, 'L x An x Al (mm)', '81 x 77 x 167'),
(2004, 'L x An x Al (mm)', '197 x 165 x 170'),
(2005, 'L x An x Al (mm)', '229 x 138 x 227'),
(2006, 'L x An x Al (mm)', '350 x 167 x 183'),
(2007, 'L x An x Al (mm)', '330 x 171 x 220'),
(2008, 'L x An x Al (mm)', '410 x 176 x 227'),
(2009, 'L x An x Al (mm)', '485 x 172 x 240'),
(2010, 'L x An x Al (mm)', '522 x 238 x 240'),
(2011, 'L x An x Al (mm)', '320 x 176 x 247'),
(2012, 'L x An x Al (mm)', '522 x 240 x 224'),
(2001, 'Peso (kg)', '2.5'),
(2002, 'Peso (kg)', '4.4'),
(2003, 'Peso (kg)', '5.8'),
(2004, 'Peso (kg)', '12.5'),
(2005, 'Peso (kg)', '20'),
(2006, 'Peso (kg)', '27'),
(2007, 'Peso (kg)', '32'),
(2008, 'Peso (kg)', '38'),
(2009, 'Peso (kg)', '47'),
(2010, 'Peso (kg)', '65'),
(2011, 'Peso (kg)', '31'),
(2012, 'Peso (kg)', '67'),
(1001, 'Proveedor', 'SYSCOM'),
(1001, 'Potencia (W)', '100'),
(1001, 'Alto (m)', '1.38'),
(1001, 'Ancho (m)', '0.54'),
(1001, 'Eficiencia (%)', '13.41'),
(1001, 'Tensión a potencia máx / Vmpp (V)', '19'),
(1001, 'Corriente a potencia máx / Impp (A)', '5.27'),
(1001, 'Tensión en circuito abierto / VoC (V)', '24.0'),
(1001, 'Corriente de cortocircuito / Isc (A)', '5.5'),
(1002, 'Proveedor', 'SYSCOM'),
(1002, 'Potencia (W)', '200'),
(1002, 'Alto (m)', '2.38'),
(1002, 'Ancho (m)', '0.54'),
(1002, 'Eficiencia (%)', '15.56'),
(1002, 'Tensión a potencia máx / Vmpp (V)', '19'),
(1002, 'Corriente a potencia máx / Impp (A)', '10.5'),
(1002, 'Tensión en circuito abierto / VoC (V)', '24.0'),
(1002, 'Corriente de cortocircuito / Isc (A)', '11'),
(1003, 'Proveedor', 'Solarever'),
(1003, 'Potencia (W)', '625'),
(1003, 'Alto (m)', '2.382'),
(1003, 'Ancho (m)', '1.134'),
(1003, 'Eficiencia (%)', '23.1'),
(1003, 'Tensión a potencia máx / Vmpp (V)', '41.45'),
(1003, 'Corriente a potencia máx / Impp (A)', '15.08'),
(1003, 'Tensión en circuito abierto / VoC (V)', '48.4'),
(1003, 'Corriente de cortocircuito / Isc (A)', '16'),
(1004, 'Proveedor', 'SYSCOM'),
(1004, 'Potencia (W)', '330'),
(1004, 'Alto (m)', '1.956'),
(1004, 'Ancho (m)', '0.99'),
(1004, 'Eficiencia (%)', '17.04'),
(1004, 'Tensión a potencia máx / Vmpp (V)', '37.6'),
(1004, 'Corriente a potencia máx / Impp (A)', '8.77'),
(1004, 'Tensión en circuito abierto / VoC (V)', '46.2'),
(1004, 'Corriente de cortocircuito / Isc (A)', '9.27'),
(1005, 'Proveedor', 'SYSCOM'),
(1005, 'Potencia (W)', '220'),
(1005, 'Alto (m)', '1.835'),
(1005, 'Ancho (m)', '0.82'),
(1005, 'Eficiencia (%)', '22.0'),
(1005, 'Tensión a potencia máx / Vmpp (V)', '18.4'),
(1005, 'Corriente a potencia máx / Impp (A)', '12 A / 8.4 A'),
(1005, 'Tensión en circuito abierto / VoC (V)', '21.8'),
(1005, 'Corriente de cortocircuito / Isc (A)', '13 A / 8.8 A'),
(1006, 'Proveedor', 'SYSCOM'),
(1006, 'Potencia (W)', '400'),
(1006, 'Alto (m)', '1.058'),
(1006, 'Ancho (m)', '2.365'),
(1006, 'Eficiencia (%)', '22.6'),
(1006, 'Tensión a potencia máx / Vmpp (V)', '41'),
(1006, 'Corriente a potencia máx / Impp (A)', '9.8'),
(1006, 'Tensión en circuito abierto / VoC (V)', '48.0'),
(1006, 'Corriente de cortocircuito / Isc (A)', '11'),
(1007, 'Proveedor', 'SYSCOM'),
(1007, 'Potencia (W)', '450'),
(1007, 'Alto (m)', '2.102'),
(1007, 'Ancho (m)', '1.04'),
(1007, 'Eficiencia (%)', '20.60'),
(1007, 'Tensión a potencia máx / Vmpp (V)', '41.4'),
(1007, 'Corriente a potencia máx / Impp (A)', '10.87'),
(1007, 'Tensión en circuito abierto / VoC (V)', '50.0'),
(1007, 'Corriente de cortocircuito / Isc (A)', '11.44'),
(1008, 'Proveedor', 'SYSCOM'),
(1008, 'Potencia (W)', '550'),
(1008, 'Alto (m)', '2.279'),
(1008, 'Ancho (m)', '1.134'),
(1008, 'Eficiencia (%)', '21.28'),
(1008, 'Tensión a potencia máx / Vmpp (V)', '40.98'),
(1008, 'Corriente a potencia máx / Impp (A)', '13.42'),
(1008, 'Tensión en circuito abierto / VoC (V)', '49.68'),
(1008, 'Corriente de cortocircuito / Isc (A)', '14.01'),
(1009, 'Proveedor', 'SYSCOM'),
(1009, 'Potencia (W)', '100'),
(1009, 'Alto (m)', '0.905'),
(1009, 'Ancho (m)', '0.58'),
(1009, 'Eficiencia (%)', '19.1'),
(1009, 'Tensión a potencia máx / Vmpp (V)', '20.2'),
(1009, 'Corriente a potencia máx / Impp (A)', '4.95'),
(1009, 'Tensión en circuito abierto / VoC (V)', '24.0'),
(1009, 'Corriente de cortocircuito / Isc (A)', '5.38'),
(1010, 'Proveedor', 'SYSCOM'),
(1010, 'Potencia (W)', '10'),
(1010, 'Alto (m)', '0.23'),
(1010, 'Ancho (m)', '0.345'),
(1010, 'Eficiencia (%)', '12.6'),
(1010, 'Tensión a potencia máx / Vmpp (V)', '18.6'),
(1010, 'Corriente a potencia máx / Impp (A)', '0.54'),
(1010, 'Tensión en circuito abierto / VoC (V)', '22.6'),
(1010, 'Corriente de cortocircuito / Isc (A)', '0.58'),
(1011, 'Proveedor', 'SYSCOM'),
(1011, 'Potencia (W)', '125'),
(1011, 'Alto (m)', '1.24'),
(1011, 'Ancho (m)', '0.67'),
(1011, 'Eficiencia (%)', '15.04'),
(1011, 'Tensión a potencia máx / Vmpp (V)', '18.27'),
(1011, 'Corriente a potencia máx / Impp (A)', '6.84'),
(1011, 'Tensión en circuito abierto / VoC (V)', '22.16'),
(1011, 'Corriente de cortocircuito / Isc (A)', '7.22'),
(1012, 'Proveedor', 'SYSCOM'),
(1012, 'Potencia (W)', '130'),
(1012, 'Alto (m)', '0.885'),
(1012, 'Ancho (m)', '0.765'),
(1012, 'Eficiencia (%)', '19.2'),
(1012, 'Tensión a potencia máx / Vmpp (V)', ' '),
(1012, 'Corriente a potencia máx / Impp (A)', '6.44'),
(1012, 'Tensión en circuito abierto / VoC (V)', '24.0'),
(1012, 'Corriente de cortocircuito / Isc (A)', '7'),
(1013, 'Proveedor', 'SYSCOM'),
(1013, 'Potencia (W)', '150'),
(1013, 'Alto (m)', '1.48'),
(1013, 'Ancho (m)', '0.67'),
(1013, 'Eficiencia (%)', '15.12'),
(1013, 'Tensión a potencia máx / Vmpp (V)', '18.37'),
(1013, 'Corriente a potencia máx / Impp (A)', '8.17'),
(1013, 'Tensión en circuito abierto / VoC (V)', '22.44'),
(1013, 'Corriente de cortocircuito / Isc (A)', '8.82'),
(1014, 'Proveedor', 'SYSCOM'),
(1014, 'Potencia (W)', '180'),
(1014, 'Alto (m)', '1.2'),
(1014, 'Ancho (m)', '0.765'),
(1014, 'Eficiencia (%)', '19.6'),
(1014, 'Tensión a potencia máx / Vmpp (V)', '20.2'),
(1014, 'Corriente a potencia máx / Impp (A)', '8.91'),
(1014, 'Tensión en circuito abierto / VoC (V)', '24.0'),
(1014, 'Corriente de cortocircuito / Isc (A)', '9.69'),
(1015, 'Proveedor', 'SYSCOM'),
(1015, 'Potencia (W)', '30'),
(1015, 'Alto (m)', '0.465'),
(1015, 'Ancho (m)', '0.4'),
(1015, 'Eficiencia (%)', '16.1'),
(1015, 'Tensión a potencia máx / Vmpp (V)', '19'),
(1015, 'Corriente a potencia máx / Impp (A)', '1.58'),
(1015, 'Tensión en circuito abierto / VoC (V)', '22.8'),
(1015, 'Corriente de cortocircuito / Isc (A)', '1.72'),
(1016, 'Proveedor', 'SYSCOM'),
(1016, 'Potencia (W)', '330'),
(1016, 'Alto (m)', '1.956'),
(1016, 'Ancho (m)', '0.992'),
(1016, 'Eficiencia (%)', '17.01'),
(1016, 'Tensión a potencia máx / Vmpp (V)', '37.87'),
(1016, 'Corriente a potencia máx / Impp (A)', '8.71'),
(1016, 'Tensión en circuito abierto / VoC (V)', '46.79'),
(1016, 'Corriente de cortocircuito / Isc (A)', '9.18'),
(1017, 'Proveedor', 'SYSCOM'),
(1017, 'Potencia (W)', '450'),
(1017, 'Alto (m)', '2.094'),
(1017, 'Ancho (m)', '1.038'),
(1017, 'Eficiencia (%)', '20.71'),
(1017, 'Tensión a potencia máx / Vmpp (V)', '41.39'),
(1017, 'Corriente a potencia máx / Impp (A)', '10.88'),
(1017, 'Tensión en circuito abierto / VoC (V)', '50.1'),
(1017, 'Corriente de cortocircuito / Isc (A)', '11.48'),
(1018, 'Proveedor', 'SYSCOM'),
(1018, 'Potencia (W)', '50'),
(1018, 'Alto (m)', '0.54'),
(1018, 'Ancho (m)', '0.67'),
(1018, 'Eficiencia (%)', '13.81'),
(1018, 'Tensión a potencia máx / Vmpp (V)', '18.59'),
(1018, 'Corriente a potencia máx / Impp (A)', '2.69'),
(1018, 'Tensión en circuito abierto / VoC (V)', '22.6'),
(1018, 'Corriente de cortocircuito / Isc (A)', '2.95'),
(1019, 'Proveedor', 'SYSCOM'),
(1019, 'Potencia (W)', '50'),
(1019, 'Alto (m)', '0.705'),
(1019, 'Ancho (m)', '0.4'),
(1019, 'Eficiencia (%)', '17.7'),
(1019, 'Tensión a potencia máx / Vmpp (V)', '20.2'),
(1019, 'Corriente a potencia máx / Impp (A)', '2.48'),
(1019, 'Tensión en circuito abierto / VoC (V)', '24.0'),
(1019, 'Corriente de cortocircuito / Isc (A)', '2.68'),
(1020, 'Proveedor', 'SYSCOM'),
(1020, 'Potencia (W)', '540'),
(1020, 'Alto (m)', '2.278'),
(1020, 'Ancho (m)', '1.133'),
(1020, 'Eficiencia (%)', '21.13'),
(1020, 'Tensión a potencia máx / Vmpp (V)', '41.55'),
(1020, 'Corriente a potencia máx / Impp (A)', '13'),
(1020, 'Tensión en circuito abierto / VoC (V)', '49.5'),
(1020, 'Corriente de cortocircuito / Isc (A)', '13.81'),
(1021, 'Proveedor', 'SYSCOM'),
(1021, 'Potencia (W)', '85'),
(1021, 'Alto (m)', '0.85'),
(1021, 'Ancho (m)', '0.67'),
(1021, 'Eficiencia (%)', '14.92'),
(1021, 'Tensión a potencia máx / Vmpp (V)', '18.58'),
(1021, 'Corriente a potencia máx / Impp (A)', '4.57'),
(1021, 'Tensión en circuito abierto / VoC (V)', '22.6'),
(1021, 'Corriente de cortocircuito / Isc (A)', '4.98'),
(1022, 'Proveedor', 'SYSCOM'),
(1022, 'Potencia (W)', '450'),
(1022, 'Alto (m)', '1.903'),
(1022, 'Ancho (m)', '1.134'),
(1022, 'Eficiencia (%)', '20.85'),
(1022, 'Tensión a potencia máx / Vmpp (V)', '33.91'),
(1022, 'Corriente a potencia máx / Impp (A)', '13.27'),
(1022, 'Tensión en circuito abierto / VoC (V)', '41.18'),
(1022, 'Corriente de cortocircuito / Isc (A)', '13.85'),
(1023, 'Proveedor', 'SYSCOM'),
(1023, 'Potencia (W)', '450'),
(1023, 'Alto (m)', '1.909'),
(1023, 'Ancho (m)', '1.134'),
(1023, 'Eficiencia (%)', '20.98'),
(1023, 'Tensión a potencia máx / Vmpp (V)', '35.04'),
(1023, 'Corriente a potencia máx / Impp (A)', '12.85'),
(1023, 'Tensión en circuito abierto / VoC (V)', '41.4'),
(1023, 'Corriente de cortocircuito / Isc (A)', '13.6'),
(1024, 'Proveedor', 'SYSCOM'),
(1024, 'Potencia (W)', '540'),
(1024, 'Alto (m)', '2.279'),
(1024, 'Ancho (m)', '1.134'),
(1024, 'Eficiencia (%)', '20.9'),
(1024, 'Tensión a potencia máx / Vmpp (V)', '41.64'),
(1024, 'Corriente a potencia máx / Impp (A)', '12.97'),
(1024, 'Tensión en circuito abierto / VoC (V)', '49.6'),
(1024, 'Corriente de cortocircuito / Isc (A)', '13.86'),
(1025, 'Proveedor', 'SYSCOM'),
(1025, 'Potencia (W)', '550'),
(1025, 'Alto (m)', '2.274'),
(1025, 'Ancho (m)', '1.134'),
(1025, 'Eficiencia (%)', '21.5'),
(1025, 'Tensión a potencia máx / Vmpp (V)', '41.96'),
(1025, 'Corriente a potencia máx / Impp (A)', '13.11'),
(1025, 'Tensión en circuito abierto / VoC (V)', '49.9'),
(1025, 'Corriente de cortocircuito / Isc (A)', '14'),
(1026, 'Potencia (W)', '250'),
(1026, 'Alto (m)', '1.652'),
(1026, 'Ancho (m)', '0.994'),
(1026, 'Eficiencia (%)', '15.2'),
(1026, 'Tensión a potencia máx / Vmpp (V)', '30.3'),
(1026, 'Corriente a potencia máx / Impp (A)', '8.27'),
(1026, 'Tensión en circuito abierto / VoC (V)', '38.19'),
(1026, 'Corriente de cortocircuito / Isc (A)', '8.65'),
(1027, 'Proveedor', 'SYSCOM'),
(1027, 'Potencia (W)', '580'),
(1027, 'Alto (m)', '2.334'),
(1027, 'Ancho (m)', '1.134'),
(1027, 'Eficiencia (%)', '21.91'),
(1027, 'Tensión a potencia máx / Vmpp (V)', '43.16'),
(1027, 'Corriente a potencia máx / Impp (A)', '13.44'),
(1027, 'Tensión en circuito abierto / VoC (V)', '52.13'),
(1027, 'Corriente de cortocircuito / Isc (A)', '13.92'),
(1028, 'Proveedor', 'SYSCOM'),
(1028, 'Potencia (W)', '580'),
(1028, 'Alto (m)', '2.279'),
(1028, 'Ancho (m)', '1.134'),
(1028, 'Eficiencia (%)', '22.44'),
(1028, 'Tensión a potencia máx / Vmpp (V)', '42.42'),
(1028, 'Corriente a potencia máx / Impp (A)', '13.67'),
(1028, 'Tensión en circuito abierto / VoC (V)', '51.09'),
(1028, 'Corriente de cortocircuito / Isc (A)', '14.45'),
(1029, 'Proveedor', 'SYSCOM'),
(1029, 'Potencia (W)', '580'),
(1029, 'Alto (m)', '2.279'),
(1029, 'Ancho (m)', '1.134'),
(1029, 'Eficiencia (%)', '22.44'),
(1029, 'Tensión a potencia máx / Vmpp (V)', '40.31'),
(1029, 'Corriente a potencia máx / Impp (A)', '14.39'),
(1029, 'Tensión en circuito abierto / VoC (V)', '48.22'),
(1029, 'Corriente de cortocircuito / Isc (A)', '15.22'),
(1030, 'Proveedor', 'SYSCOM'),
(1030, 'Potencia (W)', '665'),
(1030, 'Alto (m)', '2.384'),
(1030, 'Ancho (m)', '1.303'),
(1030, 'Eficiencia (%)', '21.41'),
(1030, 'Tensión a potencia máx / Vmpp (V)', '38.21'),
(1030, 'Corriente a potencia máx / Impp (A)', '17.4'),
(1030, 'Tensión en circuito abierto / VoC (V)', '46.18'),
(1030, 'Corriente de cortocircuito / Isc (A)', '18.31'),
(1031, 'Proveedor', 'SYSCOM'),
(1031, 'Potencia (W)', '670'),
(1031, 'Alto (m)', '2.384'),
(1031, 'Ancho (m)', '1.303'),
(1031, 'Eficiencia (%)', '21.57'),
(1031, 'Tensión a potencia máx / Vmpp (V)', '38.41'),
(1031, 'Corriente a potencia máx / Impp (A)', '17.44'),
(1031, 'Tensión en circuito abierto / VoC (V)', '46.38'),
(1031, 'Corriente de cortocircuito / Isc (A)', '18.36'),
(1032, 'Proveedor', 'SYSCOM'),
(1032, 'Potencia (W)', '690'),
(1032, 'Alto (m)', '2.384'),
(1032, 'Ancho (m)', '1.303'),
(1032, 'Eficiencia (%)', '22.21'),
(1032, 'Tensión a potencia máx / Vmpp (V)', '39.8'),
(1032, 'Corriente a potencia máx / Impp (A)', '17.34'),
(1032, 'Tensión en circuito abierto / VoC (V)', '47.8'),
(1032, 'Corriente de cortocircuito / Isc (A)', '18.3'),
(1033, 'Proveedor', 'SYSCOM'),
(1033, 'Potencia (W)', '225'),
(1033, 'Alto (m)', '1.354'),
(1033, 'Ancho (m)', '0.767'),
(1033, 'Eficiencia (%)', '21.6'),
(1033, 'Tensión a potencia máx / Vmpp (V)', '17.24'),
(1033, 'Corriente a potencia máx / Impp (A)', '13.06'),
(1033, 'Tensión en circuito abierto / VoC (V)', '20.5'),
(1033, 'Corriente de cortocircuito / Isc (A)', '14.1'),
(1034, 'Proveedor', 'SYSCOM'),
(1034, 'Potencia (W)', '425'),
(1034, 'Alto (m)', '1.722'),
(1034, 'Ancho (m)', '1.134'),
(1034, 'Eficiencia (%)', '21.8'),
(1034, 'Tensión a potencia máx / Vmpp (V)', '32.96'),
(1034, 'Corriente a potencia máx / Impp (A)', '12.9'),
(1034, 'Tensión en circuito abierto / VoC (V)', '39.23'),
(1034, 'Corriente de cortocircuito / Isc (A)', '13.93'),
(1035, 'Proveedor', 'SYSCOM'),
(1035, 'Potencia (W)', '430'),
(1035, 'Alto (m)', '1.722'),
(1035, 'Ancho (m)', '1.134'),
(1035, 'Eficiencia (%)', '22.0'),
(1035, 'Tensión a potencia máx / Vmpp (V)', '32.84'),
(1035, 'Corriente a potencia máx / Impp (A)', '13.1'),
(1035, 'Tensión en circuito abierto / VoC (V)', '39.13'),
(1035, 'Corriente de cortocircuito / Isc (A)', '14.15'),
(1036, 'Proveedor', 'SYSCOM'),
(1036, 'Potencia (W)', '575'),
(1036, 'Alto (m)', '2.278'),
(1036, 'Ancho (m)', '1.134'),
(1036, 'Eficiencia (%)', '22.3'),
(1036, 'Tensión a potencia máx / Vmpp (V)', '43.91'),
(1036, 'Corriente a potencia máx / Impp (A)', '13.1'),
(1036, 'Tensión en circuito abierto / VoC (V)', '52.06'),
(1036, 'Corriente de cortocircuito / Isc (A)', '14.14'),
(1037, 'Proveedor', 'SYSCOM'),
(1037, 'Potencia (W)', '585'),
(1037, 'Alto (m)', '2.278'),
(1037, 'Ancho (m)', '1.134'),
(1037, 'Eficiencia (%)', '22.6'),
(1037, 'Tensión a potencia máx / Vmpp (V)', '44.21'),
(1037, 'Corriente a potencia máx / Impp (A)', '13.24'),
(1037, 'Tensión en circuito abierto / VoC (V)', '52.36'),
(1037, 'Corriente de cortocircuito / Isc (A)', '14.27'),
(1038, 'Proveedor', 'SYSCOM'),
(1038, 'Potencia (W)', '580'),
(1038, 'Alto (m)', '2.281'),
(1038, 'Ancho (m)', '1.134'),
(1038, 'Eficiencia (%)', '22.40'),
(1038, 'Tensión a potencia máx / Vmpp (V)', '44.06'),
(1038, 'Corriente a potencia máx / Impp (A)', '13.17'),
(1038, 'Tensión en circuito abierto / VoC (V)', '52.21'),
(1038, 'Corriente de cortocircuito / Isc (A)', '14.2'),
(1039, 'Proveedor', 'SYSCOM'),
(1039, 'Potencia (W)', '610'),
(1039, 'Alto (m)', '2.382'),
(1039, 'Ancho (m)', '1.134'),
(1039, 'Eficiencia (%)', '22.6'),
(1039, 'Tensión a potencia máx / Vmpp (V)', '44.18'),
(1039, 'Corriente a potencia máx / Impp (A)', '13.81'),
(1039, 'Tensión en circuito abierto / VoC (V)', '52.42'),
(1039, 'Corriente de cortocircuito / Isc (A)', '14.8'),
(1040, 'Proveedor', 'SYSCOM'),
(1040, 'Potencia (W)', '100'),
(1040, 'Alto (m)', '1.02'),
(1040, 'Ancho (m)', '0.67'),
(1040, 'Eficiencia (%)', '14.63'),
(1040, 'Tensión a potencia máx / Vmpp (V)', '17.5'),
(1040, 'Corriente a potencia máx / Impp (A)', '5.71'),
(1040, 'Tensión en circuito abierto / VoC (V)', '21.5'),
(1040, 'Corriente de cortocircuito / Isc (A)', '6.02'),
(1041, 'Proveedor', 'SYSCOM'),
(1041, 'Potencia (W)', '10'),
(1041, 'Alto (m)', '0.365'),
(1041, 'Ancho (m)', '0.24'),
(1041, 'Eficiencia (%)', '11.41'),
(1041, 'Tensión a potencia máx / Vmpp (V)', '17.9'),
(1041, 'Corriente a potencia máx / Impp (A)', '0.56'),
(1041, 'Tensión en circuito abierto / VoC (V)', '22.1'),
(1041, 'Corriente de cortocircuito / Isc (A)', '0.59'),
(1042, 'Proveedor', 'SYSCOM'),
(1042, 'Potencia (W)', '125'),
(1042, 'Alto (m)', '1.245'),
(1042, 'Ancho (m)', '0.67'),
(1042, 'Eficiencia (%)', '14.98'),
(1042, 'Tensión a potencia máx / Vmpp (V)', '18.1'),
(1042, 'Corriente a potencia máx / Impp (A)', '6.91'),
(1042, 'Tensión en circuito abierto / VoC (V)', '22.3'),
(1042, 'Corriente de cortocircuito / Isc (A)', '7.37'),
(1043, 'Proveedor', 'SYSCOM'),
(1043, 'Potencia (W)', '150'),
(1043, 'Alto (m)', '1.476'),
(1043, 'Ancho (m)', '0.67'),
(1043, 'Eficiencia (%)', '15.16'),
(1043, 'Tensión a potencia máx / Vmpp (V)', '18.3'),
(1043, 'Corriente a potencia máx / Impp (A)', '8.2'),
(1043, 'Tensión en circuito abierto / VoC (V)', '22.7'),
(1043, 'Corriente de cortocircuito / Isc (A)', '8.58'),
(1044, 'Proveedor', 'SYSCOM'),
(1044, 'Potencia (W)', '250'),
(1044, 'Alto (m)', '1.64'),
(1044, 'Ancho (m)', '0.98'),
(1044, 'Eficiencia (%)', '15.55'),
(1044, 'Tensión a potencia máx / Vmpp (V)', '37.5'),
(1044, 'Corriente a potencia máx / Impp (A)', '8.2'),
(1044, 'Tensión en circuito abierto / VoC (V)', '30.5'),
(1044, 'Corriente de cortocircuito / Isc (A)', '8.71'),
(1045, 'Proveedor', 'SYSCOM'),
(1045, 'Potencia (W)', '25'),
(1045, 'Alto (m)', '0.54'),
(1045, 'Ancho (m)', '0.36'),
(1045, 'Eficiencia (%)', '12.86'),
(1045, 'Tensión a potencia máx / Vmpp (V)', '18.28'),
(1045, 'Corriente a potencia máx / Impp (A)', '1.44'),
(1045, 'Tensión en circuito abierto / VoC (V)', '22.5'),
(1045, 'Corriente de cortocircuito / Isc (A)', '1.37'),
(1046, 'Proveedor', 'SYSCOM'),
(1046, 'Potencia (W)', '50'),
(1046, 'Alto (m)', '0.67'),
(1046, 'Ancho (m)', '0.53'),
(1046, 'Eficiencia (%)', '14.08'),
(1046, 'Tensión a potencia máx / Vmpp (V)', '17.9'),
(1046, 'Corriente a potencia máx / Impp (A)', '2.79'),
(1046, 'Tensión en circuito abierto / VoC (V)', '22.1'),
(1046, 'Corriente de cortocircuito / Isc (A)', '2.94'),
(1047, 'Proveedor', 'SYSCOM'),
(1047, 'Potencia (W)', '50'),
(1047, 'Alto (m)', '0.53'),
(1047, 'Ancho (m)', '0.66'),
(1047, 'Eficiencia (%)', '14.29'),
(1047, 'Tensión a potencia máx / Vmpp (V)', '18'),
(1047, 'Corriente a potencia máx / Impp (A)', '2.77'),
(1047, 'Tensión en circuito abierto / VoC (V)', '22.2'),
(1047, 'Corriente de cortocircuito / Isc (A)', '3.96'),
(1048, 'Proveedor', 'SYSCOM'),
(1048, 'Potencia (W)', '85'),
(1048, 'Alto (m)', '0.85'),
(1048, 'Ancho (m)', '0.67'),
(1048, 'Eficiencia (%)', '14.92'),
(1048, 'Tensión a potencia máx / Vmpp (V)', '18.1'),
(1048, 'Corriente a potencia máx / Impp (A)', '4.7'),
(1048, 'Tensión en circuito abierto / VoC (V)', '22.3'),
(1048, 'Corriente de cortocircuito / Isc (A)', '5.01'),
(1049, 'Proveedor', 'SYSCOM'),
(1049, 'Potencia (W)', '150'),
(1049, 'Alto (m)', '1.48'),
(1049, 'Ancho (m)', '0.68'),
(1049, 'Eficiencia (%)', '14.90'),
(1049, 'Tensión a potencia máx / Vmpp (V)', '18'),
(1049, 'Corriente a potencia máx / Impp (A)', '8.59'),
(1049, 'Tensión en circuito abierto / VoC (V)', '21.6'),
(1049, 'Corriente de cortocircuito / Isc (A)', '9.02'),
(1050, 'Proveedor', 'SYSCOM'),
(1050, 'Potencia (W)', '230'),
(1050, 'Alto (m)', '1.58'),
(1050, 'Ancho (m)', '1.06'),
(1050, 'Eficiencia (%)', '13.73'),
(1050, 'Tensión a potencia máx / Vmpp (V)', '49.2'),
(1050, 'Corriente a potencia máx / Impp (A)', '4.67'),
(1050, 'Tensión en circuito abierto / VoC (V)', '59.0'),
(1050, 'Corriente de cortocircuito / Isc (A)', '5.03'),
(1051, 'Proveedor', 'SYSCOM'),
(1051, 'Potencia (W)', '50'),
(1051, 'Alto (m)', '0.68'),
(1051, 'Ancho (m)', '0.535'),
(1051, 'Eficiencia (%)', '13.74'),
(1051, 'Tensión a potencia máx / Vmpp (V)', '18'),
(1051, 'Corriente a potencia máx / Impp (A)', '2.86'),
(1051, 'Tensión en circuito abierto / VoC (V)', '21.6'),
(1051, 'Corriente de cortocircuito / Isc (A)', '3.01'),
(1052, 'Proveedor', 'SYSCOM'),
(1052, 'Potencia (W)', '85'),
(1052, 'Alto (m)', '0.77'),
(1052, 'Ancho (m)', '0.67'),
(1052, 'Eficiencia (%)', '16.47'),
(1052, 'Tensión a potencia máx / Vmpp (V)', '18.1'),
(1052, 'Corriente a potencia máx / Impp (A)', '4.7'),
(1052, 'Tensión en circuito abierto / VoC (V)', '22.3'),
(1052, 'Corriente de cortocircuito / Isc (A)', '5.01'),
(1053, 'Proveedor', 'SYSCOM'),
(1053, 'Potencia (W)', '660'),
(1053, 'Alto (m)', '2.384'),
(1053, 'Ancho (m)', '1.303'),
(1053, 'Eficiencia (%)', '21.2'),
(1053, 'Tensión a potencia máx / Vmpp (V)', '38.12'),
(1053, 'Corriente a potencia máx / Impp (A)', '17.32'),
(1053, 'Tensión en circuito abierto / VoC (V)', '45.75'),
(1053, 'Corriente de cortocircuito / Isc (A)', '18.33'),
(1054, 'Proveedor', 'SYSCOM'),
(1054, 'Potencia (W)', '550'),
(1054, 'Alto (m)', '2.279'),
(1054, 'Ancho (m)', '1.134'),
(1054, 'Eficiencia (%)', '21.3'),
(1054, 'Tensión a potencia máx / Vmpp (V)', '42.2'),
(1054, 'Corriente a potencia máx / Impp (A)', '13.04'),
(1054, 'Tensión en circuito abierto / VoC (V)', '49.8'),
(1054, 'Corriente de cortocircuito / Isc (A)', '13.94'),
(1055, 'Proveedor', 'Solarever'),
(1055, 'Potencia (W)', '460'),
(1055, 'Alto (m)', '1.903'),
(1055, 'Ancho (m)', '1.134'),
(1055, 'Eficiencia (%)', '21.32'),
(1055, 'Tensión a potencia máx / Vmpp (V)', '34.96'),
(1055, 'Corriente a potencia máx / Impp (A)', '13.16'),
(1055, 'Tensión en circuito abierto / VoC (V)', '41.39'),
(1055, 'Corriente de cortocircuito / Isc (A)', '14.04'),
(1056, 'Proveedor', 'SYSCOM'),
(1056, 'Potencia (W)', '340'),
(1056, 'Alto (m)', '1.96'),
(1056, 'Ancho (m)', '0.992'),
(1056, 'Eficiencia (%)', '17.5'),
(1056, 'Tensión a potencia máx / Vmpp (V)', '38.2'),
(1056, 'Corriente a potencia máx / Impp (A)', '8.9'),
(1056, 'Tensión en circuito abierto / VoC (V)', '46.2'),
(1056, 'Corriente de cortocircuito / Isc (A)', '9.5'),
(1057, 'Proveedor', 'SYSCOM'),
(1057, 'Potencia (W)', '450'),
(1057, 'Alto (m)', '1.909'),
(1057, 'Ancho (m)', '1.134'),
(1057, 'Eficiencia (%)', '20.98'),
(1057, 'Tensión a potencia máx / Vmpp (V)', '35.04'),
(1057, 'Corriente a potencia máx / Impp (A)', '12.85'),
(1057, 'Tensión en circuito abierto / VoC (V)', '41.4'),
(1057, 'Corriente de cortocircuito / Isc (A)', '13.6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`clase`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`clave`),
  ADD KEY `clase` (`clase`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD KEY `clave` (`clave`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`clase`) REFERENCES `clasificacion` (`clase`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `propiedades_ibfk_1` FOREIGN KEY (`clave`) REFERENCES `materiales` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
