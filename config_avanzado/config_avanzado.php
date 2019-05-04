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
define("USER_BD", "ap_nomina");

$key = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
$iv = hex2bin('34857d973953e44afb49ea9d61104d8c');
$filename = "../../../config_avanzado/clave2.enc.txt";
$handle = fopen($filename, "r");
$encstr = fread($handle, filesize($filename));
fclose($handle);
$var1 = openssl_decrypt($encstr, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
#echo "$var1";
define("CLAVE_BD", trim($var1));

define("BD", "nomina");
define("PUERTO", "3306");
define("EMPRESA", "Empleamos S.A.S.");
define("AUTOR", "Su nombre &copy;");

define("CHARSET_HTML", "utf-8");
define("CHARSET_BD", "utf8");


# Genera el token para prevenir el XSS: Cros Site Scripting
$password = str_rot13(session_id()."gg4t".date("Y-d-m h:s").session_id());
$salt = openssl_random_pseudo_bytes(rand(5, 79));
$keyLength = 128;
$iterations = 8636;
$generated_key = openssl_pbkdf2($password, $salt, $keyLength, $iterations, 'RSA-SHA256');
$token_csrf=bin2hex($generated_key);

/*
echo "<pre>";
echo "1. \$password: $password\n";
echo "2. \$salt: $salt\n";
echo "3. \$keyLength: $keyLength\n";
echo "4. \$iterations: $iterations\n";
echo "5. \$generated_key: $generated_key\n";

echo "</pre>";
*/

define("DRIVER", "mysqli.o_class.php");

session_start(); # Activa el registro de las variables en la sesión

require_once(DRIVER);
?>