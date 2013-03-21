<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<style type="text/css" title="currentStyle">
	@import "../css/demo_page.css";
	@import "../css/jquery.dataTables.css";
	</style>
	<link href="../css/bootstrap.min.css" rel="stylesheet"> 
	<link href="../css/m-styles.min.css" rel="stylesheet"> 

	<link href="../css/m-icons.min.css" rel="stylesheet"> 
	<link href="../css/m-buttons.min.css" rel="stylesheet"> 


	<script type="text/javascript" language="javascript" src="../js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
	<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="../js/messages_es.js" type="text/javascript"></script>

</head>
<body>


	<?php

	include "Comunidad.php";
	$objCliente=new Comunidad;
	$consulta = null;
	if(isset($_GET['id_curso'])){
		
		$consulta=$objCliente->ObtenerComunida_Curso($_GET['id_curso']);
		}
		else{

		$consulta=$objCliente->get_people();
		}
	
	


	$pasesor= new Comunidad();
	$asesor= $pasesor->get_taller();

	?>



	<span id="nuevo"><a href="new_comunidad.php" class="m-btn"><i class="icon-plus"></i>Nuevo</a></span>
	Taller: <select name="select_taller" id="select_taller">
	<option value="">Seleccionar..</option>
	<?php foreach($asesor as $t_asesor):?>	<option value="<?php echo $t_asesor['id_curso']; ?>">
	<?php echo $t_asesor['curso']; ?>
</option>
<?php endforeach; ?>
</select>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="90%">
	<thead>
		<tr class="HeaderStyle">
			<th>ID </th>
			<th>Fotografia  </th>
			<th>Nombre   </th>
			<th>Apellido Paterno  </th>
			<th>Apellido Materno  </th>
			<th>Fecha Nacimiento  </th>
			<th>Editar</th>
			<th>Inscribir</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>

		<?php
		if($consulta) {
			while( $cliente = pg_fetch_array($consulta) ){
				?>

				<tr id="<?php echo $cliente['id_comunidad'] ?>" class="GridStyle">
					<td><?php echo $cliente['id_comunidad'] ?></td>
					<td><?php echo $cliente['fotografia'] ?></td>
					<td><?php echo $cliente['nombre'] ?></td>
					<td><?php echo $cliente['apellido_paterno'] ?></td>
					<td><?php echo $cliente['apellido_materno'] ?></td>
					<td><?php echo $cliente['fecha_nacimiento'] ?></td>
					<td><span class="modi">
						<a href="update_comunidad.php?id=<?php echo $cliente['id_comunidad'] ?>"><img src="../img/database_edit.png" title="Editar" 
							alt="Editar" />      </a></span></td>

							<td>
								<a href="inscripcion.php?id=<?php echo $cliente['id_comunidad'] ?>"><img src="../img/icon_inscribir.png" title="Inscribir" 
									alt="Inscribir" />      </a></td>

									<td>
										<a onClick="EliminarDato(<?php echo $cliente['id_comunidad'] ?>); return false" href="eliminar.php?id=
											<?php echo $cliente['id_comunidad'] ?>"  class="m-btn mini red"><i class="icon-trash"></i> </a></td>
										</tr>
										<?php
									}
								}
								?>
							</tbody>
						</table>

						<script type="text/javascript">

		$(document).ready(function(){

							$('#example').dataTable( {
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
			url: 'new_comunidad.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});

	$("#select_taller").change(function(){
     $.ajax({
			type: "GET",
			context: document.body,
			url: 'panel_comunidad.php?id_curso=' + $(this).val(),
			success: function(datos){
				$("#formulario").html("");
				$("#formulario").html(datos);

			}
		});
		return false;
	});
});

						</script>
					</body>
					</html>