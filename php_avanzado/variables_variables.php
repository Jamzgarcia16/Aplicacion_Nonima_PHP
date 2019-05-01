<?php

echo "Variables variables<br/>";
$a = "gato";
echo "<br>$a<br>";
$$a = "Negro";  # Con $$a  se crea la variable $gato
echo "<br>$$a<br>".$$a;
echo "<hr>$a $gato<br>";


?>