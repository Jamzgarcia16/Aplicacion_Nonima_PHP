<?php
/*
	Archivo llamado tras petición con AJAX
*/
require_once '../../../config_avanzado/config_avanzado.php';
# Genera un nuevo Token xss
$bd = new subase();

if (isset($_SESSION["pav"]["id"])) {
	# Session iniciada
	if (isset($_POST["id"]) && isset($_POST["token"])) {
		if ($_POST["token"] == $_SESSION["pav"]["token_xss"]) {
			# Ultimo Token validado OK.
			# Ejecutar Query para devolver datos
			$sql="SELECT id,titulo,icono,programa,url FROM menus WHERE id=".$_POST["id"];
			$fila=$bd->sub_fila($sql);
			$fila["token"]=$token_csrf;
			$_SESSION["pav"]["token_xss"]=$token_csrf; # Actualizamos el token en la sesión
			# print_r($fila);
			echo json_encode($fila);
		} else {
			# Cerramos la sesión
			session_unset();
			session_destroy();
		}
	} else {
		# Cerramos la sesión
		session_unset();
		session_destroy();
	}
} else {
	# Cerramos la sesión
	session_unset();
	session_destroy();
}
?>