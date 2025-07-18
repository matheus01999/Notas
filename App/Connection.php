<?php

namespace App;


class Connection
{

	private static $conn;
	

	
	public static function getConn()
	{

		// CARREGAR O ARQUIVO JSON
		$configJson = file_get_contents('config.json');

		// DECODIFICA O JSON DE CONFIGURAÇÃO DO BANCO O MESMO É INCLUIDO NO INDEX PARA UM FOREACH 
		$configDecode = json_decode($configJson, true);

		echo'<pre>';
		print_r($configDecode);

		

		
		try {

			self::$conn = new \PDO(
				"mysql:host=localhost;dbname=appnotas;charset=utf8",
				"root",
				""
			);

			return self::$conn;
		} catch (\PDOException $Error) {
			echo 'Erro de  PDO ' . $Error;
		}
	}
}
