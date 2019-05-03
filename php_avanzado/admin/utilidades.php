<?php
# Utilidades de PHP para codificación


$hex = hex2bin("456c20637572736f2064652050485020372e3020657374c3a120484f54");
#var_dump($hex); # string(16) "example hex data"
echo "1) $hex";
echo "<hr>";
$hex = "El curso de PHP 7.0 está HOT";
$hex = bin2hex($hex);
echo "2) $hex";
echo "<hr>Claves <br>";
$clave_original="123456";
$clave_rot13 = str_rot13($clave_original);
$clave_bin = bin2hex($clave_rot13);
$clave_codificada = "313233343536";
$clave_original2 = hex2bin("313233343536");
$clave_original1 = str_rot13($clave_original2);

echo "1. \$clave_original: $clave_original<br/>";
echo "2. \$clave_rot13: $clave_rot13<br/>";
echo "3. \$clave_bin: $clave_bin<br/>";
echo "4. \$clave_codificada: $clave_codificada<br/>";
echo "5. \$clave_original2: $clave_original2<br/>";
echo "5. \$clave_original1: $clave_original1<br/>";


$binary = "11111001";
$hex = dechex(bindec($binary));
echo $hex;

$binarydata = "\x04\x00\xa0\x00";
$array = unpack("cchars/nint", $binarydata);
print_r($array);

echo "<hr>";
echo str_rot13('El curso de PHP 7.0 está HOT'); // Las siguientes no tienen decodificación
// Solo con fuerza bruta
echo md5('El curso de PHP 7.0 está HOT'); // 
echo sha1('El curso de PHP 7.0 está HOT'); // 

/* encrypting in command line console with openssl
openssl AES-256-CBC -K 5ae1b8a17bad4da4fdac796f64c16ecd -iv 34857d973953e44afb49ea9d61104d8c -in doc.txt -out doc.enc.txt

decripting in php */
$key = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
$iv = hex2bin('34857d973953e44afb49ea9d61104d8c');

# $encstr = "AU%f}2��M����[�z�T☿��
#                      E���м���Դ��	~�қ�i�BNb����";

$filename = "doc.enc.txt";
$handle = fopen($filename, "r");
$encstr = fread($handle, filesize($filename));
fclose($handle);

$output = openssl_decrypt($encstr, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

echo "<hr>$output<hr>";
?>