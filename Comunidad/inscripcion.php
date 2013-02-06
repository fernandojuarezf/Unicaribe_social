<html >
<head>
<title>Inscripcion</title>
<link href="../css/bootstrap.min.css" rel="stylesheet"> 
 <link href="../css/m-styles.min.css" rel="stylesheet"> 
 <link href="../css/m-buttons.min.css" rel="stylesheet"> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php


	if(isset($_GET['id'])){
		
		require('Comunidad.php');
		$objComunidad=new Comunidad();
		$consulta = $objComunidad->mostrar_comunidad($_GET['id']);
		$upComunidad = pg_fetch_array($consulta);
	?>
    
	<form id="frmUpComunidad" name="frmInscripcion" method="post" action="inscribir.php" >
    	<input type="hidden" name="id_comunidad" id="id_comunidad" value="<?php echo $upComunidad['id_comunidad']?>" />
       
      <div id="messageBox"><label id="message"/> INSCRIPCION</div>  

   <?php
$pasesor= new Comunidad();
$asesor= $pasesor->get_taller();

?>

<table >
	<tr>
		<td>
			<label>Nombre</label>
		</td>
		<td>
			<input type="text" name="nombre"  value="<?php echo $upComunidad['nombre']?>" >
		</td>
		<td>
			<label>Fotografía</label>
		</td>
		<td>
			<input type="text" name="foto" > 
		</td>
	</tr>	
	
	<tr>
		<td>
			<label>Apellido Paterno: </label>
		</td>
		<td>
			<input type="text" name="apaterno"  value="<?php echo $upComunidad['apellido_paterno']?>" /> 
		</td>
		<td>
			<label>Apellido Materno: </label> 
		</td>
		<td>
			<input type="text" name="amaterno"  value="<?php echo $upComunidad['apellido_materno']?>" />
		</td>
	</tr>

 	<tr>
    <td>
    <label>Elige taller:</label>
    </td>
	<td>
    <select name="select_taller">
    <option value="">Seleccionar..</option>
    <?php foreach($asesor as $t_asesor):?>	<option value="<?php echo $t_asesor['id_curso']; ?>">
      <?php echo $t_asesor['curso']; ?>
     </option>
    <?php endforeach; ?>
	</select>
    </td>
    
    </tr>
	<tr>
		<td>
			<input type="submit" name="submit" id="button" value="Enviar"  class="m-btn blue rnd" onClick="Cancelar()" />
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
</body>
</html>