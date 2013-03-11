<?php
	include "../conexion.php";
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
	  
	  function formatoarray($result)
		{
			$array = array();
			for($i = 0 ; $row = pg_fetch_array($result); $i++)
			{
			 $array[$i] = $row;
			}
			return $array;
		}
		
		
		public function setID($id)
		{
			$this->_id= $id;
		}
		
		public function Insertar()
		{
				$connect = new conexion();
				$conn= $connect->conectar();	
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
	
		function mostrar_tabla($id)
		{
		  		$connect = new conexion();
				$conn= $connect->conectar();
				return  pg_query($conn, "SELECT * FROM salon WHERE id_salon=$id");
		}
		  
		  function actualizar()
		  {
				$connect = new conexion();
				$conn= $connect->conectar();	
				$query= "SELECT spupdatesalon('$this->_id','$this->_salon','$this->_ubicacion', '$this->_equipamiento')"; 
				$res = pg_query($conn,$query);
				if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
				} 
		  }
		
		 function get_people()
		{
				$connect = new conexion();
				$conn= $connect->conectar();
				return pg_query($conn, "SELECT * from salon");
		}
		 
	}
?>

