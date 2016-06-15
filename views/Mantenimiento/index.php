<?php
@session_start();
  if (isset($_SESSION['id_usu']))
  {
  
  }
  else
  {
    header('Location: /sistema_activos/index.php');  
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/sistema_activos/bootstrap-3.3.6-dist/css/bootstrap.css">
    <script src="/sistema_activos/bootstrap-3.3.6-dist/jquery.js"></script>
    <script src="/sistema_activos/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <script type="text/javascript">
    	$(document).ready(function() {

    		$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})

    	})
     
    </script>
</head>
<body>
<!--  llamada a la cabecera -->
	<?php 
	//	require_once ("../../sistema_activos/cabecera1.php");
 	?>
 	<?php 
    require_once ("../../../sistema_activos/barramenusr.php");
  ?>

<!-- Contenedor Pestaña ABM maatenimiento -->
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Mantenimiento</div>
  <div class="panel-body">


<!-- Pestaña ABM para mantenimiento -->

<ul class="nav nav-tabs" role="tablist">
 <li class="active"><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-fouth">Programados</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-first">Registrar</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-second">Modificar</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-third">Mantenimiento Realizado</a></li>
</ul>
<!-- Contenido Pestaña Registrar -->
<div class="tab-content">

<!-- Contenido Pestaña registrar mantenimiento-->

 <div class="tab-pane fade in" id="tabs-first">
  
<!-- FORM CREAR Activo -->
<h4 align="center">Registrar Mantenimiento</h4>


  <form class="form-horizontal" id="formRegistro" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Ambiente</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-ambiente" name="reg-ambiente" >
        <option></option>
        <option value="1">Habitacion </option>
        <option value="2">Salon</option>
        <option value="3">Piscina</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Tipo de Mantenimiento</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-tman" name="reg-tman" >
        <option></option>
        <option value="1">Preventivo </option>
        <option value="2">Especifico</option>
      </select>
    </div>
  </div>
    <div class="form-group" >
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="reg-codigo" name="reg-codigo" placeholder="Codigo " onkeypress="return soloNumeros(event)" >
      </div>
      
    </div>

    
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre del solicitante</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="reg-nomsol" name="reg-nomsol" placeholder="Nombre" onkeypress="return soloLetras(event)" >
      </div>
    </div>
  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Solicitada</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-sol" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div>              
  </div>
  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Requerida</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-req" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div>              
  </div>
<div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion:</label>
      <div class="col-sm-7">
      <textarea class="form-control" rows="4" type="text" class="form-control" id="reg-desc" name="reg-desc" placeholder="Descripcion del activo" required ></textarea>      
      </div>
  </div>
<div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Estado General</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-estado" name="reg-estado" >
        <option></option>
        <option value="1">Buen Estado </option>
        <option value="2">Moderado</option>
      </select>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary">Limpiar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-success">Registrar</button>
    </div>
  </div>
  <div id="resultado_reg"></div>

   
</form>
 <!-- FIN FORM CREAR mantenimiento -->


 </div>

<!-- Fin Contenido Pestaña registrar matenimiento-->

<!--  Contenido Pestaña modificar Equipo-->

 <div class="tab-pane fade" id="tabs-second">


  <!-- FORM MODIFICAR Equipo -->
<h4 align="center">Modificar Mantenimiento</h4>

<form class="form-horizontal" id="formModificar" method="POST" enctype="multipart/form-data">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label" >Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="buscar-codigo" placeholder="Codigo" onkeypress="return soloNumeros(event)" >
    </div>
    <div class="col-xs-6 col-sm-2">
       <button  type="button" class="list-group-item" data-toggle="tooltip" data-placement="top" title="Busqueda de jugador">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        <span class="hidden-xs">
            Buscar
        </span>
        </button>
    </div>
  </div>



  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8 table-responsive">
    
<div id="mostrar-tabla-mod"></div>

    </div>
  </div>

  <div>
    <center><h4>Datos del Mantenimiento</h4></center>
  </div>
   <form class="form-horizontal" id="formRegistro" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Ambiente</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-ambiente" name="reg-ambiente" >
        <option></option>
        <option value="1">Habitacion </option>
        <option value="2">Salon</option>
        <option value="3">Piscina</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Tipo de Mantenimiento</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-tman" name="reg-tman" >
        <option></option>
        <option value="1">Preventivo </option>
        <option value="2">Especifico</option>
      </select>
    </div>
  </div>
    <div class="form-group" >
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="reg-codigo" name="reg-codigo" placeholder="Codigo " onkeypress="return soloNumeros(event)" >
      </div>
      
    </div>

    
    
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre del solicitante</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="reg-nomsol" name="reg-nomsol" placeholder="Nombre" onkeypress="return soloLetras(event)" >
      </div>
    </div>
  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Solicitada</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-sol" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div>              
  </div>
  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Requerida</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-req" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div>              
  </div>
