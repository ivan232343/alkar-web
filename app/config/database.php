<?php
require_once "config.class.php";
class conexion 
{
	public static function con()
	{
		$db_config = new base_config();
		$motor = $db_config->_motor;
		$host = $db_config->_host;
		$name = $db_config->_namedb = "data_latam_gestion";
		$user = $db_config->_user ;
		$upass = $db_config->_upass ;
		try {
			$pdo = new PDO("$motor:host=$host; dbname=$name" , $user, $upass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			return $pdo;
		} catch (PDOException $e) {
			die('Error:' . $e->getMessage());
		}
	}
}