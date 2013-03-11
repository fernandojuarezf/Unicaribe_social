<?php include 'Monitor.php' ?>
<?php 
try
{

	
	$Monitor = new Monitor();
	$Monitor->setValues($_POST['nombre'], $_POST['apaterno'], $_POST['amaterno'],$_POST['matricula'],$_POST['sexo'],$_POST['p_educativo'],
						 $_POST['tel_casa'],$_POST['tel_cel'], $_POST['correo']);

		$Monitor->Insertar();
		echo json_encode(array('success'=>'true'));
		 
	

} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
	
}
?>