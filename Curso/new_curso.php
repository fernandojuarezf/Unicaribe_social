<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Guardar asesor</title>
	
	<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
	<link href="../css/bootstrap.min.css" rel="stylesheet"> 
	<link href="../css/m-styles.min.css" rel="stylesheet"> 
	<link href="../css/m-buttons.min.css" rel="stylesheet"> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

	<?php

	include "curso.class.php";
	$objCurso=new Curso;
	$consulta=$objCurso->ObtenerMonitor();
	$consultaAsesor = $objCurso->ObtenerAsesor();
	?>


	<div id="messageBox"><label id="message"/></div> 
	<form class="cmxform"  id="frmNewCumunidad" name="frmClienteNuevo" method="post" action="save_curso.php" >

		<table >
			<tr>
				<td>
					<label  for="curso">Nombre:</label>
				</td>
				<td>
					<input type="text" name="curso"  class="{required:true,minLength:2}">
				</td>
				<td>
					<label>Edad:</label>
				</td>
				<td>
					<input type="text" name="edad" > 
				</td>
			</tr>	

			<tr>
				<td>
					<label>Nivel: </label>
				</td>
				<td>
					<input type="text" name="nivel" > 
				</td>
				<td>
					<label>Cupo Maximo: </label> 
				</td>
				<td>
					<input type="text" name="cupo_max" > 
				</td>
			</tr>

			<tr>
				<td>
					<label>Hora inicio: </label>
				</td>
				<td> 
					<input type="text" name="hora_inicio"  > 
				</td>
				<td>
					<label>Hora fin: </label>
				</td>
				<td>
					<input type="text" name="hora_fin" >  
				</td>
			</tr>
			<tr>
				<td>
					Monitor:
				</td>
				<td>
					<select name="selectMonitor" id="ddlMonitor">
						<option value="">--- Select ---</option>
						<?php

						while( $curso = pg_fetch_array($consulta) ){
							?>
							<option value="<?php echo $curso['id_monitor'] ?>"> <?php echo $curso[1]?> </option>

							<?php
						}
						?>
					</select>
				</td>

				<td>
					Asesor:
				</td>
				<td>
					<select name="selectAsesor" id="ddlAsesor">
						<option value="">--- Select ---</option>
						<?php

						while( $curso = pg_fetch_array($consultaAsesor) ){
							?>
							<option value="<?php echo $curso['id_asesor'] ?>"> <?php echo $curso[1]?> </option>

							<?php
						}
						?>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					<label>Observaciones:
					</label>
				</td>
				<td >
					<textarea rows="5" cols="20" name="note"  ></textarea> 
				</td>
				<td>
					<input type="checkbox" name="status" value="1"> Activo
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" id="button" value="Enviar"  class="m-btn blue rnd"/>
				</td>
				<td>
					<input type="button" class="m-btn red rnd" name="cancelar" id="cancelar" value="Cancelar" onclick="Cancelar()" />
				</td>
				<td>

				</td>
				<td>

				</td>
			</tr>
		</table>	


	</form>
	<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="../js/messages_es.js" type="text/javascript"></script>

	<script type="text/javascript">
	$(document).ready(function(){
		$("#frmNewCumunidad").validate({
			rules: {
				curso: {
					required: true,
					maxlength: 50
				},
				edad: {
					required: true,
					number: true
				},
				hora_inicio: {
					required: true
				},
				hora_fin: {
					required: true
				}
			}
		});

		$('#frmNewCumunidad').submit( function() {
			if(!$("#frmNewCumunidad").valid())
				return false;
			if($("#ddlMonitor").val() == ''){
				alert("Debe elegir un Monitor");
				return false;
			}

			if($("#ddlAsesor").val() == ''){
				alert("Debe elegir un Asesor");
				return false;
			}
			$.ajax({
				url     : $(this).attr('action'),
				type    : $(this).attr('method'),
				dataType: 'json',
				data    : $(this).serialize(),
				success : function( data ) {

					if(data.success == true)
					{
						$('#message').text('Se ha actualizado correctamente el registro'); 
						$('#messageBox').addClass('success');
						$('#messageBox').show();
					}
					else 
					{

						$('#message').html(data.responseText); 
						$('#messageBox').removeClass().addClass('error');
						$('#messageBox').show();
					}

				},
				error   : function(data){
					if(data.success == true)
					{
						$('#message').text('Se ha actualizado correctamente el registro'); 
						$('#messageBox').removeClass().addClass('success');
						$('#messageBox').show();
					}
					else{
						$('#message').html(data.responseText); 
						$('#messageBox').removeClass().addClass('error');
						$('#messageBox').show();

					}    

				}
			});

			return false;
		});

});
</script>
</body>
</html>




