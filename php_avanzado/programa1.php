<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Revisión conceptos básicos en PHP</title>
</head>
<body style="background-color: #80ffd4;">
<div style="text-align: center;"><h1>Revisión conceptos básicos en PHP</h1></div>
<hr>
<span>Hola Mundo</span>
<!-- Comentarios en HTML -->
<hr>
<?php
// Comentarios de una línea
/*
	El código fuente en PHP, reside y se ejecuta en el servidor (Back-end)
	Solamente lo que se imprime con echo o print, es enviado por la salida estandar al browser. Estos datos deben ser enviados en formato HTML ya que es el Browser quien lo recibirá y los ejecutará.
*/
echo "Hola ahora desde<br> PHP.\n";
echo "Hoy es el último Jueves de marzo<br>\n";
print "y también es la\n última clase de la semana\n";
/*
	Secuencias de Escape: Son reconocidas solo entre comillas dobles
		\n 			Salto de línea
		\r 			Retorno de carro
		\t 			Tabulador
	En Archivos de texto salto de línea 		Plataforma
								\n 				Linux - Unix
								\r 				MAC
								\r\n 			Windows
*/
echo 'Y ¿que pasa con las secuencias de escape\n entre comillas simples?'; # Entre comillas simples no se reconocen las secuencias de escape
echo "\n<br>Hoy es jueves"." y es 28"," de marzo"; # el punto y la coma son caracteres de concatenación
echo "\n<br>El salario del programador avanzado en PHP debería estar: $" .(15000000);
echo "\n<br>El salario del programador avanzado en PHP debería estar: $" .number_format(15000000, 2);

# Soporte de distinción de mayúsculas y minúsculas: case sensitive
$a = 28;
$A = "veintiocho";

echo "\n<br>1. El valor de $a = $a y el de $A = $A";
echo '\n<br>2. El valor de $a = $a y el de $A = $A';
echo '\n<br>3. El valor de $a'." = $a y el de ".'$A'." = $A";
echo "\n<br>4. El valor de \$a = $a y el de \$A = $A";

$a = "El texto";
echo "\n<br>1. El valor de $a = $a\n<br>";

$a = 37;
if ($a == "37") { # con == hacemos una comparación exacta, comprueba el contenido pero ignora el tipo de dato
	# Acciones del camino cuando la condición es verdadera
	echo "La expresión \$a == \"37\" es Verdad: ".($a == "37");
} else {
	# Acciones del camino cuando la condición es falsa
	echo "La expresión \$a == \"37\" es Falsa: ".($a == "37");
}

if ($a === "37") { # con === hacemos una comparación estricta, comprueba el contenido y el tipo de dato en los operandos
	# Acciones del camino cuando la condición es verdadera
	echo "<br>La expresión \$a === \"37\" es Verdad: ".($a === "37");
} else {
	# Acciones del camino cuando la condición es falsa
	echo "<br>La expresión \$a === \"37\" es Falsa: ".($a === "37");
}



?>
<hr>
</body>
</html>