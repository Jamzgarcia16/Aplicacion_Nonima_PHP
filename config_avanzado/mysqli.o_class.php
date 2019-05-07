<?php
/**
 *  Clase base
 *  POO:
 *  Objeto: instancia de una clase
 *  Clase: determina las características y el comportamiento del objeto
 * 
 */
class base
{
	private $b;
	private $id_resultado;
	private $error1;
	function __construct($server=SERVIDOR_BD,$user=USER_BD,$clave=CLAVE_BD,$based=BD,$puerto=PUERTO,$tipo_coneccion="N") # Método constructor
	{
		# Inicializar las propiedades
		$this->b = null;
		$this->id_resultado = null;
		$this->error1 = "";
		$this->conectar($server,$user,$clave,$based,$puerto,$tipo_coneccion);
	}
	function conectar($server=SERVIDOR_BD,$user=USER_BD,$clave=CLAVE_BD,$based=BD,$puerto=PUERTO,$tipo_coneccion="N") {
		switch ($tipo_coneccion) {
			case 'N':	// Conexión no persistente
				$this->b = new mysqli($server,$user,$clave,$based,$puerto);
				break;
			case 'P':	// Conexión persistente
				$this->b = new mysqli("p:$server",$user,$clave,$based,$puerto);
				break;
			default:
				$this->b = new mysqli($server,$user,$clave,$based,$puerto);
				break;
		}
		if ($this->b->connect_errno) {
			# Error en Conexión a la BD
			$this->error1 = "Error: ".$this->b->connect_errno." : ".$this->b->connect_error;
		} else {
			# Conexión exitosa a la BD
			$this->b->set_charset(CHARSET_BD);
		}
	}
	
	function consulta($query) {		# Ejecuta el Query
		if (!empty($query) && $this->b) {
			if ($this->id_resultado = $this->b->query($query)) {
				# Query ejecutado Ok.
				return $this->id_resultado;
			} else {
				# Error en Query
				$this->error1 = "Error: ".$this->b->errno." : ".$this->b->error;
				return null;
			}
		} else {
			return null;
		}
	}
	function trae_fila($tipo_indice="A") { # Reclama una fila de datos
		switch ($tipo_indice) {
			case 'A':	// Tipo de indice Asociativo para el array de datos
				$fila = $this->id_resultado->fetch_array(MYSQLI_ASSOC);
				break;
			case 'N':	// Tipo de indice Numérico para el array de datos
				$fila = $this->id_resultado->fetch_array(MYSQLI_NUM);
				break;
			default:
				$fila = $this->id_resultado->fetch_array(MYSQLI_BOTH);
				break;
		}
		return $fila;
	}
	function num_filas() {
		return $this->id_resultado->num_rows;
	}
	function ultimo_id() {
		return $this->b->insert_id;
	}
	function obtener_error() {
		return $this->error1;
	}
	function liberar_resultado() {
		$this->id_resultado->free();
	}
	function cerrar_conexion() {
		$this->b->close();
	}
} // fin clase base

/**
 * clase subase
 * POO
 *  la subclase subase hereda de la clase base
 */
class subase extends base
{
	function __construct($server=SERVIDOR_BD,$user=USER_BD,$clave=CLAVE_BD,$based=BD,$puerto=PUERTO,$tipo_coneccion="N") # Método constructor
	{
		parent::__construct($server,$user,$clave,$based,$puerto,$tipo_coneccion);
	}
	function sub_fila($query) {	# Retorna una fila de datos
		if (!empty($query)) {
			if ($this->consulta($query)) {
				return($this->trae_fila());
			} else {
				return null;
			}
		} else {
			return null;
		}
	}
	function sub_tuplas($query) { # Retorna todas las filas de datos
		if (!empty($query)) {
			if ($this->consulta($query)) {
				$tabla = array();
				while ($fila = $this->trae_fila()) {
					# Agrega la fila a la tabla
					$tabla[] = $fila;
				}
				return($tabla);
			} else {
				return null;
			}
		} else {
			return null;
		}
	}
}  // Fin subclase subase

?>