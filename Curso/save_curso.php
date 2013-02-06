<?php include 'curso.class.php' ?>
<?php 
try
{

	
	$ncurso = new curso();
    $estatus = 1;
    if( $_POST['status'] != 1)
    	$estatus = 0;

    $ncurso->setProperty('curso', $_POST['curso']);
    $ncurso->setProperty('status', $estatus );
    $ncurso->setProperty('hora_inicio',  $_POST['hora_inicio']);
    $ncurso->setProperty('hora_fin',  $_POST['hora_fin']);
    $ncurso->setProperty('edad', $_POST['edad'] );
    $ncurso->setProperty('nivel', $_POST['nivel'] );
    $ncurso->setProperty('cupo_max', $_POST['cupo_max'] );
    $ncurso->setProperty('id_monitor', $_POST['selectMonitor'] );
    $ncurso->setProperty('id_asesor', $_POST['selectAsesor'] );


	if(!isset($_POST['id_curso'])){
		$ncurso->insert();
		echo json_encode(array('success'=>'true'));
	}

	else
	{
		 $ncurso->setProperty('ID', $_POST['id_curso']);
		 $ncurso->update();
		 echo json_encode(array('success'=>'true'));
		 
	}

} catch (Exception $e) {
    echo json_encode($e->getMessage()) ;
}
?>