<?php
	include "../config.php";
	class Salon
	{
	    private $_id;
		private $_salon;
		private $_ubicacion;
		private $_equipamiento;

		
	
		
		
		
		// This property has no "set" method, and therefore is read-only
		public function Salon(){}
		
 		public function setValues($value1,$value2,$value3)
		{

		 $this->_salon = $value1; 
		 $this->_ubicacion = $value2; 
		 $this->_equipamiento = $value3; 
	
	     
		 
	  }
	  
		
		
		public function setID($id)
		{
			$this->_id= $id;
		}
		
		public function InsertComunidad()
		{
			include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'")
			or die ("Ocurrio un error en la conexion " . pg_last_error($conn));
 
			if ($conn)
			{				
				$query = "SELECT spsetsalon('$this->_salon','$this->_ubicacion', '$this->_equipamiento')";          
				$res = pg_query($conn,$query);

				if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
				} 
			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		}
	
		function mostrar_comunidad($id)
		{
		    
			include "../config.php";
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'")
			or die ("Ocurrio un error en la conexion " . pg_last_error($conn));
			
			if($conn)
			{
				return  pg_query($conn, "SELECT * FROM salon WHERE id_salon=$id");
			
			}
		}
		  
		  function actualizar()
		  {
			include "../config.php";
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if ($conn) 
			{
				$query= "SELECT spupdatecomunidad('$this->_id','$this->_nombre','$this->_apaterno', '$this->_amaterno', 
				'$this->_fecha_nacimiento','$this->_sexo', '$this->_tutor', '$this->_pariente', '$this->_edad', '$this->_ubicacion', '$this->_manzana',
				'$this->_lote','$this->_calle','$this->_num_casa', '$this->_tel_casa', '$this->_tel_personal', '$this->_tel_tutor', 
				'$this->_correo', '$this->_escolaridad', '$this->_observaciones')";  
				$res = pg_query($conn,$query);

				if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
				} 
			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		  }
		
		 function get_people()
		{
			include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if ($conn) 
			{
				return pg_query($conn, "SELECT * from salon");

			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		}
		 
	}
?>

