<?php 
		include("databaseA.php");
	class Activo
	{
		protected static $db_tabla="activo";
		public $idActivo;
		public $nombre_ac;
		public $cantidad_ac;
		public $idSub_almacen;
		public $fecha_caducidad;
		public $garantia_valida;
		public $descripcion;
		public $idEstado_ac;
		public $fecha_alta;
		public $foto;
		public $idUsuario;
		public $estado_existencia;
		
		//selecciona todos los usuarios
		public static function encontrar_a_todos(){
			$resultados= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where a.idUsuario=b.idUsuario and a.estado=1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public static function encontrar_nombre_id($ids){
			$resultados= execSqlA("SELECT nombre_ac FROM activo WHERE idActivo=$ids");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public static function activos_por_id($id){
			$resultado= execSqlA("SELECT * FROM activo where idActivo LIKE '%$id%' and estado_existencia=1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		
		public function registrar_activo(){
			$result2= insertA(self::$db_tabla, array('idActivo', 'nombre_ac', 'cantidad_ac', 'idSub_almacen', 'fecha_caducidad', 'garantia_valida', 'descripcion', 'idEstado_ac', 'fecha_alta', 'foto', 'idUsuario','estado_existencia'),array(2,2,2,2,2,2,2,2,2,2,2,2), array($this->idActivo, $this->nombre_ac, $this->cantidad_ac, $this->idSub_almacen, $this->fecha_caducidad, $this->garantia_valida, $this->descripcion, $this->idEstado_ac, $this->fecha_alta, $this->foto, $this->idUsuario, $this->estado_existencia));
			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}

		}
		public function modificar_activo($id){	
		$result2= updateA(self::$db_tabla, array('idActivo', 'nombre_ac', 'cantidad_ac', 'idSub_almacen', 'fecha_caducidad', 'garantia_valida', 'descripcion', 'idEstado_ac', 'fecha_alta', 'foto', 'idUsuario'), array(2,2,2,2,2,2,2,2,2,2,2) , array($this->idActivo, $this->nombre_ac, $this->cantidad_ac, $this->idSub_almacen, $this->fecha_caducidad, $this->garantia_valida, $this->descripcion, $this->idEstado_ac, $this->fecha_alta, $this->foto, $this->idUsuario), 'idActivo', $id);

			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}
			
		}
		public function modificar_cantidad_activo($id,$cant){
		$result2= updateA(self::$db_tabla, array('cantidad_ac'), array(2) , array($cant), 'idActivo', $id);

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

		public static function encontrar_activo($id){
			$resultados= execSqlA("SELECT * FROM activo WHERE idActivo=$id limit 1");
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