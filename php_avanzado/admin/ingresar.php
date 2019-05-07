<?php
/*
echo "<pre>";
print_r($_GET);
print_r($_POST);
echo "</pre>";
*/
#include 'file';
#include_once 'file';
#require '../../../config_avanzado/config_avanzado.php';
require_once '../../../config_avanzado/config_avanzado.php';
if (isset($_POST["email"]) && isset($_POST["clave"]) && isset($_POST["token_csrf"])) {
	# Autenticación del usuario
	#$bd = mysqli_connect(SERVIDOR_BD,USER_BD,CLAVE_BD,BD,PUERTO);

	if ($_POST["token_csrf"] == $_SESSION["pav"]["token_xss"]) {
		# Verificación del último token generado

		$bd = new subase();
		if ($bd) {
			# Conexión a la BD ok
			$sql="SELECT id,nombre,foto,perfil_id FROM usuarios WHERE cuenta='".$_POST["email"]."' AND clave='".$_POST["clave"]."' and estado=1";
			#echo "$sql";
			if ($fila=$bd->sub_fila($sql)) {
				# Usuario autenticado ok
				# Activar la sessión
				#echo "<hr>";
				#print_r($fila);
				$_SESSION["pav"]=$fila;
				$_SESSION["pav"]["token_xss"] = $token_csrf;
				header("location: index.php");
			} elseif ($bd->obtener_error() == "") {
				# Error en autenticación
				$_SESSION["error1"]="Error en la cuenta o la clave";
				header("location: login.php");
			} else {
				# Error en ejecución del Query
				$_SESSION["error1"]="Error a301, en este momento no hay servicio, intente mas tarde";
				header("location: login.php");
			}
		} else {
			# Error en conexión a la BD
			$_SESSION["error1"]="Error a302, en este momento no hay servicio, intente mas tarde";
			header("location: login.php");
		}

	} else {
		session_unset();
		session_destroy();
		session_start();
		$_SESSION["error1"]="Error h302, en este momento sin servicio, intente mas tarde";
		
		header("location: login.php");
	}

}
?>