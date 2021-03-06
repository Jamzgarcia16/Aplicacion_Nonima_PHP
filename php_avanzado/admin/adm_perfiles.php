<h1 class="h3 mb-0 text-gray-800">ADMINISTRACION DE PERFILES </h1>
<?php
# $sql="SHOW COLUMNS FROM parametros";
# $tabla=$bd->sub_tuplas($sql);
$tabla = array(array("Field"=>"id","Id"=>"id","Attrib"=>"readonly"),array("Field"=>"nombre","Id"=>"nombre","Attrib"=>"required"));

$programa1="revisa_perfiles.php";
$programa2="consulta_perfiles.php";
$sql2="SELECT id,nombre FROM perfiles ORDER BY id ASC";
$tabla_cuerpo=$bd->sub_tuplas($sql2);
?>
<!-- DataTable -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Configuración de Perfiles</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<?php include 'encabezado_tabla.php'; ?>
				</thead>
				<tfoot>
					<?php include 'encabezado_tabla.php'; ?>
				</tfoot>
				<tbody>
					<?php include 'cuerpo_tabla.php'; ?>
				</tbody>
			</table>
			<button class="btn btn-danger" onclick="renum_row_id2()">Renumerar</button> <button class="btn btn-success" onclick="info_datatable1();">Info-dataTable</button>
		</div>
	</div>
</div>

<!-- Edit ModalForm -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formModalLabel">Formulario</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="/action_page/class-ut/prot" class="needs-validation" novalidate onsubmit="return comprobar2();">
					<?php
					foreach ($tabla as $key => $value) {
					?>
						<div class="form-group">
							<label for="<?php echo $value["Id"]; ?>"><?php echo ucfirst($value["Field"]); ?>:</label>
							<input type="text" class="form-control" id="<?php echo $value["Id"]; ?>" placeholder="<?php echo ucfirst($value["Field"]); ?>" <?php echo $value["Attrib"]; ?>>
							<div class="valid-feedback">Valido.</div>
							<div class="invalid-feedback">Por favor llene este campo.</div>
						</div>			
					<?php
					}
					?>
						<button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancelar</button>
						<button class="btn btn-primary" id="grabar" type="submit">Grabar</button>
						<input type="hidden" id="caso" value="">
						<input type="hidden" id="row_crud" value="">
					</form>
				</div>
				<div class="modal-footer">
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


function comprobar2() {
	$.ajax({
		url: "<?php echo $programa1; ?>",
		async: true,
		cache: true,
		type: 'POST',
		data: {
		<?php
		foreach ($tabla as $key => $value) {	 # Genera JavaScript
			echo $value["Id"]; ?>: $("#<?php echo $value["Id"]; ?>").val(),
		<?php } ?>
		caso: $("#caso").val()
		},
		success: function(data2) {	// Función CallBack
			alert("Data: " + data2);
			//console.log('Caso: '+$("#caso").val()+' row_crud: '+ $("#row_crud").val()+' id: '+$("#id").val());
			var Obj1 = JSON.parse(data2);
			var t = $('#dataTable').DataTable();

	        if (Obj1.mensaje.substr(0,3)=="OK." || Obj1.mensaje.substr(0,6)!="ERROR:") {
	          switch ($("#caso").val()) {
	            case 'u': // Update
	              t.row($("#row_crud").val()).data(new Array(
	              <?php
	              foreach ($tabla as $key => $value) {	 # Genera JavaScript
		              if ($key==0) {	// Primera columna
		              	$nkey = $value["Id"];
		              ?>
		              '<button class="btn btn-info btn-sm" title="Editar" data-toggle="modal" data-target="#formModal" onclick="editar('+$("#<?php echo $nkey; ?>").val()+',this.parentNode.parentNode.id);"><i class="fas fa-edit" style="font-size:12px"></i></button>',
		              $("#<?php echo $value["Id"]; ?>").val(),
		              <?php
		              } elseif ($key==count($tabla)-1) { // Ultima columna
		              ?>
		              $("#<?php echo $value["Id"]; ?>").val(),
		              '<button class="btn btn-danger btn-sm" title="Eliminar" data-toggle="modal" data-target="#formModal" onclick="eliminar('+$("#<?php echo $nkey; ?>").val()+',this.parentNode.parentNode.id);"><i class="fas fa-trash" style="font-size:12px"></i></button>'
		              <?php	
		              } else { // Columnas intermedias
		              ?>
					  $("#<?php echo $value["Id"]; ?>").val(),
		              <?php
		              }
	          	  }
	          	  ?>
	              )).draw( false );
	              break;
	            case 'd': // Delete
	              //if ($("#row_crud").val()!="") {
	              	//alert('row_crud: '+$("#row_crud").val())
	                // t.row($("#row_crud").val(), { page: 'current' }).remove().draw( true );
	                t.row($("#row_crud").val()).remove().draw( false );
	                //t.fnDeleteRow( $("#row_crud").val() );
					//$("#row-".$("#row_crud").val()).remove();
					//var xy = "#row-"+$("#row_crud").val();
					//$("#dataTable tbody").find(xy).remove(); // Error: lo remueve del DOM-HTML y no del objeto dataTable
	                // renum_row_id($("#row_crud").val());
	                // t.draw( true );
	              //}
	              break;
	            case 'c': // Create
	              t.row.add( [
	              <?php
	              foreach ($tabla as $key => $value) {	 # Genera JavaScript
		              if ($key==0) {	// Primera columna
		              	$nkey = $value["Id"];
		              ?>
	                '<button class="btn btn-info btn-sm" title="Editar" data-toggle="modal" data-target="#formModal" onclick="editar('+Obj1.<?php echo $nkey; ?>+',this.parentNode.parentNode.id);"><i class="fas fa-edit" style="font-size:12px"></i></button>',
	                Obj1.<?php echo $value["Id"]; ?>,
		              <?php
		              } elseif ($key==count($tabla)-1) { // Ultima columna
		              ?>
		            $("#<?php echo $value["Id"]; ?>").val(),
	                '<button class="btn btn-danger btn-sm" title="Eliminar" data-toggle="modal" data-target="#formModal" onclick="eliminar('+Obj1.<?php echo $nkey; ?>+',this.parentNode.parentNode.id);"><i class="fas fa-trash" style="font-size:12px"></i></button>'
		              <?php	
		              } else { // Columnas intermedias
		              ?>
					  $("#<?php echo $value["Id"]; ?>").val(),
		              <?php
		              }
	          	  }
	          	  ?>
	              ] ).draw( false );
	              // console.log( y.rows().data() );
	              break;
	          }
	          //$("#caso").val("");
			  //$("#row_crud").val("");
	      	} else {

	      	}
			alert(Obj1.mensaje);
			// $(".close").click();
			$('#formModal').modal("hide");
			
			//if (Obj1.mensaje.substr(0,3)=="OK." || Obj1.mensaje.substr(0,6)!="ERROR:") {
	          //if ($("#caso").val() == 'd') {
			  //	renum_row_id2();
			  //}
			//}
      		
    	}
	});

	if ($("#caso").val() == 'd') {
		alert('caso SI: '+$("#caso").val());
		renum_row_id2();
	} else {
		alert('caso no: '+$("#caso").val());
	}

	return false;
}

