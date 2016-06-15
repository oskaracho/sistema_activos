<?php 
date_default_timezone_set('America/La_Paz');
//print $datetime=date('d/m/Y H:i:s');
@session_start();
//registrar_prestamo() no se esta ausando todavia
		$fecha_actual=date("Y/m/d");
		include("../clases/activo.php");
		include("../clases/movimientos.php");
		include("../clases/ambiente.php");
		$opcion =$_POST['opcion'];
switch ($opcion) {
		case "mover":
		$cod_ac=$_POST['cod_ac'];
		$cod_sol=$_POST['cod_sol'];
		$cant_sol=$_POST['cant'];
		$cod_am=$_POST['cod_am'];
		$activo=Activo::encontrar_activo($cod_ac);
		
		$cant=$activo->cantidad_ac;
		if($cant==0){$resultados=array('resp'=> 0); }
		else{	
			if($cant_sol>$cant){$resultados=array('resp'=> 1);}
				else{
					$cantita_total=$cant-$cant_sol;
					$mod=Activo::modificar_cantidad_activo($cod_ac,$cantita_total);
					$mover=Solicitud_movimiento::mover_activo($cod_am,$cod_ac,$cant_sol);
					$mov_estado=Solicitud_movimiento::modificar_estado_sol($cod_sol,5,$fecha_actual,$_SESSION['id_usu']);
					if ($mover){		
			
							$resultados=array('resp'=> 2);
						}
						else
						{
							$resultados=array('resp'=> 3);
						}
				}
		}
			echo json_encode($resultados);
			flush();				
	
		break;
		case "buscar_sol_mov":
			$resultados=array();
			$c=0;
			$pres=Solicitud_movimiento::encontrar_a_todos();
			 foreach ($pres as $pre) {
			 	$mov=Ambiente::encontrar_ambiente($pre->idAmbiente);
			 	$activo=Activo::encontrar_activo($pre->idActivo);
			 	$resultados[$c]=array(
			 		'idSol_movimiento'=>$pre->idSol_movimiento,
			 		'idAmbiente'=>$pre->idAmbiente,
			 		'nom_am'=>$mov->nombre_am,
			 		'idActivo'=>$pre->idActivo,
			 		'nom_ac'=>$activo->nombre_ac,
			 		'cantidad'=>$pre->cantidad,
			 		'idSolicitante'=>$pre->idSolicitante,
			 		'fecha_generada'=>$pre->fecha_generada,
			 		'fecha_requerida'=>$pre->fecha_requerida,
			 		'idEstado'=>$pre->idEstado);
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