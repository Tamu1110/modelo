<?php

//require_once "../modelo/modelo.usuarios.php";

class ControladorUsuarios
	{
		
		static public function contrConsultaUsuarios()
		{
			$respuesta = ModeloUsuarios::ConsultaUsuarios();

			return $respuesta;
		}

		static public function contrInsertarUsuarios($datos)
		{
			// 0 = cedula, 1 = nombre, 2 = apellido, 3 = usuario, 4 = clave, 5 = id_tusuario
			if(!empty($datos[0])&&!empty($datos[1])&&!empty($datos[2])&&!empty($datos[3])&&!empty($datos[4])&&!empty($datos[5])){

				

				$datos1=array($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);

				$respuesta = ModeloUsuarios::InsertarUsuarios($datos1);
			}else
				$respuesta ="vacio";

			return $respuesta;
		}	

		public function contrIngresarUsuarios($datos)
		{
			
			if(isset($datos[0]))
			{
				$respuesta = ModeloUsuarios::loginUsuarios($datos);
				if ($respuesta == FALSE)
				/*	echo "El usuario o contraseña ingresados no han sido encontrados";
				else
					echo "inicio de sesión correcto";*/
					{
						echo '<script>
		
							if ( window.history.replaceState ) {
		
								window.history.replaceState( null, null, window.location.href );
		
							}
		
						</script>';
						echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
					} else
					{
						
						
						echo '<script>
		
							if ( window.history.replaceState ) {
		
								window.history.replaceState( null, null, window.location.href );
		
							}
		
							window.location = "index.php?pagina=usuarios";
		
						</script>';
		
					}

			}
			

				
		}	




    }
        
?>