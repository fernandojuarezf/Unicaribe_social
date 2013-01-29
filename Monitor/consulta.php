<?php

include "Comunidad.php";
$objCliente=new Comunidad;
$consulta=$objCliente->get_people();

?>

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
			url: 'nuevo.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
<span id="nuevo"><a href="nuevo.php"><img src="../img/add.png" alt="Agregar dato" /></a></span>
	<table>
   		<tr>
            <th>ID</th>
   			<th>Fotografia</th>
    		<th>Nombre</th>
    		<th>Apellido Pa</th>
    		<th>Apellido Ma</th>
            <th>Fecha Nacimiento</th>
            <th></th>
            <th></th>
        </tr>
        
<?php
if($consulta) {
	while( $cliente = pg_fetch_array($consulta) ){
?>
	
		  <tr id="<?php echo $cliente['id_comunidad'] ?>">
              <td><?php echo $cliente['id_comunidad'] ?></td>
			  <td><?php echo $cliente['fotografia'] ?></td>
			  <td><?php echo $cliente['nombre'] ?></td>
			  <td><?php echo $cliente['apellido_paterno'] ?></td>
			  <td><?php echo $cliente['apellido_materno'] ?></td>
			  <td><?php echo $cliente['fecha_nacimiento'] ?></td>
			  <td><span class="modi">
              <a href="actualizar.php?id=<?php echo $cliente['id_comunidad'] ?>"><img src="../img/database_edit.png" title="Editar" alt="Editar" />      </a></span></td>
			  <td><span class="dele"><a onClick="EliminarDato(<?php echo $cliente['id_comunidad'] ?>); return false" href="eliminar.php?id=<?php echo $cliente['id_comunidad'] ?>"><img src="../img/delete.png" title="Eliminar" alt="Eliminar" /></a></span></td>
		  </tr>
	<?php
	}
}
?>
    </table>