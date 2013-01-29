<?php
	include "../conexion.php";
	class Comunidad
	{
	    private $_id;
		private $_fotografia;
		private $_nombre;
		private $_apaterno;
		private $_amaterno;
		private $_fecha_nacimiento;
		private $_sexo;
		private $_tutor;
		private $_pariente;
		private $_edad;
		
		private $_ubicacion;
		private $_manzana;
		private $_lote;
		private $_calle;
		private $_num_casa;
		
		private $_tel_casa;
		private $_tel_personal;
		private $_tel_tutor;
		private $_correo;
		private $_escolaridad;
		private $_observaciones;
		
		
		
		// This property has no "set" method, and therefore is read-only
		public function Comunidad(){}
		
 		public function setValues($value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10,
								  $value11,$value12,$value13,$value14,$value15,$value16,$value17,$value18,$value19,$value20)
		{

		 $this->_nombre = $value2; 
		 $this->_apaterno = $value3; 
		 $this->_amaterno = $value4; 
		 $this->_fecha_nacimiento = $value5; 
		 $this->_tutor = $value6; 
		 $this->_pariente = $value7; 
		 $this->_edad = $value8; 
		 
		 $this->_ubicacion = $value9; 
		 $this->_manzana = $value10;
		 $this->_lote = $value11;
		 $this->_calle = $value12; 
		 $this->_num_casa = $value13;
		 $this->_tel_casa = $value14; 
		 $this->_tel_tutor = $value15; 
		 $this->_tel_personal = $value16; 
		 
		 $this->_correo = $value17; 
		 $this->_escolaridad = $value18; 
		 $this->_sexo = $value19; 
		 $this->_observaciones = $value20; 
	     
		 
	  }
	  
		public function getName()
		{ return $this->_nombre;}
		
		public function setID($id)
		{
			$this->_id= $id;
		}
		
		
		
		public function InsertComunidad()
		{
			    $connect = new conexion();
				$conn= $connect->conectar();	
				$query = "SELECT spSetComunidad('$this->_nombre','$this->_apaterno', '$this->_amaterno', 
				'$this->_fecha_nacimiento', '$this->_tutor', '$this->_pariente','$this->_edad', '$this->_ubicacion', '$this->_manzana',
				'$this->_lote','$this->_calle','$this->_num_casa', '$this->_tel_casa', '$this->_tel_personal', '$this->_tel_tutor', 
				'$this->_correo', '$this->_escolaridad', '$this->_sexo','$this->_observaciones')";          
				$res = pg_query($conn,$query);
				if (!$res) 
				{ 
					pg_query($conn, "ROLLBACK"); 
				} else 
				{ 
					pg_query($conn, "COMMIT"); 	
				} 
		}
	
		function mostrar_comunidad($id)
		{
			    $connect = new conexion();
				$conn= $connect->conectar();
				return  pg_query($conn, "SELECT * FROM comunidad WHERE id_comunidad=$id");
		}
		  
		  function actualizar()
		  {
				$connect = new conexion();
				$conn= $connect->conectar();
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
		
		function get_people()
		{
				$connect = new conexion();
				$conn= $connect->conectar();
				return pg_query($conn, "SELECT * from comunidad");	
		}
		 
	}
?>

