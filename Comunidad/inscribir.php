<?php include 'Comunidad.php' ?>
<?php 
try
{
	$Comunidad = new Comunidad();
	$Comunidad->inscribir($_POST['id_comunidad'], $_POST['select_taller']);
		echo json_encode(array('success'=>'true'));
} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
}
?>