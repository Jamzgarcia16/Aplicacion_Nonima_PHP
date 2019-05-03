<?php
//servidor MySql  
$C_SERVER='localhost';  
//base de datos  
$C_BASE_DATOS='nomina';  
//usuario y contraseña de la base de datos mysql  
$C_USUARIO='root';  
$C_CONTRASENA='';  
//ruta archivo de salida   
//(el nombre lo componemos con Y_m_d_H_i_s para que sea diferente en cada backup)  
$C_RUTA_ARCHIVO = 'C:/xampp/htdocs/php_avanzado/sql/backups/';
$C_FILE=date("Y_m_d_H_i_s").'.sql';
//si vamos a comprimirlo  
$C_COMPRIMIR_MYSQL='true';  

//comando
$mensaje ="Prosesando Backup 3,2,1... ";  
$command = "C:/xampp/mysql/bin/mysqldump -h".$C_SERVER." ".$C_BASE_DATOS." -u".$C_USUARIO."  >".$C_RUTA_ARCHIVO.$C_FILE; 
     #echo $command;  
	 echo "$mensaje";
   	 echo "<SCRIPT language='javascript'>alert('Backup realizado con exito.');</SCRIPT>";
     header('refresh:3 url=../index.html');
   
//ejecutamos  
system($command);  
  
//comprimimos  
if ($C_COMPRIMIR_MYSQL == 'true') {  
 system('bzip2 "'.$C_RUTA_ARCHIVO.'"');  
} 
?>
