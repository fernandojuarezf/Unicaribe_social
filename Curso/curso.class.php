<?php
/*
*@file
*Clase correspondiente a la tabla curso.
*
*/
	include "../conexion.php";
	class curso
	{
		//atributos
		private $_id;
		private $_curso;
		private $_status;
		private $_hora_inicio;
		private $_hora_fin;
		private $_edad;
		private $_nivel;
		private $_cupo_max;
		private $_id_asesor;
		private $_id_monitor;
		private $_conexion;
		private $_note;
		//agregate diff
		//Se agrega otra diff
		//propiedades
		//Se agrega otro otro
		public function getProperty($nombre){
			switch ($nombre) {
				case 'ID':
					return $this->_id;
					break;
			    case 'curso':
			        return $this->_curso;
			        break;
			    case 'status':
			        return $this->_status;
			        break;
			    case 'hora_inicio':
			        return $this->_hora_inicio;
			        break;
			    case 'hora_fin':
			    	return $this->_hora_fin;
			    	break;
			    case 'edad':
			    	return $this->_edad;
			    	break;
			    case 'nivel':
			    	return $this->_nivel;
			    	break;
			    case 'cupo_max':
			    	return $this->_cupo_max;
			    	break;
			    case 'id_asesor':
			    	return $this->_id_asesor;
			    	break;
			    case 'id_monitor':
			    	return $this->_id_monitor;
			    	break;
			    case 'notas':
			    	return $this->_note;
			    	break;
			}
		}

		public function setProperty($nombre,$valor){
			switch ($nombre) {
				case 'ID':
					$this->_id = $valor;					
					break;
			    case 'curso':
			         $this->_curso = $valor;
			        break;
			    case 'status':
			         $this->_status  = $valor;
			        break;
			    case 'hora_inicio':
			         $this->_hora_inicio  = $valor;
			        break;
			    case 'hora_fin':
			    	 $this->_hora_fin  = $valor;
			    	break;
			    case 'edad':
			    	 $this->_edad  = $valor;
			    	break;
			    case 'nivel':
			    	 $this->_nivel  = $valor;
			    	break;
			    case 'cupo_max':
			    	 $this->_cupo_max  = $valor;
			    	break;
			     case 'id_asesor':
			    	 $this->_id_asesor = $valor;
			    	break;
			    case 'id_monitor':
			    	 $this->_id_monitor = $valor;
			    	break;	
			    case 'notas':
			    	$this->_note = $valor;
			    	break;
			}


		}

		//constructores
		public function curso(){}

		//operaciones con la base de datos
		function update()//funcion para actualizar un registro
		{
			include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if ($conn) 
			{
			$query= "select spUpdateCurso('$this->_curso', '$this->_status','$this->_hora_inicio','$this->_hora_fin',
										'$this->_edad', '$this->_nivel', '$this->_cupo_max', '$this->_id_asesor', '$this->_id_monitor', '$this->_note'  ,'$this->_id')";
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
				
			$query= "select spsetcurso('$this->_curso', '$this->_status','$this->_hora_inicio','$this->_hora_fin',
										'$this->_edad', '$this->_nivel', '$this->_cupo_max', '$this->_id_asesor', '$this->_id_monitor' , '$this->_note')";
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

		function  ObtenerCurso()
		{

			include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if ($conn) 
			{
				return pg_query($conn, "SELECT id_curso
												,curso
												,status
												,hora_inicio
												,hora_fin
												,edad
												,nivel
												,cupo_max												
										FROM cursos
										ORDER BY curso ASC");

			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		}


		function  ObtenerCursoID($id)
		{

			include '../config.php';
			$conn = pg_connect("host='$databasehost' port='$databaseport' dbname='$databasename' user='$databaseuser' password='$databasepass'");
			if ($conn) 
			{
				return pg_query($conn, "SELECT id_curso
												,curso
												,status
												,hora_inicio
												,hora_fin
												,edad
												,nivel
												,cupo_max
												,id_monitor
												,id_asesor
												,note
										FROM cursos
										WHERE id_curso=$id");

			}
			else
			{
				echo "Conexión Erronea";
				exit;
			}
		}

		public function ObtenerMonitor()
		{
			 $connect = new conexion();
			 $conn = $connect->conectar();
			 return pg_query($conn,"select id_monitor, (nombre || ' '  || apellido_paterno || ' ' || apellido_materno)AS nameMonitor from monitor");

		}

		public function ObtenerAsesor()
		{
			 $connect = new conexion();
			 $conn = $connect->conectar();
			 return pg_query($conn,"select id_asesor, (nombre || ' '  || apellido_paterno || ' ' || apellido_materno)AS nameMonitor from asesor");

		}
	}

?>
