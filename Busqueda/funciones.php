<?php 


	function dbConnect()
	{
		include 'config.php';
		pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'")
      or die ("Ocurrio un error en la conexion " . pg_last_error($conn));
	}
	
	function formato($result)
	{
	 	$array = array();
		for($i=0;$row=pg_fetch_assoc($result);$i++)
		{
			$array[$i]= $row;
			
		}
		return $array;
	}
	
	function getComboTaller() 
	{
	 include 'config.php';
	 $qry = "select id_curso,curso from cursos";
	 $conn =  dbConnect();
	 if(!$result = pg_query($qry))
	   {
		   echo pg_error();
		   return false;
	   }
	   $result = formato($result);
	   pg_close();
	   return $result;
	}

    function getComboEdad() 
	{
	 include 'config.php';
	 $qry = "select edad from comunidad";
	 $conn =  dbConnect();
	 if(!$result = pg_query($qry))
	   {
		   echo pg_error();
		   return false;
	   }
	   $result = formato($result);
	   pg_close();
	   return $result;
	}


	

?>
	 


