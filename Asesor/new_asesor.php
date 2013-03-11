
<!DOCTYPE HTML>
<html >
<head>
<title> </title>
<link href="../css/bootstrap.min.css" rel="stylesheet"> 
 <link href="../css/m-styles.min.css" rel="stylesheet"> 
 <link href="../css/m-buttons.min.css" rel="stylesheet"> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	 <div id="messageBox"><label id="message"/></div> 
<form id="frmNewCumunidad" name="frmClienteNuevo" method="post" action="insert.php" >
 	
  <table >
	<tr>
		<td>
			<label>Nombre</label>
		</td>
		<td>
			<input type="text" name="nombre" required="required">
		</td>
		
		<td>
			<label>Apellido Paterno: </label>
		</td>
		<td>
			<input type="text" name="apaterno" required="required"> 
		</td>
	</tr>	
	
	<tr>
		
		<td>
			<label>Apellido Materno: </label> 
		</td>
		<td>
			<input type="text" name="amaterno" required="required"> 
		</td>
        <td>
			<label>Tel. de Casa: </label>
		</td>
		<td>
			<input type="text" name="tel_casa" required="required">  
		</td>
	</tr>
	   
	<tr>
		
		<td>
			<label>Telefono Celular:  </label>
		</td>
		<td>
			<input type="text" name="tel_cel" required="required"> 
		</td>
        	<td>
			<label>Correo electronico: </label> 
		</td>
		<td>
			<input type="text" name="correo" required="required"> 
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

<script type="text/javascript">
$(document).ready(function(){

    $('#frmNewCumunidad').submit( function() {

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




