<?php 
date_default_timezone_set('America/La_Paz');
//print $datetime=date('d/m/Y H:i:s');
@session_start();
//registrar_prestamo() no se esta ausando todavia
		$fecha_actual=date("Y/m/d");
		include("../clases/mantenimiento.php");
		$opcion =$_POST['opcion'];
switch ($opcion) {
		case "registrar":
		$activo=new Activo();
					$activo->idSol_preventivo=$_POST['reg-codigo'];
				    $activo->idAmbiente=$_POST['reg-ambiente'];//
				    $activo->idActivo=$_POST['reg-tman'];//
				    $activo->tarea=$_POST['reg-desc'];//  
				    $activo->fecha_generada=$_POST['fecha-sol'];//  
				    $activo->fecha_requerida=$_POST['fecha-req'];//
				    $activo->idSolicitante=$_POST['reg-nomsol'];// 
				    $activo->idEstado=$_POST['reg-estado'];//
				    				    			    				
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
			 		'idSol_preventivo'=>$pre->idSol_preventivo,
			 		'idAmbiente'=>$pre->idAmbiente,
			 		'idActivo'=>$pre->idActivo,
			 		'tarea'=>$pre->tarea,
			 		'fecha_generada'=>$pre->fecha_generada,
			 		'fecha_requerida'=>$pre->fecha_requerida,
			 		'idSolicitante'=>$pre->idSolicitante,
			 		'idEstado'=>$pre->idEstado,
					$c++;
			 }
			echo json_encode($resultados);
			flush();
			
		break;
		case "modificar":
		$activo_mod=new Activo();
					
					$activo->idSol_preventivo=$_POST['reg-codigo'];
				    $activo->idAmbiente=$_POST['reg-ambiente'];//
				    $activo->idActivo=$_POST['reg-tman'];//
				    $activo->tarea=$_POST['reg-desc'];//  
				    $activo->fecha_generada=$_POST['fecha-sol'];//  
				    $activo->fecha_requerida=$_POST['fecha-req'];//
				    $activo->idSolicitante=$_POST['reg-nomsol'];// 
				    $activo->idEstado=$_POST['reg-estado'];//
				    
				    					
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