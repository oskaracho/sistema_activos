<?php 
date_default_timezone_set('America/La_Paz');
//print $datetime=date('d/m/Y H:i:s');
@session_start();
//registrar_prestamo() no se esta ausando todavia
		$fecha_actual=date("Y/m/d");
		include("../clases/activo.php");
		include("../clases/movimientos.php");
		include("../clases/ambiente.php");
		include("../clases/inventario.php");
		$opcion =$_POST['opcion'];
switch ($opcion) {
		case "registrar":
		$inven=new Inventario();
					$inven->idAmbiente=$_POST['idAmbiente'];
					$inven->fecha_ejecucion=$_POST['fecha_ejecucion'];
					$inven->idUsuario=$_SESSION['id_usu'];
					$inven->idEstado_in=1;
				    
				   
					$result2=$inven->registrar_inventario();
			    	
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
		
		case "buscar_sol_inv":
			$resultados=array();
			$c=0;
			$pres=Inventario::encontrar_a_todos();
			 foreach ($pres as $pre) {
			 	$mov=Ambiente::encontrar_ambiente($pre->idAmbiente);
			 	$resultados[$c]=array(
			 		'idInventario_am'=>$pre->idInventario_am,
			 		'idAmbiente'=>$pre->idAmbiente,
			 		'nom_am'=>$mov->nombre_am,
			 		'fecha_ejecucion'=>$pre->fecha_ejecucion,
			 		'idEstado_in'=>$pre->idEstado_in);
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