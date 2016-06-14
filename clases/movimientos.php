<?php 

	class Solicitud_movimiento
	{
		protected static $db_tabla="sol_movimiento";
		public $idSol_movimiento;
		public $idAmbiente;
		public $idActivo;
		public $cantidad;
		public $idSolicitante;
		public $fecha_generada;
		public $fecha_requerida;
		public $idEstado;
		public $fecha_realizada;
		public $idUsuario;
		public $nombre_estado;
		//selecciona todos los usuarios
		public static function encontrar_a_todos(){
			$resultados= execSqlA("SELECT * FROM sol_movimiento");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public static function mover_activo($cod_am,$cod_ac,$cant_sol){
		$result2= insertA('ubicacion_activos', array('idAmbiente','idActivo','cantidad'), array(2,2,2) , array($cod_am,$cod_ac,$cant_sol));

			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}
			
		}
		public static function solicitud_por_id($id){
			$resultado= execSqlA("SELECT * FROM sol_movimiento where idSol_movimiento=$id");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public static function modificar_estado_sol($id,$estado,$fecha,$usu){	
		$result2= updateA(self::$db_tabla, array('idEstado','fecha_realizada','idUsuario'), array(2,2,2) , array($estado,$fecha,$usu), 'idSol_movimiento', $id);

			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}
			
		}
		
		
		public static function eliminar_activo($id){
				if (updateA(self::$db_tabla,array('estado_existencia'),array(2),array('0'),'idActivo',$id) ){		
					$response['resp']=1;
				}
				else
				{
					$response['resp']=0;
				}
				return $response;
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