<?php

namespace App;

Class Connection {

    private static $conn;

    public  static function getConn() {
		try {

			self::$conn = new \PDO(
				"mysql:host=localhost;dbname=appnotas;charset=utf8",
				"root",
				"" 
			);

			return self::$conn;


		} catch (\PDOException $Error) {
			echo 'Erro de  PDO'.$Error;
		}
	}
}




?>

