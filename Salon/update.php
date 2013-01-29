<?php include 'Salon.php' ?>
<?php 
try
{

	
	$Comunidad = new Salon();
	$Comunidad->setValues($_POST['nombre'], $_POST['apaterno'], $_POST['amaterno'], $_POST['fecha_nacimiento'],
							$_POST['tutor'], $_POST['pariente'], $_POST['edad'], $_POST['ubicacion'],$_POST['manzana'], 
							$_POST['lote'],$_POST['calle'],$_POST['num_casa'], $_POST['tel_casa'],$_POST['tel_tutor'],$_POST['tel_personal'],
							 $_POST['correo'],  $_POST['escolaridad'] , $_POST['sexo'], $_POST['observaciones']);
	
		$Comunidad->setID($_POST['cliente_id']);
		$Comunidad->actualizar();
		echo json_encode(array('success'=>'true'));

	

} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
}
?>