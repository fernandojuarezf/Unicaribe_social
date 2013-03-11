
<?php

	if(isset($_GET['id'])){
		
		require('Monitor.php');
		$objComunidad=new Monitor();
		$consulta = $objComunidad->mostrar_tabla($_GET['id']);
		$upComunidad = pg_fetch_array($consulta);
	?>
	<form id="frmUpComunidad" name="frmClienteActualizar" method="post" action="update_monitor.php" >
    	<input type="hidden" name="id_monitor" id="id_monitor" value="<?php echo $upComunidad['id_monitor']?>" />
       
      <div id="messageBox"><label id="message"/></div>  

<table >
	<tr>
		<td>
			<label>Nombre</label>
		</td>
		<td>
			<input type="text" name="nombre"  value="<?php echo $upComunidad['nombre']?>" >
		</td>
		<td>
			<label>Fotografa</label>
		</td>
		
	</tr>	
	
	<tr>
		<td>
			<label>Apellido Paterno: </label>
		</td>
		<td>
			<input type="text" name="apaterno" required="required" value="<?php echo $upComunidad['apellido_paterno']?>" > 
		</td>
		<td>
			<label>Apellido Materno: </label> 
		</td>
		<td>
			<input type="text" name="amaterno" required="required" value="<?php echo $upComunidad['apellido_materno']?>" > 
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Matricula: </label>
		</td>
		<td>
			<input type="text" name="matricula"  required="required" value="<?php echo $upComunidad['matricula']?>"> 
		</td>
		<td>
			<label>Sexo: </label>
		</td>
		<td>
		<select class="m-wrap" name="sexo">
		<option value="1" <?php if ($upComunidad['sexo'] == '1') echo ' selected="selected"'; ?>>HOMBRE</option>
		<option value="0" <?php if ($upComunidad['sexo'] == '0') echo ' selected="selected"'; ?>>MUJER</option>
		</select>
			
	  </td>
	
	</tr>
	
	<tr>
		<td>
			<label>PROGRAMA EDUCATIVO:  </label> 
		</td>
		<td>
		<select class="m-wrap" name="p_educativo">
		<option value="0" <?php if ($upComunidad['p_educativo'] == '0') echo ' selected="selected"'; ?>>ING TELEMATICA</option>
		<option value="1" <?php if ($upComunidad['p_educativo'] == '1') echo ' selected="selected"'; ?>>ING INDUSTRIAL</option>
        <option value="2" <?php if ($upComunidad['p_educativo'] == '2') echo ' selected="selected"'; ?>>NEGOCIOS INTERNACIONALES</option>
		<option value="3" <?php if ($upComunidad['p_educativo'] == '3') echo ' selected="selected"'; ?>>INOVACION EMPRESARIAL</option>
        <option value="4" <?php if ($upComunidad['p_educativo'] == '4') echo ' selected="selected"'; ?>>GASTRONOMIA</option>
		<option value="5" <?php if ($upComunidad['p_educativo'] == '5') echo ' selected="selected"'; ?>>TURISMO</option>
        <option value="6" <?php if ($upComunidad['p_educativo'] == '6') echo ' selected="selected"'; ?>>LOGISTICA</option>
		<option value="7" <?php if ($upComunidad['p_educativo'] == '7') echo ' selected="selected"'; ?>>ING AMBIENTAL</option>
		</select>
			
	  </td>
		<td>
			<label>Tel Casa: </label> 
		</td>
		<td>
			<input type="text" name="tel_casa" required="required" value="<?php echo $upComunidad['tel_casa']?>"> 
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Tel Cel: </label>
		</td>
		<td>
			<input type="text" name="tel_cel" required="required" value="<?php echo $upComunidad['tel_cel']?>">  
		</td>
		<td>
			<label>Correo:  </label>
		</td>
		<td>
			<input type="text" name="correo" required="required" value="<?php echo $upComunidad['correo']?>"> 
		</td>
	</tr>
	
	<tr>
		<td>
			<input type="submit" name="submit" id="button" value="Enviar"  class="m-btn blue rnd"/>
		</td>
		<td>
			 <input type="button" class="m-btn red rnd" name="cancelar" id="cancelar" value="Cancelar" onClick="Cancelar()" />
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
<script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
 <script type="text/javascript">
$(document).ready(function(){

    $('#frmUpComunidad').submit( function() {

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

    $("#birth").mask("99/99/9999");

});
</script>