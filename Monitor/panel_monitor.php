
<!DOCTYPE HTML>
<html >
<head>
<link href="../css/m-icons.min.css" rel="stylesheet"> 
<link href="../css/m-buttons.min.css" rel="stylesheet"> 
<link href="../css/styles.css" rel="stylesheet"> 
</head>
<body>


<?php

include "Monitor.php";
$objCliente=new Monitor();
$consulta=$objCliente->get_people();

?>


<span id="nuevo"><a href="new_monitor.php" class="m-btn"><i class="icon-plus"></i>Nuevo</a></span>
	<table>
   		<tr class="HeaderStyle">
            <th>ID </th>
    		<th>Nombre   </th>
    		<th>Apellido Paterno  </th>
    		<th>Apellido Materno  </th>
            <th>Correo  </th>
            <th>Programa Educativo </th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        
<?php
if($consulta) {
	while( $cliente = pg_fetch_array($consulta) ){
?>
	
		  <tr id="<?php echo $cliente['id_monitor'] ?>" class="GridStyle">
              <td><?php echo $cliente['id_monitor'] ?></td>
			  <td><?php echo $cliente['nombre'] ?></td>
			  <td><?php echo $cliente['apellido_paterno'] ?></td>
			  <td><?php echo $cliente['apellido_materno'] ?></td>
              <td><?php echo $cliente['correo'] ?></td>
              <td>
			  <?php if ($cliente['p_educativo'] == '0') echo 'ING TELEMATICA' ?>
              <?php if ($cliente['p_educativo'] == '1') echo 'ING INDUSTRIAL' ?>
         	  <?php if ($cliente['p_educativo'] == '2') echo 'NEGOCIOS INTERNACIONALES' ?>
              <?php if ($cliente['p_educativo'] == '3') echo 'INOVACION EMPRESARIAL' ?>
              <?php if ($cliente['p_educativo'] == '4') echo 'GASTRONOMIA' ?>
              <?php if ($cliente['p_educativo'] == '5') echo 'TURISMO' ?>
              <?php if ($cliente['p_educativo'] == '6') echo 'LOGISTICA' ?>
              <?php if ($cliente['p_educativo'] == '7') echo 'ING AMBIENTAL' ?>
              </td>
			  <td><span class="modi">
              <a href="update_monitor.php?id=<?php echo $cliente['id_monitor'] ?>"><img src="../img/database_edit.png" title="Editar" 
              	alt="Editar" />      </a></span></td>
			  <td><a onClick="EliminarDato(<?php echo $cliente['id_monitor'] ?>);
               return false" href="eliminar.php?id=<?php echo $cliente['id_monitor'] ?>"class="m-btn mini red"><i class="icon-trash"></i></a></td>
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
			url: 'new_monitor.php',
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