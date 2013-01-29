<?php
	include '../config.php';
	class asesor
	{
	    private $_id;
		private $_nombre;
		private $_apaterno;
		private $_amaterno;
		private $_tel_casa;
		private $_tel_cel;
		private $_correo;
		
		// This property has no "set" method, and therefore is read-only
		public function asesor(){}
		
 		public function setValues($value1,$value2,$value3,$value4,$value5,$value6,$value7)//funcion para asignar valores a los campos
		{
		 $this->_id = $value1;	
		 $this->_nombre = $value2; 
		 $this->_apaterno = $value3; 
		 $this->_amaterno = $value4; 
		 $this->_tel_casa = $value5; 
		 $this->_tel_cel =  $value6;
	     $this->_correo = $value7; 
	  }
	  
	  public function setInsert($value1,$value2,$value3,$value4,$value5,$value6)//funcion para asignar valores a los campos
		{
		 $this->_nombre = $value1; 
		 $this->_apaterno = $value2; 
		 $this->_amaterno = $value3; 
		 $this->_tel_casa = $value4; 
		 $this->_tel_cel =  $value5;
	     $this->_correo = $value6; 
	  }
	  
		

	
		function select_update($id)//funcion para traer informacion del asesor al form actualizar
		{
		include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'")
			or die ("Ocurrio un error en la conexion " . pg_last_error($conn));
			
			if($conn)
			{
				return  pg_query($conn, "SELECT * FROM asesor WHERE id_asesor=$id");
			
			}
		}
		  
		  
		
		 function select_table()//funcion para llenar la tabla principal
		{
			include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if ($conn) 
			{
				return pg_query($conn, "SELECT id_asesor,nombre,apellido_paterno,apellido_materno,tel_casa,correo FROM asesor ORDER BY id_asesor");

			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		}
		
		function update()//funcion para actualizar un registro
		{
			include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if ($conn) 
			{
			$query= "select spupdateasesor('$this->_id','$this->_nombre','$this->_apaterno','$this->_amaterno','$this->_tel_casa','$this->_correo')";
			$res = pg_query($conn,$query);

				if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
					return $res;
				} 
			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		}
		
		function insert()
		{
			include "../config.php";
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'")
			or die ("Ocurrio un error en la conexion " . pg_last_error($conn)); 
			if($conn)
			{
			$query = "select spsetasesor('$this->_nombre','$this->_apaterno','$this->_amaterno','$this->_tel_casa','$this->_tel_cel','$this->_correo')";
			$res = pg_query($conn,$query);

			if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
					return $res;
				} 
			
			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		}

		 
			 
	}
?>

