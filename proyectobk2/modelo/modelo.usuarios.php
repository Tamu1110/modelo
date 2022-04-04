<?php
require_once "conexion.php";

class ModeloUsuarios{

	static public function ConsultaUsuarios()
		{
			$consulta = Conexion::conectar()->prepare("SELECT * FROM usuarios");

			$consulta -> execute();

			return $consulta -> fetchAll();

			
		}

	static public function InsertarUsuarios($datos)
		{
			//Se debe omitir el id porque la version de mysql 5.7.31 no recomose el null y se nombran todos los campos tal cual esta en la base de datos a excepción de id....
			$consulta = Conexion::conectar()->prepare("INSERT INTO usuarios (cedula, nombre, apellido, usuario, clave, id_tusuario) VALUES (
													'$datos[0]',
													'$datos[1]',
													'$datos[2]',
													'$datos[3]',
													'$datos[4]',
													'$datos[5]'
												   )");

			if($consulta -> execute())
				return "ok";
			else
				return "error";
		}

	//Login Usuario
	static public function loginUsuarios($datos)
	{
		$consulta = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario = '$datos[0]' AND clave ='$datos[1]' ");

		$consulta -> execute();

		return $consulta -> fetch();

	}
    
}


?>