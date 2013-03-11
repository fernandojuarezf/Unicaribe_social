
<?php


	if(isset($_GET['id'])){
		
		require('Asesor.php');
		$objComunidad=new Asesor();
		$consulta = $objComunidad->mostrar_tabla($_GET['id']);
		$upComunidad = pg_fetch_array($consulta);
	?>
	<form id="frmUpComunidad" name="frmClienteActualizar" method="post" action="update.php" >
    	<input type="hidden" name="id_asesor" id="id_asesor" value="<?php echo $upComunidad['id_asesor']?>" />
       
      <div id="messageBox"><label id="message"/></div>  

<table >
	<tr>
		<td>
			<label>Nombre</label>
		</td>
		<td>
			<input type="text" name="nombre" required="required" value="<?php echo $upComunidad['nombre']?>">
		</td>
		
		<td>
			<label>Apellido Paterno: </label>
		</td>
		<td>
			<input type="text" name="apaterno" required="required" value="<?php echo $upComunidad['apellido_paterno']?>"> 
		</td>
	</tr>	
	
	<tr>
		
		<td>
			<label>Apellido Materno: </label> 
		</td>
		<td>
			<input type="text" name="amaterno" required="required" value="<?php echo $upComunidad['apellido_materno']?>"> 
		</td>
        <td>
			<label>Tel. de Casa: </label>
		</td>
		<td>
			<input type="text" name="tel_casa" required="required" value="<?php echo $upComunidad['tel_casa']?>">  
		</td>
	</tr>
	   
	<tr>
		
		<td>
			<label>Telefono Celular:  </label>
		</td>
		<td>
			<input type="text" name="tel_cel" required="required" value="<?php echo $upComunidad['tel_cel']?>"> 
		</td>
        	<td>
			<label>Correo electronico: </label> 
		</td>
		<td>
			<input type="text" name="correo" required="required" value="<?php echo $upComunidad['correo']?>"> 
		</td>
	</tr>

	<tr>
		<td>
			<input type="submit" name="submit" id="button" value="Enviar"  class="m-btn blue rnd" />
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