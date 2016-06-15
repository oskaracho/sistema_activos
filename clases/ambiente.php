<?php 
	class Ambiente
	{
		protected static $db_tabla="ambiente";
		public $idAmbiente;
		 public $nombre_am;
		 public $foto;
		 public $idLocal;
		 public $idActivo;
		 public $cantidad;
		 public $nombre_ac;
		
		
		public static function encontrar_ambiente($id){
			$resultados= execSqlA("SELECT * FROM ambiente WHERE idAmbiente=$id limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public static function encontrar_activos($id){
			$resultados= execSqlA("SELECT DISTINCT a.idActivo,a.cantidad,c.nombre_ac FROM ubicacion_activos a,ambiente b,activo c WHERE a.idAmbiente=b.idAmbiente and a.idAmbiente=$id ");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
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