function adicionar() {
	// Adicionar un registro
	$("#formModalLabel").text("Adición de Datos");
	$("#grabar").text("Adicionar").removeClass("btn-danger").addClass("btn-primary");
	$("#caso").val("c");
	$("#row_crud").val("");
	<?php
	foreach ($tabla as $key => $value) {	 # Genera JavaScript
	  if ($key==0) {	// Primera columna
	  	?>
		$("#<?php echo $value["Id"]; ?>").val("");
		<?php
	  } else {	// Otras columnas
	  	?>
		$("#<?php echo $value["Id"]; ?>").val("").attr("readonly",false);
		<?php
	  }
	}
	?>
	console.log('Caso: '+$("#caso").val()+' row_crud: '+ $("#row_crud").val()+' id: '+$("#id").val());

}
function editar(id_ref,id_tr) {
	// Adicionar un registro
	//alert(id_tr);
	$("#"+id_tr).addClass('selected');
    yy=id_tr.split("-");  // En PHP:   explode
    //alert(yy[1]);
    $("#row_crud").val(yy[1]);
	$("#formModalLabel").text("Edición de Datos");
	$("#grabar").text("Actualizar").removeClass("btn-danger").addClass("btn-primary");
	$("#caso").val("u");

	$.post("<?php echo $programa2; ?>",
	{
		id: id_ref
	},
	function(data, status) {	// CallBack
		// alert("Data: " + data + "\nStatus: " + status);
		var Obj1 = JSON.parse(data);
		// alert(Obj1.titulo);
		<?php
		foreach ($tabla as $key => $value) {	 # Genera JavaScript
		  if ($key==0) {	// Primera columna
		  	?>
			$("#<?php echo $value["Id"]; ?>").val(Obj1.<?php echo $value["Id"]; ?>);
			<?php
		  } else {	// Otras columnas
		  	?>
			$("#<?php echo $value["Id"]; ?>").val(Obj1.<?php echo $value["Id"]; ?>).attr("readonly",false);
			<?php
		  }
		}
		?>
		console.log('Caso: '+$("#caso").val()+' row_crud: '+ $("#row_crud").val()+' id: '+$("#id").val());
	});

}
function eliminar(id_ref,id_tr) {
	//alert(id_tr);
	// Eliminar un registro
	//$("#"+id_tr).addClass('selected');
	//var t = $('#dataTable').DataTable();
	//var t = $('#dataTable').DataTable();
	//var len = t.column( 0 ).data().length;
	//alert(len);

    yy=id_tr.split("-");  // En PHP:   explode
    //alert(yy[1]);
    $("#row_crud").val(yy[1]);
	//t.row(':eq(0)', { page: 'current' }).select();
	//t.row($("#row_crud").val(), { page: 'current' }).select();
    $("#formModalLabel").text("Confirmación para eliminación del Registro");
	$("#grabar").text("Eliminar").removeClass("btn-primary").addClass("btn-danger");
	$("#caso").val("d");

	$.post("<?php echo $programa2; ?>",
	{
		id: id_ref
	},
	function(data, status) {
		// alert("Data: " + data + "\nStatus: " + status);
		var Obj1 = JSON.parse(data);
		// alert(Obj1.titulo);
		<?php
		foreach ($tabla as $key => $value) {	 # Genera JavaScript
		  if ($key==0) {	// Primera columna
		  	?>
			$("#<?php echo $value["Id"]; ?>").val(Obj1.<?php echo $value["Id"]; ?>);
			<?php
		  } else {	// Otras columnas
		  	?>
			$("#<?php echo $value["Id"]; ?>").val(Obj1.<?php echo $value["Id"]; ?>).attr("readonly",true);
			<?php
		  }
		}
		?>
		console.log('Caso: '+$("#caso").val()+' row_crud: '+ $("#row_crud").val()+' id: '+$("#id").val());

	});
}
function renum_row_id(id_row) {
	var tt = $('#dataTable').DataTable();
	var i = 0;
	var j = 0;
	var len = tt.column( 0 ).data().length;
	alert('Filas del dataTable: '+len.toString());

	for (i = parseInt(id_row); i < len; ) {
	  if ($('#row-'+i.toString())) {
	  	alert('Si exite: #row-'+i.toString()+' Valor id:');
	  } else {
	  	if (i + 1 < len ) {
	  		j = i + 1;
		  	if ($('#row-'+j.toString())) {
		  		console.log('Encontrado: row: '+j.toString());
				$('#row-'+j.toString()).attr("id", "row-"+i.toString());
				console.log('Renumerado: row: '+i.toString()+' to:'+j.toString()+' row_crud: '+ $("#row_crud").val()+' id: '+$("#id").val());
		  	}
		}
	  }
	  i++;
	}
}
function renum_row_id2() {
	var tt = $('#dataTable').DataTable();
	var i = 0; var j = 0;
	var len = tt.column( 0 ).data().length;
	var info = tt.page.info();
	var pag_actual = info.page; // Guarda la página actual
	var num_paginas = info.pages;
	var end_reg = info.end;
	var pagina = info.page;
	alert('Filas dataTable:: '+len.toString()+'  row_crud: '+$("#row_crud").val());

	// 1. Obtener el ordenamiento actual
	// 2. Cambiar al ordenamiento por el index (row.id)

	for (i = parseInt($("#row_crud").val()); i <= len; ) {
	  if (i == end_reg && pagina < num_paginas-1) {
	  	pagina += 1;
		tt.page(pagina).draw(false); // Cambia la página sin actualizar la pantalla/browser
	  }
	  if ($('#row-'+i.toString())==i) {
	  	alert('Si Existe: #row-'+i.toString()+' Valor id:'+$('#row-'+i.toString()).val());
	  } else {
	  	if (i + 1 <= len ) {
	  		j = i + 1;
		  	if ($('#row-'+j.toString())) {
		  		console.log('Encontrado: row: '+j.toString());
				$('#row-'+j.toString()).attr("id", "row-"+i.toString());
				console.log('Renumerado: row: '+j.toString()+' to:'+i.toString()+' row_crud: '+ $("#row_crud").val()+' id: '+$("#id").val());
		  	} else {
		  		console.log('NO Encontrado: row: '+j.toString());
		  	}
		}
	  }
	  i++;
	}

	// 3. reestablecer el ordenamiento que tenía antes de la renumeración de los rows-id

	tt.page(pag_actual).draw(false); // Cambia la página inicial
}
function info_datatable1() {
	var tt = $('#dataTable').DataTable();
	var i = 0;
	var j = 0;
	var len = tt.column( 0 ).data().length;
	var reg_pag = tt.page.len();
	var info = tt.page.info();
	alert('Filas dataTable:: '+len.toString()+'\nrow_crud: '+$("#row_crud").val()+'\nreg x pag: '+reg_pag+'\nNum. paginas: '+info.pages+ '\npagina actual: '+info.page+'\nrecordsTotal: '+info.recordsTotal+'\nstart: '+info.start+'\nend: '+info.end);
	tt.page(1).draw(false); // Cambia a la página 2
	// tt.column( 3, {order:'index'} ).data();
	//tt.column( 3, {order:'current'} ).data();
	// tt.rows( {order:'index', search:'applied'} ).nodes();
	//tt.rows( {order:'index'} ).nodes();
}
</script>