<?php
/*
	Archivo llamado tras petición con AJAX
*/
require_once '../../../config_avanzado/config_avanzado.php';
$bd = new subase();

#print_r($_POST);
#print_r($_GET);

if (isset($_POST["id"]) && isset($_POST["ano"]) && isset($_POST["salario_minimo"]) && isset($_POST["auxilio_transporte"]) && isset($_POST["uvt"]) && isset($_POST["porcentaje_retencion_salario"]) && isset($_POST["valor_base_retencion"]) && isset($_POST["caso"])) {
	foreach ($_POST as $key => $value) {
		# Escapar la variables
		$_POST[$key] = addslashes($value);
	}

	# Ejecutar Query para actualizar los datos
	switch ($_POST["caso"]) {
		case 'u': # Update / Actualizar
			$sql="UPDATE parametros SET ano='".$_POST["ano"]."',salario_minimo='".$_POST["salario_minimo"]."',auxilio_transporte='".$_POST["auxilio_transporte"]."',uvt='".$_POST["uvt"]."',porcentaje_retencion_salario='".$_POST["porcentaje_retencion_salario"]."',valor_base_retencion='".$_POST["valor_base_retencion"]."' WHERE id=".$_POST["id"];
			$mensaje="Actualizado";
			break;
		case 'd': # Delete / Eliminar
			$sql="DELETE FROM parametros WHERE id=".$_POST["id"];
			$mensaje="Eliminado";
			break;
		case 'c': # Create / Crear
			$sql="INSERT INTO parametros (ano,salario_minimo,auxilio_transporte,uvt,porcentaje_retencion_salario,valor_base_retencion) VALUES ('".$_POST["ano"]."','".$_POST["salario_minimo"]."','".$_POST["auxilio_transporte"]."','".$_POST["uvt"]."','".$_POST["porcentaje_retencion_salario"]."','".$_POST["valor_base_retencion"]."')";
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