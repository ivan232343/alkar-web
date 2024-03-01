-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         11.1.3-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para data_latam_gestion
DROP DATABASE IF EXISTS `data_latam_gestion`;
CREATE DATABASE IF NOT EXISTS `data_latam_gestion` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `data_latam_gestion`;

-- Volcando estructura para tabla data_latam_gestion.tb_bp_user
DROP TABLE IF EXISTS `tb_bp_user`;
CREATE TABLE IF NOT EXISTS `tb_bp_user` (
  `id_bp_user` int(11) NOT NULL,
  `name_user` varchar(50) DEFAULT NULL,
  `bp_user` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id_bp_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla data_latam_gestion.tb_llamada
DROP TABLE IF EXISTS `tb_llamada`;
CREATE TABLE IF NOT EXISTS `tb_llamada` (
  `id_llamada` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_corte` int(1) DEFAULT NULL,
  `calificacion` int(1) DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `fecha` date DEFAULT dayofmonth('now'),
  `bp_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_llamada`),
  KEY `FK_tipo_corte` (`tipo_corte`),
  KEY `FK_bp_user` (`bp_user`),
  CONSTRAINT `FK_bp_user` FOREIGN KEY (`bp_user`) REFERENCES `tb_bp_user` (`id_bp_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_tipo_corte` FOREIGN KEY (`tipo_corte`) REFERENCES `tb_tipo_corte` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=921 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla data_latam_gestion.tb_tipo_corte
DROP TABLE IF EXISTS `tb_tipo_corte`;
CREATE TABLE IF NOT EXISTS `tb_tipo_corte` (
  `id_tipo` int(1) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para procedimiento data_latam_gestion.sp_add_call
DROP PROCEDURE IF EXISTS `sp_add_call`;
DELIMITER //
CREATE PROCEDURE `sp_add_call`(
	IN `tipo_corte` INT,
	IN `satisfaccion` INT,
	IN `hora_in` TIME,
	IN `hora_out` TIME
)
    MODIFIES SQL DATA
BEGIN
if satisfaccion <> 0 then 
INSERT INTO 
tb_llamada(
tb_llamada.tipo_corte,
tb_llamada.calificacion,
tb_llamada.time_in,
tb_llamada.time_out,
tb_llamada.fecha) 
VALUES
(tipo_corte,satisfaccion,hora_in,hora_out,CURDATE());
ELSE  
INSERT INTO tb_llamada(
tb_llamada.tipo_corte,
tb_llamada.time_in,
tb_llamada.time_out,
tb_llamada.fecha)
VALUES
(tipo_corte,hora_in,hora_out,CURDATE());
END if;
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_count_sat_day_current
DROP PROCEDURE IF EXISTS `sp_count_sat_day_current`;
DELIMITER //
CREATE PROCEDURE `sp_count_sat_day_current`()
BEGIN
SELECT 
`fun_count_NxDay`('5') AS "conteo_5",
`fun_count_NxDay`('4') AS "conteo_4",
`fun_count_NxDay`('3') AS "conteo_3",
`fun_count_NxDay`('2') AS "conteo_2",
`fun_count_NxDay`('1') AS "conteo_1";
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_count_sat_month_current
DROP PROCEDURE IF EXISTS `sp_count_sat_month_current`;
DELIMITER //
CREATE PROCEDURE `sp_count_sat_month_current`()
BEGIN
SELECT 
`fun_count_NxMonth_current`('5') AS "conteo_5",
`fun_count_NxMonth_current`('4') AS "conteo_4",
`fun_count_NxMonth_current`('3') AS "conteo_3",
`fun_count_NxMonth_current`('2') AS "conteo_2",
`fun_count_NxMonth_current`('1') AS "conteo_1";
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_count_sat_week_current
DROP PROCEDURE IF EXISTS `sp_count_sat_week_current`;
DELIMITER //
CREATE PROCEDURE `sp_count_sat_week_current`()
BEGIN
SELECT 
`fun_count_NxWeek_current`('5') AS "conteo_5",
`fun_count_NxWeek_current`('4') AS "conteo_4",
`fun_count_NxWeek_current`('3') AS "conteo_3",
`fun_count_NxWeek_current`('2') AS "conteo_2",
`fun_count_NxWeek_current`('1') AS "conteo_1";
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_count_TC_day
DROP PROCEDURE IF EXISTS `sp_count_TC_day`;
DELIMITER //
CREATE PROCEDURE `sp_count_TC_day`()
BEGIN
SELECT 
`fun_count_TCxDay`('1') AS "liberado",
`fun_count_TCxDay`('2') AS "transferido",
`fun_count_TCxDay`('3') AS "cortado";
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_count_TC_month
DROP PROCEDURE IF EXISTS `sp_count_TC_month`;
DELIMITER //
CREATE PROCEDURE `sp_count_TC_month`()
BEGIN
SELECT 
`fun_count_TCxMonth`('1') AS "liberado",
`fun_count_TCxMonth`('2') AS "transferido",
`fun_count_TCxMonth`('3') AS "cortado";
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_count_TC_week
DROP PROCEDURE IF EXISTS `sp_count_TC_week`;
DELIMITER //
CREATE PROCEDURE `sp_count_TC_week`()
BEGIN
SELECT 
`fun_count_TCxWeek`('1') AS "liberado",
`fun_count_TCxWeek`('2') AS "transferido",
`fun_count_TCxWeek`('3') AS "cortado";
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_view_month_current
DROP PROCEDURE IF EXISTS `sp_view_month_current`;
DELIMITER //
CREATE PROCEDURE `sp_view_month_current`()
BEGIN
SELECT 
tb_tipo_corte.nombre_tipo AS 'tipo_corte',
tb_llamada.calificacion,
tb_llamada.time_in,
tb_llamada.time_out,
tb_llamada.fecha
FROM tb_llamada
INNER JOIN tb_tipo_corte ON tb_llamada.tipo_corte = tb_tipo_corte.id_tipo
WHERE month(tb_llamada.fecha) = month(NOW())
;
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_view_month_last
DROP PROCEDURE IF EXISTS `sp_view_month_last`;
DELIMITER //
CREATE PROCEDURE `sp_view_month_last`()
BEGIN
SELECT 
tb_tipo_corte.nombre_tipo AS 'tipo_corte',
tb_llamada.calificacion,
tb_llamada.time_in,
tb_llamada.time_out,
tb_llamada.fecha
FROM tb_llamada
INNER JOIN tb_tipo_corte ON tb_llamada.tipo_corte = tb_tipo_corte.id_tipo
WHERE month(tb_llamada.fecha) = month(NOW())-1
;
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_view_today
DROP PROCEDURE IF EXISTS `sp_view_today`;
DELIMITER //
CREATE PROCEDURE `sp_view_today`()
BEGIN
SELECT 
tb_tipo_corte.nombre_tipo AS 'tipo_corte',
tb_llamada.calificacion,
tb_llamada.time_in,
tb_llamada.time_out
FROM tb_llamada
INNER JOIN tb_tipo_corte ON tb_llamada.tipo_corte = tb_tipo_corte.id_tipo
WHERE tb_llamada.fecha = CURDATE()
ORDER BY tb_llamada.time_in
;
END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_view_week_current
DROP PROCEDURE IF EXISTS `sp_view_week_current`;
DELIMITER //
CREATE PROCEDURE `sp_view_week_current`()
BEGIN
SELECT 
tb_tipo_corte.nombre_tipo AS 'tipo_corte',
tb_llamada.calificacion,
tb_llamada.time_in,
tb_llamada.time_out,
tb_llamada.fecha
FROM tb_llamada
INNER JOIN tb_tipo_corte ON tb_llamada.tipo_corte = tb_tipo_corte.id_tipo
WHERE WEEK(tb_llamada.fecha) = WEEK(NOW())
;

END//
DELIMITER ;

-- Volcando estructura para procedimiento data_latam_gestion.sp_view_week_last
DROP PROCEDURE IF EXISTS `sp_view_week_last`;
DELIMITER //
CREATE PROCEDURE `sp_view_week_last`()
BEGIN
SELECT 
tb_tipo_corte.nombre_tipo AS 'tipo_corte',
tb_llamada.calificacion,
tb_llamada.time_in,
tb_llamada.time_out,
tb_llamada.fecha
FROM tb_llamada
INNER JOIN tb_tipo_corte ON tb_llamada.tipo_corte = tb_tipo_corte.id_tipo
WHERE WEEK(tb_llamada.fecha) = WEEK(NOW())-1
ORDER BY tb_llamada.fecha ASC , tb_llamada.time_in asc 
;

END//
DELIMITER ;

-- Volcando estructura para función data_latam_gestion.fun_count_NxDay
DROP FUNCTION IF EXISTS `fun_count_NxDay`;
DELIMITER //
CREATE FUNCTION `fun_count_NxDay`(`satisfaccion` INT
) RETURNS int(11)
BEGIN
DECLARE insa1 INT ;
SELECT  count(tb_llamada.calificacion)
INTO insa1 FROM tb_llamada
WHERE tb_llamada.calificacion = satisfaccion
AND tb_llamada.fecha = CURDATE();
RETURN insa1;
END//
DELIMITER ;

-- Volcando estructura para función data_latam_gestion.fun_count_NxMonth_current
DROP FUNCTION IF EXISTS `fun_count_NxMonth_current`;
DELIMITER //
CREATE FUNCTION `fun_count_NxMonth_current`(`satisfaccion` INT
) RETURNS int(11)
BEGIN
DECLARE insa1 INT ;
SELECT  count(tb_llamada.calificacion) INTO insa1 FROM tb_llamada
WHERE tb_llamada.calificacion = satisfaccion
AND MONTH(tb_llamada.fecha) = MONTH(NOW());
RETURN insa1;
END//
DELIMITER ;

-- Volcando estructura para función data_latam_gestion.fun_count_NxWeek_current
DROP FUNCTION IF EXISTS `fun_count_NxWeek_current`;
DELIMITER //
CREATE FUNCTION `fun_count_NxWeek_current`(`satisfaccion` INT
) RETURNS int(11)
BEGIN
DECLARE insa1 INT ;
SELECT  count(tb_llamada.calificacion) INTO insa1 FROM tb_llamada
WHERE 
tb_llamada.calificacion = satisfaccion AND 
MONTH(tb_llamada.fecha) = MONTH(NOW())
AND WEEK(tb_llamada.fecha) = WEEK(NOW())

;

RETURN insa1;
END//
DELIMITER ;

-- Volcando estructura para función data_latam_gestion.fun_count_TCxDay
DROP FUNCTION IF EXISTS `fun_count_TCxDay`;
DELIMITER //
CREATE FUNCTION `fun_count_TCxDay`(`tipo_corte` INT
) RETURNS int(11)
BEGIN
DECLARE liberados INT ;
SELECT count(tb_llamada.tipo_corte) INTO liberados FROM tb_llamada 
WHERE tb_llamada.tipo_corte = tipo_corte
AND tb_llamada.fecha = CURDATE();
RETURN liberados ;
END//
DELIMITER ;

-- Volcando estructura para función data_latam_gestion.fun_count_TCxMonth
DROP FUNCTION IF EXISTS `fun_count_TCxMonth`;
DELIMITER //
CREATE FUNCTION `fun_count_TCxMonth`(`tipo_corte` INT
) RETURNS int(11)
BEGIN
DECLARE liberacion INT;
SELECT count(tb_llamada.tipo_corte) INTO liberacion FROM tb_llamada 
WHERE tb_llamada.tipo_corte =tipo_corte
AND MONTH(tb_llamada.fecha) = MONTH(NOW());
RETURN liberacion;
END//
DELIMITER ;

-- Volcando estructura para función data_latam_gestion.fun_count_TCxWeek
DROP FUNCTION IF EXISTS `fun_count_TCxWeek`;
DELIMITER //
CREATE FUNCTION `fun_count_TCxWeek`(`tipo_corte` INT
) RETURNS int(11)
BEGIN
DECLARE liberado INT;
SELECT count(tb_llamada.tipo_corte) INTO liberado FROM tb_llamada 
WHERE tb_llamada.tipo_corte = tipo_corte
AND MONTH(tb_llamada.fecha) = MONTH(NOW())
AND WEEK(tb_llamada.fecha) = WEEK(NOW());
RETURN liberado;
END//
DELIMITER ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
