<?php 
date_default_timezone_set('America/La_Paz');
//print $datetime=date('d/m/Y H:i:s');
@session_start();
//registrar_prestamo() no se esta ausando todavia
		$fecha_actual=date("Y/m/d");
		include("../clases/seguimiento.php");
		$opcion =$_POST['opcion'];
switch ($opcion) {
		
		case "buscar":
		$ids=$_POST['a'];
			$c=0;
			$pres=Seguimiento::seguimiento_por_id($ids);
						$resultados=array();

			 foreach ($pres as $pre) {
			 	$resultados[$c]=array(


			 		'idSol_correctivo'=>$pre->idSol_correctivo,
			 		'idAmbiente'=>$pre->idAmbiente,
			 		'idSolicitante'=>$pre->idSolicitante,
			 		'tarea'=>$pre->tarea,
			 		'fecha_generada'=>$pre->fecha_generada,
			 		'fecha_requerida'=>$pre->fecha_requerida,
			 		'hora_requerida'=>$pre->hora_requerida,
			 		'idEstado'=>$pre->idEstado,
			 		'hora_realizada'=>$pre->hora_realizada,
			 		'observaciones'=>$pre->observaciones,
					'idUsuario'=>$pre->idUsuario);

					$c++;
			 }
			echo json_encode($resultados);
			flush();
			
		break;
		case "buscar_finalizados":
		$ids=$_POST['a'];
			$c=0;
			$pres=Seguimiento::lista_finalizados($ids);
						$resultados=array();

			 foreach ($pres as $pre) {
			 	$resultados[$c]=array(


			 		'idSol_correctivo'=>$pre->idSol_correctivo,
			 		'idAmbiente'=>$pre->idAmbiente,
			 		'idSolicitante'=>$pre->idSolicitante,
			 		'tarea'=>$pre->tarea,
			 		'fecha_generada'=>$pre->fecha_generada,
			 		'fecha_requerida'=>$pre->fecha_requerida,
			 		'hora_requerida'=>$pre->hora_requerida,
			 		'idEstado'=>$pre->idEstado,
			 		'hora_realizada'=>$pre->hora_realizada,
			 		'observaciones'=>$pre->observaciones,
					'idUsuario'=>$pre->idUsuario);

					$c++;
			 }
			echo json_encode($resultados);
			flush();
			
		break;

		case "buscar_todos":
		$ids=$_POST['a'];
			$c=0;
			$pres=Seguimiento::lista_todos($ids);
						$resultados=array();

			 foreach ($pres as $pre) {
			 	$resultados[$c]=array(


			 		'idSol_correctivo'=>$pre->idSol_correctivo,
			 		'idAmbiente'=>$pre->idAmbiente,
			 		'idSolicitante'=>$pre->idSolicitante,
			 		'tarea'=>$pre->tarea,
			 		'fecha_generada'=>$pre->fecha_generada,
			 		'fecha_requerida'=>$pre->fecha_requerida,
			 		'hora_requerida'=>$pre->hora_requerida,
			 		'idEstado'=>$pre->idEstado,
			 		'hora_realizada'=>$pre->hora_realizada,
			 		'observaciones'=>$pre->observaciones,
					'idUsuario'=>$pre->idUsuario);

					$c++;
			 }
			echo json_encode($resultados);
			flush();
			
		break;




		case "mover":

		$ids=$_POST['a'];

		//$idEstado=3;
		

		$seguimiento=Seguimiento::modificar_estado($ids,3);
		
		
		//$mod=Activo::modificar_cantidad_activo($id,$estado);
					
			flush();			
		break;


		/*case "modificar":
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
		break;*/
		
	}


 ?>