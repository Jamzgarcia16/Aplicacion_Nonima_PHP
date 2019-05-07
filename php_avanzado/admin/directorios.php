<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">

<head>
<title>PHP</title>
<meta name="language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<?php 
$directorio = dir("ficheros");

      echo "Handle: ".$directorio->handle."<br>\n";
      echo "Path: ".$directorio->path."<br>\n";
      while($fichero=$directorio->read()) {
             echo $fichero."<br />\n";
      }
      $directorio->rewind();
      echo "nuevo listado del directorio despues de rebobinar<br>" ;
      while($fichero=$directorio->read()) {
             echo $fichero."<br>";
      }
      $directorio->close();

?>
</body>
</html>