<?php 
class Conexion{

	static public function conectar(){

		$cadena = new PDO("mysql:host=localhost;dbname=ejercicio","root","");

		$cadena->exec("set names utf8");

		return $cadena;

	}
}

?>