<?php
/*
	Archivo llamado tras petición con AJAX
*/
require_once '../../../config_avanzado/config_avanzado.php';
$bd = new subase();

#print_r($_POST);
#print_r($_GET);

if (isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["cuenta"]) && isset($_POST["clave"]) && isset($_POST["estado"]) && isset($_POST["perfil_id"]) && isset($_POST["caso"])) {
	foreach ($_POST as $key => $value) {
		# Escapar la variables
		$_POST[$key] = addslashes($value);
	}

	# Ejecutar Query para actualizar los datos
	switch ($_POST["caso"]) {
		case 'u': # Update / Actualizar
			$sql="UPDATE perfiles SET nombre='".$_POST["nombre"]."',cuenta='".$_POST["cuenta"]."',clave='".$_POST["clave"]."',estado='".$_POST["estado"]."',perfil_id='".$_POST["perfil_id"]."' WHERE id=".$_POST["id"];
			$mensaje="Actualizado";
			break;
		case 'd': # Delete / Eliminar
			$sql="DELETE FROM perfiles WHERE id=".$_POST["id"];
			$mensaje="Eliminado";
			break;
		case 'c': # Create / Crear
			$sql="INSERT INTO perfiles (nombre,cuenta,clave,estado,perfil_id) VALUES ('".$_POST["nombre"]."','".$_POST["cuenta"]."','".$_POST["clave"]."','".$_POST["estado"]."','".$_POST["perfil_id"]."')";
			$mensaje="Adicionado";
			break;
	}
	if ($bd->consulta($sql)) {
		# Query ejectudo Ok
		$fila = array("caso"=>$_POST["caso"],"mensaje"=>"OK. El registro fue $mensaje exitosamente!");
		if ($_POST["caso"]=="c") { # Create / Crear
			$fila["id"] = $bd->ultimo_id();
		}
	} else {
		$fila = array("caso"=>$_POST["caso"],"mensaje"=>"ERROR: El registro NO fue $mensaje! : $sql");
	}
	echo json_encode($fila);
}
?>