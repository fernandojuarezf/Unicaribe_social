<?php

include "asesor.class.php";
$objCliente=new asesor();
$consulta=$objCliente->select_table();

?>
<link href="../css/m-icons.min.css" rel="stylesheet"> 
<link href="../css/m-buttons.min.css" rel="stylesheet"> 
<link href="../css/styles.css" rel="stylesheet"> 
<script type="text/javascript">

$(document).ready(function(){
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
			url: 'asesor_form.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
	

});


</script>
<span id="nuevo"><a href="asesor_form.php" class="m-btn"><i class="icon-plus"></i>Nuevo</a></span>
	<table>
   		<tr class="HeaderStyle">
            <th>ID </th>
   			<th>Nombre                  </th>
    		<th>Apellido Paterno  </th>
    		<th>Apellieo Materno  </th>
            <th>Tel Casa  </th>
    		<th>Correo  </th>
            <th></th>
            <th></th>
        </tr>
        
<?php
if($consulta) {
	while( $cliente = pg_fetch_array($consulta) ){
?>
	
		  <tr class="GridStyle" id="<?php echo $cliente['id_asesor'] ?>">
              <td><?php echo $cliente['id_asesor'] ?></td>
			  <td><?php echo $cliente['nombre'] ?></td>
			  <td><?php echo $cliente['apellido_paterno'] ?></td>
			  <td><?php echo $cliente['apellido_materno'] ?></td>
              <td><?php echo $cliente['tel_casa'] ?></td>
			  <td><?php echo $cliente['correo'] ?></td>
			  <td><span class="modi">
              <a href="actualizar_form.php?id=<?php echo $cliente['id_asesor'] ?>">
              <img src="../img/database_edit.png" title="Editar" alt="Editar" />   
              </a></span>
              </td>
			  <td><span class="dele">
              <a onClick="EliminarDato(<?php echo $cliente['id_asesor'] ?>); 
              return false" href="eliminar.php?id=<?php echo $cliente['id_asesor'] ?>"class="m-btn mini red"><i class="icon-trash"></i> Eliminar</a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>