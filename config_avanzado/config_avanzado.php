<?php
/*
	Parámentros de configuración
	Aplicación: NOMINA
	Fecha: Abril 4 de 2019
	Autor: Su nombre
*/
define("APLICACION", "NOMINA");
define("VERSION", "1.0");
define("SERVIDOR_BD", "localhost");
define("USER_BD", "root");
define("CLAVE_BD", "");
define("BD", "nomina");
define("PUERTO", "3306");
define("EMPRESA", "Empleamos S.A.S.");
define("AUTOR", "Su nombre &copy;");

define("CHARSET_HTML", "utf-8");
define("CHARSET_BD", "utf8");

define("DRIVER", "mysqli.o_class.php");

session_start(); # Activa el registro de las variables en la sesión

require_once(DRIVER);
?>