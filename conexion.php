<?php

class conexion
{
public function conexion(){}

public function conectar()
		{
			include 'config.php';
			$conexion = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if(!$conexion)
			{
				echo pg_last_error();
				return false;
			}
			return $conexion;	
		}
		
}
?>