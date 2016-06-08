<?php 
		include("databaseA.php");
		$opcion =$_POST['opcion'];
switch ($opcion) {
		case "registrar":
					$cod=$_POST['reg-codigo'];
				    $nom=$_POST['reg-nombre'];//
				    $tipo=$_POST['reg-tipo'];//
				    $desc=$_POST['reg-desc'];//  
				    $amb=$_POST['reg-ambiente'];//  
				    $alm=$_POST['reg-ambiente'];//  
				    $foto=$_FILES["abrir-ima"]["name"];
				    $ruta=$_FILES["abrir-ima"]["tmp_name"];
					$destino=filter_var("imactivos/".$foto,FILTER_SANITIZE_STRING);
					copy($ruta,$destino);  
			    	$result2= insertA('activo', array('idactivo', 'nombre', 'tipo', 'descripcion', 'foto', 'idalmacen', 'idambiente', 'estado'),array(2,2,2,2,2,2,2,2), array($cod,$nom,$tipo,$desc,$destino,$alm,$amb,1));
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
			$a = $_POST['a'];
			$result= execSqlA("select * from activo where estado=1 and idactivo LIKE '%$a%'");
			$resultados=array();
			if (mysqli_num_rows($result)  > 0) {
				$c=0;
				while($data = mysqli_fetch_array($result))
			{
					$resultados[$c]=array('idactivo'=> $data[0],'nombre'=> $data[1],'tipo'=> $data[2],'descripcion'=> $data[3],'foto'=> $data[4],'idalmacen'=> $data[5]);
					$c++;
				}	
			}
			else {
				$resultados=array(0);
			}
			echo json_encode($resultados);
			flush();


			
		break;
		case "modificar":
					$cod=$_POST['mod-codigo'];
				    $nom=$_POST['mod-nombre'];//
				    $tipo=$_POST['mod-tipo'];//
				    $desc=$_POST['mod-desc'];//  
				    $amb=$_POST['mod-amb'];//  
				    $alm=$_POST['mod-amb'];//
				    $foto=$_FILES["abrir-ima-mod"]["name"];
				    $ruta=$_FILES["abrir-ima-mod"]["tmp_name"];
					$destino=filter_var("imactivos/".$foto,FILTER_SANITIZE_STRING);
					copy($ruta,$destino); 

				    	$result2= updateA('activo', array('idactivo', 'nombre','tipo', 'descripcion', 'foto', 'idalmacen', 'idambiente', 'estado'), array(2,2,2,2,2,2,2,2) , array($cod,$nom,$tipo,$desc,$destino,$alm,$amb,1), 'idactivo', $cod);
				    	
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
			
			$idActivo = filter_var($_POST['idActivo'],FILTER_SANITIZE_NUMBER_INT);
			
			//actualiza 
			$result= updateA('activo', array('estado'), array(2) , array(0), 'idactivo', $idActivo);
			// actualiza 
			if ($result){		
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