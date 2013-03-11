<?php
	include "../conexion.php";
	class Asesor
	{
	    private $_id;
		private $_nombre;
		private $_apaterno;
		private $_amaterno;
		private $_tel_casa;
		private $_tel_cel;
		private $_correo;

			
		// This property has no "set" method, and therefore is read-only
		public function Asesor(){}
		
 		public function setValues($value2,$value3,$value4,$value5,$value6,$value7)
		{

		 $this->_nombre = $value2; 
		 $this->_apaterno = $value3; 
		 $this->_amaterno = $value4; 
		 $this->_tel_casa = $value5; 
		 $this->_tel_cel = $value6;  
		 $this->_correo = $value7; 
		 
	  }
	  
		public function setID($id)
		{
			$this->_id= $id;
		}
		
		//funcion para formatear el result
		function formatoarray($result)
		{
			$array = array();
			for($i = 0 ; $row = pg_fetch_array($result); $i++)
			{
			 $array[$i] = $row;
			}
			return $array;
		}
		
		
		
		public function Insertar()
		{
			    $connect = new conexion();
				$conn= $connect->conectar();	
				$query = "SELECT spsetasesor('$this->_nombre','$this->_apaterno', '$this->_amaterno', '$this->_tel_casa', 
											 '$this->_tel_cel', '$this->_correo')";          
				$res = pg_query($conn,$query);
				if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
				} 
		}
	
	//funcion  modelo para querys
	
		function mostrar_tabla($id)
		{
			    $connect = new conexion();
				$conn= $connect->conectar();
				$query= "SELECT * FROM asesor WHERE id_asesor=$id";
				if(!$result= pg_query($conn,$query))
				{
					echo pg_last_error($conn);
					return false;
				}
				pg_close($conn);
				return $result;
		}
		  
		  function actualizar()
		  {
				$connect = new conexion();
				$conn= $connect->conectar();
				$query= "SELECT spupdateasesor('$this->_id','$this->_nombre','$this->_apaterno', '$this->_amaterno', '$this->_tel_casa', 
											 '$this->_tel_cel', '$this->_correo')";  
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
				$query= "SELECT * from asesor order by id_asesor";
				if(!$result= pg_query($conn,$query))
				{
					echo pg_last_error($conn);
					return false;
				}
				pg_close($conn);
				return $result;	
		}
		
		 
	}
?>

