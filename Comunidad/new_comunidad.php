<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Nuevo</title>

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
			<label>Fotografa</label>
		</td>
		<td>
			
		</td>  
	</tr>	
	
	<tr>
		<td>
			<label>Apellido Paterno: </label>
		</td>
		<td>
			<input type="text" name="apaterno"> 
		</td>
		<td>
			<label>Apellido Paterno: </label> 
		</td>
		<td>
			<input type="text" name="amaterno" > 
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Fecha de Nacimiento: </label>
		</td>
		<td>
			<input type="text" name="fnacimiento"  > 
		</td>
		<td>
			<label>Tutor: </label>
		</td>
		<td>
			<input type="text" name="tutor" >  
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Pariente:  </label> 
		</td>
		<td>
			<input type="text" name="pariente" >
		</td>
        
        
        
		<td>
			<label>Edad: </label> 
		</td>
		<td>
			<input type="text" name="edad"> 
		</td>
	</tr>
	
    <tr>
		<td>
			<label>Ubicacion: </label>
		</td>
		<td><input type="text" name="ubicacion" ></td>

	</tr>
    
    
	<tr>
		<td>
			<label>Manzana: </label>
		</td>
		<td><input type="text" name="manzana" ></td>
		<td>
			<label>Lote:  </label>
		</td>
		<td>
			<input type="text" name="lote" > 
		</td>
	</tr>
    
	<tr>
		<td>
			<label>Calle: </label>
		</td>
		<td>
			<input type="text" name="calle" > 
		</td>
		<td>
			<label>No. de Casa: </label>
		</td>
		<td>
			<input type="text" name="num_casa" > 
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Tel. de Casa: </label>
		</td>
		<td>
			<input type="text" name="tel_casa" >  
		</td>
		<td>
			<label>Telefono particular:  </label>
		</td>
		<td>
			<input type="text" name="tel_personal" > 
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Telefono tutor:  </label> 
		</td>
		<td>
			<input type="text" name="tel_tutor" >
		</td>
		<td>
			<label>Correo electronico: </label> 
		</td>
		<td>
			<input type="text" name="correo" > 
		</td>
	</tr>
	
	<tr>
		<td>
			<label>Escolaridad: </label>
		</td>
		<td>
			<input type="text" name="escolaridad" >  
		</td>
		<td>
			<label>Sexo: </label>
		</td>
		<td>
		<select class="m-wrap" name="sexo">
		<option value="0">Mujer</option>
		<option value="1">Hombre</option>
		</select>
			
		</td>
	</tr>
	<tr>
		<td>
			 <label>Observaciones:
		  </label>
		</td>
		<td colspan="3">
			<textarea rows="5" cols="20" name="observaciones"  ></textarea> 
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
    //Validación

	$("#frmNewCumunidad").validate({
			rules: {
				nombre: {
					required: true,
					maxlength: 50
				},
				apaterno:{
					required:true
				},
				amaterno:{
					required:true
				},
				fnacimiento: {
					required: true
				},
				tutor: {
					required: true
				},
				ubicacion: {
					required: true
				},
				lote:{
					required: true
				},
				manzana:{
					required: true
				},
				lote:{
					required:true
				},
				tel_casa:{
					required:true
				},
				tel_tutor:{
					required:true
				},
				correo:{
					email:true
				},	
				edad:{
					required:true
				},			
				num_casa:{
					required:true
				},
				fecha_nacimiento:{
					required:true
				},				
				note:{
					required:false,
					maxlength: 200
				}				

			}
		});

    $('#frmNewCumunidad').submit( function() {
    	if(!$("#frmNewCumunidad").valid())
				return false;
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




