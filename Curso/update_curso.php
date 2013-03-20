
<?php


if(isset($_GET['id'])){

	require('curso.class.php');
	$objCurso=new Curso();
	$consulta = $objCurso->ObtenerCursoID($_GET['id']);
	$upComunidad = pg_fetch_array($consulta);		

	$consultaMonitor=$objCurso->ObtenerMonitor();
	$consultaAsesor = $objCurso->ObtenerAsesor();

	?>
	<form id="frmUpComunidad" name="frmUpComunidad" method="post" action="save_curso.php" >
		<input type="hidden" name="id_curso" value="<?php echo $upComunidad['id_curso']?>" />

		<div id="messageBox"><label id="message"/></div>  

		<table >
			<tr>
				<td>
					<label>Nombre:</label>
				</td>
				<td>
					<input type="text" name="curso"  value="<?php echo $upComunidad['curso']?>" >
				</td>
				<td>
					<label>Edad:</label>
				</td>
				<td>
					<input type="text" name="edad" value="<?php echo $upComunidad['edad']?>"> 
				</td>
			</tr>	

			<tr>
				<td>
					<label>Nivel:</label>
				</td>
				<td>
					<input type="text" name="nivel"  value="<?php echo $upComunidad['nivel']?>" /> 
				</td>
				<td>
					<label>Cupo Maximo: </label> 
				</td>
				<td>
					<input type="text" name="cupo_max"  value="<?php echo $upComunidad['cupo_max']?>" />
				</td>
			</tr>

			<tr>
				<td>
					<label>Hora Inicio: </label>
				</td>
				<td>
					<input type="text"  name="hora_inicio"  value="<?php echo date("H:i", strtotime($upComunidad['hora_inicio'])) ?>" >
				</td>
				<td>
					<label>Hora fin: </label>
				</td>
				<td>
					<input type="text" name="hora_fin"  value="<?php echo date("H:i", strtotime($upComunidad['hora_fin'])) ?>" >  
				</td>
			</tr>
			<tr>
				<td>
					Monitor:
				</td>
				<td>
					<select name="selectMonitor" id="selectMonitor">
						<option value="">--- Select ---</option>
						<?php

						while( $curso = pg_fetch_array($consultaMonitor) ){
							?>
							<option value="<?php echo $curso['id_monitor'] ?>"  <?php if($curso['id_monitor']==$upComunidad['id_monitor']){ echo "selected"; } ?>> <?php echo $curso[1]?></option>


							<?php
						}
						?>
					</select>
				</td>

				<td>
					Asesor:
				</td>
				<td>
					<select id="selectAsesor" name="selectAsesor">
						<option value="">--- Select ---</option>
						<?php

						while( $curso = pg_fetch_array($consultaAsesor) ){
							?>
							<option value="<?php echo $curso['id_asesor'] ?>" <?php if($curso['id_asesor']==$upComunidad['id_asesor']){ echo "selected"; } ?>>  <?php echo $curso[1]?> </option>

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
				<td colspan="2">
					<textarea rows="5"  name="note"  ><?php echo $upComunidad['note'] ?></textarea> 
				</td>
				<td>
					<input id="status" type="checkbox" name="status" value="non"  <?php if ($upComunidad['status'] == '1') echo 'checked'; ?>> Activo

				</td>
			</tr>

			<tr>
				<td>
					<input type="submit" name="submit" id="guardar" value="Enviar"  class="m-btn blue rnd"/>
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
	<?php
}


?>

<script type="text/javascript">
$(document).ready(function(e){
	$("#frmUpComunidad").validate({
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
			},
			note:{
				required:false,
				maxlength: 200
			},
			cupo_max:{
				required: true
			},
			nivel:{
				required: true
			}

		}
	});

	$("#status").click(function(){
		if($(this).is(':checked')) {
			$("#status").val('yes');
		}
		else{
			$("#status").val('non');
		}
	});
	$('form[name=frmUpComunidad]').submit( function() {
		// Se valida el formulario
		if(!$("#frmUpComunidad").valid())
				return false;
		// Debe elegir un monitor	
		if($('#selectMonitor').val() == ''){
			alert('Debe elegir un Monitor');
			return false;
			
		}
		//Debe elegir un asesor
		if($('#selectAsesor').val() == ''){
			alert('Debe elegir un Asesor');
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
					$('#messageBox').removeClass().addClass('success');
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