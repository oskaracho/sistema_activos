<?php 
	class Usuario
	{
		public $idUsuario;
		public $ci;
		public $nombre;
		public $apellido;
		public $idTipo_usuario;
		public $contrasena;

		public static function encontrar_a_todos(){
			$resultados= execSqlA("SELECT * FROM usuario");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultados)) {
				$objeto_array[]=self::instanciacion($row);
			}
			return $objeto_array;
		}
		public static function encontrar_por_ci($ci){
			$resultado= execSqlA("SELECT * FROM usuario where ci=$ci limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);

			return !empty($objeto_array)? array_shift($objeto_array):false;
		}
		public static function encontrar_por_id($id){
			$resultado= execSqlA("SELECT * FROM usuario where idUsuario=$id limit 1");
			$objeto_array=array();
			while ($row = mysqli_fetch_array($resultado)) {
				$objeto_array[]=self::instanciacion($row);
			}
			//$encontrado=mysqli_fetch_array($objeto_array);

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