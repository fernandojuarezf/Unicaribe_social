
<?php
	if(isset($_GET['id'])){
		
		require('Salon.php');
		$objComunidad=new Salon();
		$consulta = $objComunidad->mostrar_tabla($_GET['id']);
		$upComunidad = pg_fetch_array($consulta);
	?>
	<form id="frmUpComunidad" name="frmClienteActualizar" method="post" action="update.php" >
    	<input type="hidden" name="id_salon" id="id_salon" value="<?php echo $upComunidad['id_salon']?>" />
       
      <div id="messageBox"><label id="message"/></div>  

<table >
	<tr>
		<td>
			<label>Salon</label>
		</td>
		<td>
			<input type="text" name="salon"  value="<?php echo $upComunidad['salon']?>" >
		</td>
		<td>
		
		</td>
		<td>
			 
		</td>
	</tr>	
	
	<tr>
		<td>
			<label>Ubicacion: </label>
		</td>
		<td>
			<input type="text" name="ubicacion"  value="<?php echo $upComunidad['ubicacion']?>" /> 
		</td>
		<td>
			<label>Equipamiento: </label> 
		</td>
		<td>
			<input type="text" name="equipamiento"  value="<?php echo $upComunidad['equipamiento']?>" />
		</td>
	</tr>
	
	<tr>
		<td>
			<input type="submit" name="submit" id="button" value="Enviar"  class="m-btn blue rnd" onclick="Cancelar()" />
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