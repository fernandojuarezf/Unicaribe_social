<?php
	include "../conexion.php";
	class Monitor
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
		public function Monitor(){}
		
 		public function setValues($value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10,
								  $value11,$value12,$value13,$value14,$value15,$value16,$value17,$value18,$value19,$value20,$value21)
		{
		 $this->_nombre = $value1; 
		 $this->_fotografia = $value2; 
		 $this->_apaterno = $value3; 
		 $this->_amaterno = $value4; 
		 $this->_fecha_nacimiento = $value5; 
		 $this->_tutor = $value6; 
		 $this->_pariente = $value7; 
		 $this->_edad = $value7; 
		 
		 $this->_ubicacion = $value8; 
		 $this->_calle = $value9; 
		 $this->_tel_casa = $value10; 
		 $this->_tel_tutor = $value11; 
		 $this->_tel_personal = $value12; 
		 $this->_escolaridad = $value13; 
		 $this->_sexo = $value14; 
		 $this->_observaciones = $value15; 
	     $this->_correo = $value16; 
		 $this->_direccion=$value17;
	  }
	  
		public function getName()
		{ return $this->_nombre;}
		
		public function InsertComunidad()
		{
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'")
			or die ("Ocurrio un error en la conexion " . pg_last_error($conn));
 
			if ($conn)
			{				
				$pk = -1;
				$sexo = '0';
				$query = "SELECT spSetComunidad('$pk','$this->_fotografia','$this->_nombre','$this->_apaterno', '$this->_amaterno', 
				'$this->_fecha_nacimiento','$sexo', '$this->_tutor', '$this->_pariente', '$this->_ubicacion', '$this->_calle',
				'$this->_tel_casa', '$this->_tel_personal', '$this->_tel_tutor', '$this->_correo', '$this->_escolaridad', '$this->_observaciones', '
				$this->_direccion')";          
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
				$connect = new conexion();
				$conn= $connect->conectar();	
				return  pg_query($conn, "SELECT * FROM comunidad WHERE id_comunidad=$id");
		}
		  
		  function actualizar($campos,$id)
		  {
			    $connect = new conexion();
				$conn= $connect->conectar();	
				$query= "UPDATE comunidad SET nombre=$campos[0],apellido_paterno=campos[1],apellido_materno=campos[2],fecha_nacimiento=campos[3] 
				WHERE id_comunidad=$id)"; 
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
				return pg_query($conn, "SELECT * from Monitor");

		}
		 
	}
?>

