<?php include 'Salon.php' ?>
<?php 
try
{

	
		$Comunidad = new Salon();
		$Comunidad->setValues($_POST['salon'], $_POST['ubicacion'], $_POST['equipamiento']);
		$Comunidad->Insertar();
		echo json_encode(array('success'=>'true'));
		 
	

} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
	
}
?>