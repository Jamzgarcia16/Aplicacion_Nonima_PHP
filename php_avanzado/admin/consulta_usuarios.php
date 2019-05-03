<?php
/*
	Archivo llamado tras petición con AJAX
*/
require_once '../../../config_avanzado/config_avanzado.php';
$bd = new subase();

if (isset($_POST["id"])) {
	# Ejecutar Query para devolver datos
	$sql="SELECT id,nombre,cuenta,clave,foto,estado,perfil_id FROM usuarios WHERE id=".$_POST["id"];
	$fila=$bd->sub_fila($sql);
	# print_r($fila);
	echo json_encode($fila);
}
?>