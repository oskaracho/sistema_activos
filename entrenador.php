<?php
		$opcion = filter_var($_POST['opcion'],FILTER_SANITIZE_STRING);
  	require_once("class_afiliado.php");

		include("databaseA.php");
  	session_start();

	switch ($opcion) {
		case "registrar_coach":
			$fecha_actual=date("d/m/Y");
			$a = filter_var($_POST['nombrecoach'],FILTER_SANITIZE_STRING);
			$b = filter_var($_POST['apellidopcoach'],FILTER_SANITIZE_STRING);
			$c = filter_var($_POST['apellidomcoach'],FILTER_SANITIZE_STRING);
			$d = filter_var($_POST['fechanaccoach'],FILTER_SANITIZE_STRING);
			$e = filter_var($_POST['carnet'],FILTER_SANITIZE_NUMBER_INT);
			$f = filter_var($_POST['telefono'],FILTER_SANITIZE_NUMBER_INT);
			$g = filter_var($_POST['mailcoach'],FILTER_SANITIZE_STRING);
			$h = filter_var($_POST['passwordcoach'],FILTER_SANITIZE_STRING);
			$i = filter_var($_POST['password2coach'],FILTER_SANITIZE_STRING);

			//insertamos nuevo registro en tabla ENTRENADOR
			if ($h == $i) 
			{
				$campos = array('idEntrenador','nombre_en', 'apellidop_en', 'apellidom_en', 'fechana_en', 'carnet_en', 'fono_en', 'correo_en', 'pass_en', 'estado_en', 'fecha_creacion');
				$valores = array(null, $a, $b, $c, $d, $e, $f, $g , $h, 1, $fecha_actual);
				$result= insertA('entrenador', $campos, array(2,2,2,2,2,2,2,2,2,2,2) , $valores);	
				if ($result){		
					$resultados=array('resp'=> 1);
				}
				else
				{
					$resultados=array('resp'=> 0);
				}
				
			}
			else
			{
				$resultados=array('resp' => 2);
			}
			echo json_encode($resultados);
			flush();
		break;
 
		case "inicio_sesion":
		  	$key = 'catolica';
			$a = filter_var($_POST['inputCi'],FILTER_SANITIZE_NUMBER_INT);
			$cad = filter_var($_POST['inputPassword'],FILTER_SANITIZE_STRING);
			$pass = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cad, MCRYPT_MODE_CBC, md5(md5($key))));
			//bucamos al usuario registrado
			$sql = "select idUsuario ,nombre, apellido from usuario where ci = '$a' and contrasena = '$pass'";
			$result= execSqlA($sql);
			$resultados=array();
			$data = mysqli_fetch_array($result);
			if($data > 0)
			{
				$resultados = array('ideu' => $data[0] ,'nom' => $data[1],'ape' => $data[2],'res'=> 1);  
				$_SESSION['id_usu'] = $data[0];
				$_SESSION['nombre'] = $data[1];
				$_SESSION['apellido'] = $data[2];
			}
			else
			{
			  	$resultados=array('res'=> 0 );	
			}
			echo json_encode($resultados);
			flush();
		break;
		case 'cierra_sesion':  			
			session_destroy();
			$resultados = array('res'=> 1);  
			echo json_encode($resultados);
  		break;

	}
	
?> 