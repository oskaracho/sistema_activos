<?php 
		include("databaseA.php");
	class Activo
	{
		protected static $db_tabla="sol_preventivos";
		public $idSol_preventivos;
		public $idAmbiente;
		public $idActivo;
		public $tarea;
		public $fecha_generada;
		public $fecha_requerida;
		public $idSolicitante;
		public $idEstado;
		public $fecha_realizada;
		public $idUsuario;
	
			
		public static function mantenimiento_por_id($id){
			$resultado= execSqlA("SELECT * FROM sol_preventivos where idSol_preventivos LIKE '%$id%' and idUsuario=1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		
		public function registrar_mantenimiento(){
			$result2= insertA(self::$db_tabla, array('idSol_preventivos', 'idAmbiente', 'idActivo', 'tarea', 'fecha_generada', 'fecha_requerida', 'idSolicitante', 'idEstado', 'fecha_realizada', 'idUsuario'),array(2,2,2,2,2,2,2,2,2,2), array($this->idSol_preventivos, $this->idAmbiente, $this->idActivo, $this->tarea, $this->fecha_generada, $this->fecha_requerida, $this->idSolicitante, $this->idEstado, $this->fecha_realizada));
			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}

		}
		public function modificar_activo($id){	
		$result2= updateA(self::$db_tabla, array('idSol_preventivos', 'idAmbiente', 'idActivo', 'tarea', 'fecha_generada', 'fecha_requerida', 'idSolicitante', 'idEstado', 'fecha_realizada', 'idUsuario'), array(2,2,2,2,2,2,2,2,2,2) , array($this->idSol_preventivos, $this->idAmbiente, $this->idActivo, $this->tarea, $this->fecha_generada, $this->fecha_requerida, $this->idSolicitante, $this->idEstado, $this->fecha_realizada), 'idActivo', $id);

			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}
			
		}
		
		
		public static function eliminar_activo($id){
				if (updateA(self::$db_tabla,array('idUsuario'),array(2),array('1'),'idActivo',$id) ){		
					$response['resp']=0;
				}
				else
				{
					$response['resp']=0;
				}
				return $response;
		}

		public static function encontrar_activo($id){
			$resultados= execSqlA("SELECT * FROM sol_preventivos WHERE idSol_preventivos=$id limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}

		public static function instanciacion($var){
			$objeto=new self;
			foreach ($var as $atributo => $value) {
				if ($objeto-> tomar_atributos($atributo)) {
					$objeto -> $atributo = $value;
				}			
			}
			return $objeto;
		}
		private function tomar_atributos($atributo){
			$propiedades_objeto=get_object_vars($this);
			return array_key_exists($atributo, $propiedades_objeto);
		}
		
	}

 ?>