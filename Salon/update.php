<?php include 'Salon.php' ?>
<?php 
try
{

		$Salon = new Salon();
		$Salon->setValues($_POST['salon'], $_POST['ubicacion'], $_POST['equipamiento']);
		$Salon->setID($_POST['id_salon']);
		$Salon->actualizar();
		echo json_encode(array('success'=>'true'));

} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
}
?>