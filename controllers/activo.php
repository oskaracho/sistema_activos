<?php 
date_default_timezone_set('America/La_Paz');
//print $datetime=date('d/m/Y H:i:s');
@session_start();
//registrar_prestamo() no se esta ausando todavia
		$fecha_actual=date("Y/m/d");
		include("../clases/activo.php");
		$opcion =$_POST['opcion'];
switch ($opcion) {
		case "registrar":
		$activo=new Activo();
					$activo->idActivo=$_POST['reg-codigo'];
				    $activo->nombre_ac=$_POST['reg-nombre'];//
				    $activo->cantidad_ac=$_POST['reg-cantidad'];//
				    $activo->idSub_almacen=$_POST['reg-almacen'];//  
				    $activo->fecha_caducidad=$_POST['fecha-ca-reg'];//  
				    $activo->garantia_valida=$_POST['fecha-ga-reg'];//
				    $activo->descripcion=$_POST['reg-desc'];// 
				    $activo->idEstado_ac=$_POST['reg-estado'];//
				    $activo->fecha_alta=$fecha_actual;// 
				    $foto=$_FILES["abrir-ima"]["name"];
				    $ruta=$_FILES["abrir-ima"]["tmp_name"];
					$activo->foto=filter_var("imactivos/".$foto,FILTER_SANITIZE_STRING);
					$destino=filter_var("../imactivos/".$foto,FILTER_SANITIZE_STRING);
					copy($ruta,$destino);
					$activo->idUsuario=$_SESSION['id_usu'];
					$activo->estado_existencia=1;
					$result2=$activo->registrar_activo();
			    	
			if ($result2){		
	
					$resultados=array('resp'=> 1);
				}
				else
				{
					$resultados=array('resp'=> 0);
				}
			echo json_encode($resultados);
			flush();				
		break;
		case "buscar":
		$ids=$_POST['a'];
			$resultados=array();
			$c=0;
			$pres=Activo::activos_por_id($ids);
			 foreach ($pres as $pre) {
			 	$resultados[$c]=array(
			 		'idActivo'=>$pre->idActivo,
			 		'nombre_ac'=>$pre->nombre_ac,
			 		'cantidad_ac'=>$pre->cantidad_ac,
			 		'idSub_almacen'=>$pre->idSub_almacen,
			 		'fecha_caducidad'=>$pre->fecha_caducidad,
			 		'garantia_valida'=>$pre->garantia_valida,
			 		'descripcion'=>$pre->descripcion,
			 		'idEstado_ac'=>$pre->idEstado_ac,
			 		'foto'=>$pre->foto);
					$c++;
			 }
			echo json_encode($resultados);
			flush();
			
		break;
		case "modificar":
		$activo_mod=new Activo();
					$activo_mod->idActivo=$_POST['mod-codigo'];
				    $activo_mod->nombre_ac=$_POST['mod-nombre'];//
				    $activo_mod->cantidad_ac=$_POST['mod-cantidad'];//
				    $activo_mod->idSub_almacen=$_POST['mod-almacen'];//  
				    $activo_mod->fecha_caducidad=$_POST['fecha-ca-mod'];//  
				    $activo_mod->garantia_valida=$_POST['fecha-ga-mod'];//
				    $activo_mod->descripcion=$_POST['mod-desc'];// 
				    $activo_mod->idEstado_ac=$_POST['mod-estado'];//
				    $activo_mod->fecha_alta=$fecha_actual;// 
				    $foto=$_FILES["abrir-ima-mod"]["name"];
				    $ruta=$_FILES["abrir-ima-mod"]["tmp_name"];
					$activo_mod->foto=filter_var("imactivos/".$foto,FILTER_SANITIZE_STRING);
					$destino=filter_var("../imactivos/".$foto,FILTER_SANITIZE_STRING);
					copy($ruta,$destino);
					$activo_mod->idUsuario=$_SESSION['id_usu'];
					$result2=$activo_mod->modificar_activo($_POST['mod-codigo']);
					
				    	
									if ($result2){		
										$resultados=array('resp'=> 1);
									}
									else
									{
										$resultados=array('resp'=> 0);
									}
				   
				   

			
			echo json_encode($resultados);
			flush();
		break;
		case "eliminar":

			$activo_eli=new Activo;
			$res=$activo_eli->eliminar_activo($_POST['idActivo']);

			if ($res){		
				$resultados=array('resp'=> 1);
			}
			else
			{
				$resultados=array('resp'=> 0);
			}
			echo json_encode($resultados);
			flush();


			
		break;
	}


 ?>