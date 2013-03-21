<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<style type="text/css" title="currentStyle">
	@import "../css/demo_page.css";
	@import "../css/jquery.dataTables.css";
	</style>
<link href="../css/m-icons.min.css" rel="stylesheet"> 
<link href="../css/m-buttons.min.css" rel="stylesheet"> 
<link href="../css/styles.css" rel="stylesheet"> 

<link href="../css/bootstrap.min.css" rel="stylesheet"> 
<link href="../css/m-styles.min.css" rel="stylesheet"> 

<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../js/messages_es.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>

</head>
<body>
</head>
<body>


<?php

include "curso.class.php";
$objCurso=new Curso;
$consulta=$objCurso->ObtenerCurso();



?>


<span id="nuevo"><a href="new_curso.php" class="m-btn"><i class="icon-plus"></i>Nuevo</a></span>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="table_curso" width="90%">
		<thead>
   		<tr class="HeaderStyle">
            <th>ID</th>
   			<th>Nombre</th>
    		<th>Edad</th>
    		<th>Nivel </th>
    		<th>Cupo Maximo</th>           
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        </thead>
        <tbody>
<?php
if($consulta) {
	while( $cliente = pg_fetch_array($consulta) ){
?>
	
		  <tr id="<?php echo $cliente['id_curso'] ?>" class="GridStyle">
              <td><?php echo $cliente['id_curso'] ?></td>
			  <td><?php echo $cliente['curso'] ?></td>
			  <td><?php echo $cliente['edad'] ?></td>
			  <td><?php echo $cliente['nivel'] ?></td>
			  <td><?php echo $cliente['cupo_max'] ?></td>			  
			  <td><span class="modi">
              <a href="update_curso.php?id=<?php echo $cliente['id_curso'] ?>"><img src="../img/database_edit.png" title="Editar" 
              	alt="Editar" />      </a></span></td>
			  <td><a onClick="EliminarDato(<?php echo $cliente['id_curso'] ?>); return false" href="eliminar.php?id=<?php echo $cliente['id_curso'] ?>"class="m-btn mini red"><i class="icon-trash"></i></a></td>
		  </tr>
	<?php
	}
}
?>
</tbody>
    </table>

    <script type="text/javascript">

$(document).ready(function(){
    //datatable
	$('#table_curso').dataTable( {
								"oLanguage": {
									"sUrl": "../js/dataTables.spanish.txt"
								}
							} );
	// mostrar formulario de actualizar datos 
	$("table tr .modi a").click(function(){
		$('#tabla').hide();
		$("#formulario").show();
		$.ajax({
			url: this.href,
			type: "GET",
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
	
	// llamar a formulario nuevo
	$("#nuevo a").click(function(){
		$("#formulario").show();
		$("#tabla").hide();
		$.ajax({
			type: "GET",
			url: 'new_curso.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
</body>
</html>