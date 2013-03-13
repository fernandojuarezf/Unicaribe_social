
<!DOCTYPE HTML>
<html >
<head>
<link href="../css/m-icons.min.css" rel="stylesheet"> 
<link href="../css/m-buttons.min.css" rel="stylesheet"> 
<link href="../css/styles.css" rel="stylesheet"> 
</head>
<body>


<?php

include "Salon.php";
$objCliente=new Salon;
$consulta=$objCliente->get_people();

?>


<span id="nuevo"><a href="new_salon.php" class="m-btn"><i class="icon-plus"></i>Nuevo</a></span>
	<table>
   		<tr class="HeaderStyle">
            <th>ID </th>
   			<th>Salon  </th>
    		<th>Ubicacion   </th>
    		<th>Equipamiento  </th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        
<?php
if($consulta) {
	while( $cliente = pg_fetch_array($consulta) ){
?>
	
		  <tr id="<?php echo $cliente['id_salon'] ?>" class="GridStyle">
              <td><?php echo $cliente['id_salon'] ?></td>
              <td><?php echo $cliente['salon'] ?></td>
			  <td><?php echo $cliente['ubicacion'] ?></td>
			  <td><?php echo $cliente['equipamiento'] ?></td>
              
			  <td><span class="modi">
              <a href="update_salon.php?id=<?php echo $cliente['id_salon'] ?>">
              <img src="../img/database_edit.png" title="Editar" 
              	alt="Editar" />      </a></span>
                </td>
                
            
                
			  <td><a onClick="EliminarDato(<?php echo $cliente['id_salon'] ?>); 
              return false" href="eliminar.php?id=<?php echo $cliente['id_salon'] ?>"class="m-btn mini red"><i class="icon-trash">
              </i> </a></td>
		  </tr>
	<?php
	}
}
?>

    </table>

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
			url: 'new_salon.php',
			success: function(datos){
				$("#formulario").html(datos);
			}
		});
		return false;
	});
});

</script>
</body>
</html>