<div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion:</label>
      <div class="col-sm-7">
      <textarea class="form-control" rows="4" type="text" class="form-control" id="reg-desc" name="reg-desc" placeholder="Descripcion del activo" required ></textarea>      
      </div>
  </div>
<div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Estado General</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-estado" name="reg-estado" >
        <option></option>
        <option value="1">Buen Estado </option>
        <option value="2">Moderado</option>
      </select>
    </div>
  </div>
  

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary">Limpiar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-success">Registrar</button>
    </div>
  </div>
  <div id="resultado_reg"></div>
  
    

</form>
<!-- FIN FORM MODIFICAR Equipo -->
 </div>
<!--  Fin Contenido Pestaña modificar Equipo-->


 <div class="tab-pane fade" id="tabs-third">


  <!-- FORM ELIMINAR Equipo -->


<h4>Cambiar Estado de Mantenimiento</h4>

<form class="form-horizontal" name="eliminar" id="formEliminar">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label"  >Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="buscar-codigo-eli" placeholder="Codigo" onkeypress="return soloNumeros(event)" >
    </div>
    <div class="col-xs-6 col-sm-2">
       <button  type="button" class="list-group-item" data-toggle="tooltip" data-placement="top" title="Busqueda Activos">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        <span class="hidden-xs">
            Buscar
        </span>
        </button>
    </div>
  </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8 table-responsive">
    
<div id="mostrar-tabla-eli"></div>

    </div>
  </div>

  <div>
    <center><h4>Datos del Activo</h4></center>
  </div>
     <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="eli-codigo" placeholder="Codigo"  readonly="">
      </div>
    </div> 
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="eli-nombre" placeholder="Nombre "  readonly="">
      </div>
      
    </div>

  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion:</label>
    <div class="col-sm-5">
      <textarea type="text" class="form-control" id="eli-desc" placeholder="Descripcion" readonly=""></textarea>
    </div>
  </div>

  <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre encargado del mantenimiento</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="en-nombre" name="en-nombre" placeholder="Nombre ">
      </div>
      
    </div>
  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Solicitada</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-sol" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required readonly="">
          </div>              
  </div>

  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Realizada</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-realizada" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div>              
  </div>




  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-2">
      <button type="button" class="btn btn-primary">Limpiar</button>
    </div>
     <div class="col-sm-offset-1 col-sm-2">
  <button type="button" class="eliminar btn btn-danger " data-toggle="modal" data-target="#myModalEliminarActivo">
  Eliminar
  </button>
  </div>
  </div>

  <div id="resultado_eli"></div>
</form>

<!-- Formulario modal2n -->

 <div class="modal fade" id="myModalEliminarActivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Eliminar</h4>
           </div>
           
          <div class="modal-body">
            <form class="form-horizontal" method="post" action='' name="login_form">
              <div class="form-group">
                <br>
                <label for="inputCI" class="col-sm-11">Seguro de eliminar este Activo?</label>
              </div>

      
            <div class="form-group">
              <div class="col-sm-offset-1 col-sm-7">
                <button type="button" class="btn btn-success btn-sm">Eliminar</button>
              </div>
           </div>


          </form>
          </div>

          <div class="modal-footer">
             <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
    </div>
  </div>




</form>


<!-- FIN FORM ELIMINAR Equipo -->
 </div>
<div class="active tab-pane fade in" id="tabs-fouth">


  <!-- FORM ELIMINAR Equipo -->
<h4 align="center">Programados</h4>

<form class="form-horizontal" name="modificar" id="modificar">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputcodigo" placeholder="Codigo"  >
    </div>
    <div class="col-xs-6 col-sm-2">
       <button  type="button" class="list-group-item" data-toggle="tooltip" data-placement="top" title="Busqueda Mantenimiento">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        <span class="hidden-xs">
            Buscar
        </span>
        </button>
    </div>
  </div>



  <div id="mostrar2"></div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary">Imprimir</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-danger">Salir</button>
    </div>
  </div>

  
    
</form>


<!-- FIN FORM ELIMINAR Equipo -->
 </div>

</div>
  


	   </div>
    </div>
    </div>

</body>
</html>

