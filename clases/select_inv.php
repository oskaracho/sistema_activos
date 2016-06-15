<?php
@session_start();
include("databaseA.php");
    
    $localizacion= '<option></option>';
    $result= execSqlA("select idLocal, nombre_lo from localizacion");
    while( $fila = $result->fetch_array() )
    {
        $localizacion.='<option value="'.$fila["idLocal"].'">'.$fila["nombre_lo"].'</option>';
    }


    if(isset($_POST["local"])){
        $local=$_POST["local"];
        $ambiente= '<option></option>';//Elegir Categoria
        $result = execSqlA("select idAmbiente, nombre_am from ambiente where idlocal= '".$local."'");
        while( $fila = $result->fetch_array() )
        {
            $ambiente.='<option value="'.$fila["idAmbiente"].'">'.$fila["nombre_am"].'</option>';
        }

        echo $ambiente;
        
    }
    if(isset($_POST["almacen"])){
        $local=$_POST["almacen"];
        $almacen= '<option></option>';//Elegir Categoria
        $result = execSqlA("select idAlmacen, nombre_al from almacen");
        while( $fila = $result->fetch_array() )
        {
            $almacen.='<option value="'.$fila["idAlmacen"].'">'.$fila["nombre_al"].'</option>';
        }

        echo $almacen;
        
    }
    ////////////////////////////////////
    if(isset($_POST["equipo-cre"]))
    {
        $plan = '<option value="0"> </option>';

        $result= execSqlA("select idPlanificacion, nombre from planificacion where idGrupo=".$_POST["equipo-cre"]);        

        while( $fila = $result->fetch_array() )
        {
            $plan.='<option value="'.$fila["idPlanificacion"].'">'.$fila["nombre"].'</option>';
        }

        echo $plan;
    }
    ////////////////////////////////////
    if(isset($_POST["idplan"]) && isset($_POST["equipo"]))
    {
        $plan=$_POST["idplan"];
        $equipo=$_POST["equipo"];
        $meso = '<option value="0"> </option>';//Elige un meso
        //SELECT  DATE_FORMAT(fecha_inicio_pre, '%d-%m-%Y') from planificacion where idTipo_plan=1 and idGrupo=6
        $result= execSqlA("SELECT fecha_inicio_pre from planificacion where idTipo_plan=\"".$plan."\" and idGrupo=\"".$equipo."\" ");        

        while( $fila = $result->fetch_array() )
        {
            $se=date("d-m-Y", strtotime($fila["fecha_inicio_pre"]));
            $meso.='<option value="'.$fila["fecha_inicio_pre"].'">'.$se.'</option>';
        }
        echo  $meso;
    }
    ////////////////////////////////////
    if(isset($_POST["etapas"]) && isset($_POST["plan"]))
    {
        $etapa=$_POST["etapas"];
        $plan=$_POST["plan"];
        $meso = '<option value="0"> </option>';//Elige un meso
        $result= execSqlA('select idMesociclo, ciclo from mesociclo where idPlanificacion = \''.$plan.'\' and idPlanificacion_etapa= \''.$etapa.'\'');        
        $ciclo="";
        $numeros=array("1","2","3","4","5","6","7","8","9","10","11","12","13",
            "14","15","16","17","18","19","20","21","22","23","24","25");
        $romanos = array("I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII","XIII",
            "XIV","XV","XVI","XVII","XVIII","IXX","XX","XXI","XXII","XXIII","XXIV","XXV");
        while( $fila = $result->fetch_array() )
        {
            for($i=0;$i<24;$i++){
                if($fila["ciclo"]==$numeros[$i]){$ciclo=$romanos[$i];}
            }
            $meso.='<option value="'.$fila["idMesociclo"].'">'.$ciclo.'</option>';
        }
    
        echo $meso;
    }
     ////////////////////////////////////
    if(isset($_POST["meso"]) && isset($_POST["plan"]))
    {
        $plan=$_POST["plan"];
        $meso=$_POST["meso"];
        $micro = '<option value="0"> </option>';//Elige un micro
        $result= execSqlA("select idDireccion, semana from direccion  where idMesociclo =\"".$meso."\" and idPlanificacion=\"".$plan."\" and estado = 0");    
        while( $fila = $result->fetch_array() )
        {
            $micro.='<option value="'.$fila["idDireccion"].'">'.$fila["semana"].'</option>';
        }

        echo $micro;
    }
    
    ////////////////////////////////////
     //////////////////////////////////// ver
    if(isset($_POST["microver"]))
    {
        $micro=$_POST["microver"];
        $dia = '<option value="0"> </option>';//Elige un dia
        $result= execSqlA("select a.idProgramacion, b.dia from programacion a, dia b  where a.idDireccion=\"".$micro."\" and a.idDia=b.idDia");    
        while( $fila = $result->fetch_array() )
        {
            $dia.='<option value="'.$fila["idProgramacion"].'">'.$fila["dia"].'</option>';
        }

        echo $dia;
    }
    
    ////////////////////////////////////
     ////////////////////////////////////
    if(isset($_POST["mesover"]) && isset($_POST["planver"]))
    {
        $plan=$_POST["planver"];
        $meso=$_POST["mesover"];
        $micro = '<option value="0"> </option>';//Elige un micro
        $result= execSqlA("select idDireccion, semana from direccion  where idMesociclo =\"".$meso."\" and idPlanificacion=\"".$plan."\" and estado = 1");    
        while( $fila = $result->fetch_array() )
        {
            $micro.='<option value="'.$fila["idDireccion"].'">'.$fila["semana"].'</option>';
        }

        echo $micro;
    }
    
    ////////////////////////////////////
    ////////////////////////////////////
    if(isset($_POST["idplan"]))
    {
        $plan=$_POST["idplan"];
        $result= execSqlA("select  frecuencia, tiempo_clase from planificacion where idPlanificacion = $plan");
        $fila = $result->fetch_array();
        $a=$fila["frecuencia"];
        $b=$fila["tiempo_clase"];
        $re=array($a,$b);
        echo json_encode($re);
            flush();
            
    }
   
?>
