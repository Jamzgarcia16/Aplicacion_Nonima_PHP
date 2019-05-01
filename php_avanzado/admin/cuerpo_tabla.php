<?php
# Pinta el cuerpo (body) de la tabla
if ($tabla_cuerpo) {
	foreach ($tabla_cuerpo as $key => $fila) {
		echo "<tr>";
		echo '<td class="text-center"><button class="btn btn-info btn-sm" title="Editar" data-toggle="modal" data-target="#formModal" onclick="editar('.$fila["id"].',this.parentNode.parentNode.id);"><i class="fas fa-edit" style="font-size:12px"></i></button></td>';
		foreach ($fila as $key => $value) {
			echo "<td>$value</td>";
		}
		echo '<td class="text-center"><button class="btn btn-danger btn-sm" title="Eliminar" data-toggle="modal" data-target="#formModal" onclick="eliminar('.$fila["id"].',this.parentNode.parentNode.id);"><i class="fas fa-trash" style="font-size:12px"></i></button></td>';
		echo "</tr>";
	}
}
?>