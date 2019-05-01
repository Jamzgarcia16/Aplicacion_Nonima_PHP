<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ejemplo con Arreglos</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="card">
  <div class="card-header text-center" style="text-align: right;">
  	<h2>Ejemplo con Arreglos</h2>
  </div>
  <div class="card-body">
  	<?php
  	// Ejemplos con arreglos
  	$estudiantes = array();
  	print_r($estudiantes);
  	$estudiantes[0] = "Rocio";
  	$estudiantes[1] = "Jhon";
  	$estudiantes[2] = "Alvaro";
  	print_r($estudiantes);
  	echo "<br>$estudiantes[0]<br>";
  	echo "Cantidad de elementos: ".count($estudiantes)."<br>\n";
  	$estudiantes["ausente"] = "Jimmy";
  	echo "Cantidad de elementos: ".count($estudiantes)."<br>\n";
  	echo "<pre>";
	$estudiantes["quorum"] = 4;
	print_r($estudiantes);
  	echo "Cantidad de elementos: ".count($estudiantes)."<br>\n";
  	echo "</pre>";

	for ($i=0; $i < count($estudiantes); $i++) { 
		# code...
		echo "Indice: $i - Valor: $estudiantes[$i]<br>\n";
	}

	echo "<ol>";
	$j=0;
	foreach ($estudiantes as $key => $value) {
		# code...
		$j++;
		echo "<li> I: $key - Dato: $value</li>";
	}
	echo "</ol>";

	$cursos = array();
	$cursos[] = "Programación PHP";
	$cursos[] = "Programación Java";
	$cursos[] = "Programación .NET";
	$cursos[] = "Programación Python";
	$cursos[] = "Programación JavaScript";
	$cursos[] = 125;

	echo "<hr>";
	print_r($cursos);

	echo "<hr>";
	$productos = array("Celular",5 => "Moto","vehiculo" => "Auto");
	print_r($productos);
	echo "<hr>";
	echo "<hr>";
	# Arreglos multidimensionales
	$productos = array();

	$productos[0]['id'] = 123;
	$productos[0]['nombre'] = 'Celular';
	$productos[0]['precio'] = 1690000;
	$productos[0]['iva'] = 19;
	$productos[0]['precio_iva'] = 0;
	$productos[0]['foto'] = 'fotos/celular.jpeg';

	$productos[1]['id'] = 124;
	$productos[1]['nombre'] = 'Moto';
	$productos[1]['precio'] = 7690000;
	$productos[1]['iva'] = 19;
	$productos[1]['precio_iva'] = 0;
	$productos[1]['foto'] = 'fotos/moto.jpg';

	$productos[2]['id'] = 125;
	$productos[2]['nombre'] = 'Automóvil Audi A4';
	$productos[2]['precio'] = 140000000;
	$productos[2]['iva'] = 19;
	$productos[2]['precio_iva'] = 0;
	$productos[2]['foto'] = 'fotos/audi.jpg';

	$productos[3]['id'] = 126;
	$productos[3]['nombre'] = 'Lapicero retractil';
	$productos[3]['precio'] = 14000;
	$productos[3]['iva'] = 19;
	$productos[3]['precio_iva'] = 0;
	$productos[3]['foto'] = 'fotos/lapicero.png';

	print_r($productos);

	$foto = $productos[0]['foto'];
	echo "<br>\nLa foto de Jimmy: $foto<br>\n";

  	?>
	<table class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<?php
				foreach ($productos[0] as $key => $value) {
					echo "<th>".ucfirst($key)."</th>"; # Inicial en mayúscula
				}
				?>
			</tr>
		</thead>
		<tbody>
			<?php
			for ($i=0; $i < count($productos); $i++) {
				echo "<tr>";
				foreach ($productos[$i] as $key => $value) {
					switch ($key) {
						case 'precio':
							echo "<td class=\"text-right\">$".number_format($value)."</td>";
							break;
						case 'precio_iva':
							echo "<td class=\"text-right\">$".number_format( $productos[$i]["precio"] + ($productos[$i]["precio"]*$productos[$i]["iva"]/100) )."</td>";
							break;
						case 'foto':
							echo "<td class=\"text-center\"><img src=\"".$value."\" alt=\"Foto\" height=\"40\" /></td>";
							break;
						default:
							echo "<td>".$value."</td>";
							break;
					}
				}
				echo "</tr>";
			}
			?>
		</tbody>
		<tfoot class="thead-dark">
			<tr>
				<?php
				foreach ($productos[0] as $key => $value) {
					echo "<th>".ucfirst($key)."</th>"; # Inicial en mayúscula
				}
				?>
			</tr>
		</tfoot>
	</table>

  </div>
  <div class="card-footer">
  	Ejemplos varios con Arrays
  </div>
</div>
</body>
</html>