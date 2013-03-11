<?php
	include "../conexion.php";
	class Monitor
	{
	    private $_id;
		private $_fotografia;
		private $_nombre;
		private $_apaterno;
		private $_amaterno;
		private $_matricula;
		private $_sexo;	
		private $_p_educativo;
		private $_tel_casa;
		private $_tel_cel;
		private $_correo;

		
		
		
		// This property has no "set" method, and therefore is read-only
		public function Monitor(){}
		
 		public function setValues($value1,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10)
		{
		 $this->_nombre = $value1; 
		 #$this->_fotografia = $value2; 
		 $this->_apaterno = $value3; 
		 $this->_amaterno = $value4; 
		 $this->_matricula = $value5; 
		 $this->_sexo = $value6; 
		 $this->_p_educativo = $value7; 
		 $this->_tel_casa = $value8; 
		 $this->_tel_cel = $value9; 
		 $this->_correo = $value10; 
 

	  }
	  

		
		public function Insertar()
		{
			    $connect = new conexion();
				$conn= $connect->conectar();	
				$query = "SELECT spsetmonitor('$this->_nombre','$this->_apaterno', '$this->_amaterno', 
				'$this->_matricula', '$this->_sexo', '$this->_p_educativo','$this->_tel_casa','$this->_tel_cel','$this->_correo')";          
				$res = pg_query($conn,$query);
				if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
				} 
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
	
		function mostrar_tabla($id)
		{
				$connect = new conexion();
				$conn= $connect->conectar();	
				return  pg_query($conn, "SELECT * FROM monitor WHERE id_monitor=$id");
		}
		  
		  function actualizar($id)
		  {
			    $connect = new conexion();
				$conn= $connect->conectar();	
				$query= "SELECT spupdatemonitor('$this->_id','$this->_nombre','$this->_apaterno', '$this->_amaterno', 
				'$this->_matricula', '$this->_sexo', '$this->_p_educativo','$this->_tel_casa','$this->_tel_cel','$this->_correo')"; 
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
				return pg_query($conn, "SELECT * from monitor");

		}
		 
	}
?>

