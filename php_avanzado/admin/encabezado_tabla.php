<?php
# Pinta el encabezado de la tabla
if ($tabla) {
	echo "<tr>";
	echo '<th class="text-center"><button class="btn btn-warning btn-sm" title="Adicionar" data-toggle="modal" data-target="#formModal" onclick="adicionar();"><i class="fas fa-plus-square" style="font-size:12px"></i></button></th>';
	foreach ($tabla as $key => $value) {
		# Obtiene el nombre de cada columna
		echo "<th>".ucfirst($value["Field"])."</th>";
	}
	echo "<th></th>";
	echo "</tr>";
}
?>