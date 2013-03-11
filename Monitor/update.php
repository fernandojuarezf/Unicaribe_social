<?php include 'Asesor.php' ?>
<?php 
try
{
	$Asesor = new Asesor();
	$Asesor->setValues($_POST['nombre'], $_POST['apaterno'], $_POST['amaterno'], $_POST['tel_casa'],
							$_POST['tel_cel'], $_POST['correo']);

	
		$Asesor->setID($_POST['id_asesor']);
		$Asesor->actualizar();
		echo json_encode(array('success'=>'true'));
} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
}
?>