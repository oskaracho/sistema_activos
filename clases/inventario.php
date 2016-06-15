<?php 

	class Inventario
	{
		protected static $db_tabla="inventario_ambiente";
		public $idInventario_am;
		public $idAmbiente;
		public $observacion;
		public $fecha_ejecucion;
		public $fecha_fin;
		public $idUsuario;
		public $idEstado_in;

		public static function encontrar_a_todos(){
			$resultados= execSqlA("SELECT * FROM inventario_ambiente ORDER BY idEstado_in ASC");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public function registrar_inventario(){
			$result2= insertA(self::$db_tabla, array( 'idAmbiente', 'fecha_ejecucion', 'idUsuario', 'idEstado_in'),array(2,2,2,2,2), array($this->idAmbiente, $this->fecha_ejecucion, $this->idUsuario, $this->idEstado_in));
			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}

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
		public static function inventario_por_id($id){
			$resultado= execSqlA("SELECT * FROM inventario_ambiente where idInventario_am=$id");
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