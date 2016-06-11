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
		//require_once ("../../sistema_activos/cabecera1.php");
 	?>
 	<?php 
    require_once ("../../sistema_activos/barramenusr.php");
  ?>

<!-- Contenedor Pestaña ABM Equipo -->
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Seguimiento</div>
  <div class="panel-body">



<ul class="nav nav-tabs" role="tablist">
 <li class="active"><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-first">Seguimiento Mantenimiento</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-second">Finalizados</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-thrid">Busqueda Especifica</a></li>
</ul>

<!-- Contenido Pestaña ABM Equipo -->
<div class="tab-content">

<!-- Contenido Pestaña registrar Equipo-->
   <div class="active tab-pane fade in" id="tabs-first">

<!-- FORM CREAR Equipo -->
<br>
<h4 align="center">Seguimiento Mantenimiento</h4>
  <form class="form-horizontal" name="formMantenimiento" id="formMantenimiento">
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



  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8 table-responsive">

    <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>

    </div>
  </div>
 
  <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="man-codigo" name="man-nombre" placeholder="Nombre" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Lugar:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="man-lugar" name="man-nombre" placeholder="Nombre" >
      </div>
    </div>
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="button" class="btn btn-primary">manalizar</button>
    </div>
    
  </div>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Fecha</label>
    <div class="col-sm-3">
      <select class="form-control" id="man-amb" name="man-fecha">
      </select>
    </div>
  </div>
  <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Responsable:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="man-nombre" name="man-nombre" placeholder="Nombre" >
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="button" class="btn btn-primary">Registrar</button>
    </div>
  </div>
</form>
 </div>
<div class="tab-pane fade" id="tabs-second">


  <!-- FORM MODIFICAR Activo -->
<h4 align="center"> Finalizados</h4>
<form class="form-horizontal" id="formFinalizados" method="POST" enctype="multipart/form-data">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label" >Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="buscar-codigo" placeholder="Codigo"  >
    </div>
    <div class="col-xs-6 col-sm-2">
       <button  type="button" class="list-group-item" data-toggle="tooltip" data-placement="top" title="Buscar">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
        <span class="hidden-xs">
            Buscar
        </span>
        </button>
    </div>
  </div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8 table-responsive">

    <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>

    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8 table-responsive">
    
<div id="mostrar-tabla-fin"></div>

    </div>
  </div>

  <div>
    <center><h4>Datos de la Finalizacion</h4></center>
  </div>
 
  
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="fin-codigo" name="fin-codigo" placeholder="Codigo"  >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Lugar:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="fin-lugar" name="fin-lugar" placeholder="Nombre" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fecha Inicio:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="fin-tipo" name="fin-tipo" placeholder="tipo" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fecha Fin</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="fin-desc" name="fin-desc" placeholder="Descripcion" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label"> Responsable</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="fin-desc" name="fin-desc" placeholder="Descripcion" >
      </div>
    </div>

  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="submit" class="btn btn-primary">Limpiar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-success">Modificar</button>
    </div>
  </div>

  
    
</form>
<!-- FIN FORM MODIFICAR Activo -->
 </div>
 <div class="tab-pane fade" id="tabs-thrid">


  <!-- FORM MODIFICAR Activo -->
<br>
<h4 align="center">Seguimiento Mantenimiento</h4>
  <form class="form-horizontal" name="formMantenimiento" id="formMantenimiento">
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



  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-8 table-responsive">

    <table class="table table-hover">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>

    </div>
  </div>
 
   <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="mod-desc" name="mod-desc" placeholder="Descripcion" >
      </div>
    </div>
 
</form>
<!-- FIN FORM MODIFICAR Activo -->
 </div>

 </div>


</div>
  


	   </div>
    </div>

</body>
</html>
