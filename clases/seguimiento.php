<?php 
		include("databaseA.php");
	class Seguimiento
	{
		protected static $db_tabla="sol_correctivos";
		public $idSol_correctivo;
		public $idAmbiente;
		public $idSolicitante;
		public $tarea;
		public $fecha_generada;
		public $fecha_requerida;
		public $hora_requerida;
		public $idEstado;
		public $hora_realizada;
		public $observaciones;
		public $idUsuario;
	
		//selecciona todos los usuarios
		public static function encontrar_a_todos(){
			$resultados= execSqlA("SELECT a.*,b.* FROM usuario a, datos_secundario b where a.idUsuario=b.idUsuario and a.estado=1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		
		public static function seguimiento_por_id($id){
			$resultado= execSqlA("SELECT * FROM sol_correctivos where idSol_correctivo LIKE '%$id%' and idEstado = 4");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		
		public static function lista_finalizados($id){
			$resultado= execSqlA("SELECT * FROM sol_correctivos where idSol_correctivo LIKE '%$id%' and idEstado = 3");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}

		public static function lista_todos($id){
			$resultado= execSqlA("SELECT * FROM sol_correctivos where idSol_correctivo LIKE '%$id%' ");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
	

		public function modificar_estado($id,$estado){

			$result2= updateA(self::$db_tabla, array('idEstado'), array(2) , array($estado), 'sol_movimiento', $id);

			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}
		}

		public static function encontrar_segui($id){
			$resultados= execSqlA("SELECT * FROM sol_correctivos WHERE idActivo=$id");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}

		/*public function modificar_activo($id){	
		$result2xa_valida', 'descripcion', 'idEstado_ac', 'fecha_alta', 'foto', 'idUsuario'), array(2,2,2,2,2,2,2,2,2,2,2) , array($this->idActivo, $this->nombre_ac, $this->cantidad_ac, $this->idSub_almacen, $this->fecha_caducidad, $this->garantia_valida, $this->descripcion, $this->idEstado_ac, $this->fecha_alta, $this->foto, $this->idUsuario), 'idActivo', $id);

			 if($result2){
			 	///Falta capturar el ultimo insert
				return true;

			}else{
				return false;
			}
			
		}
		*/
		
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