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



<!-- Contenido Pestaña ABM Equipo -->
<div class="tab-content">

<!-- Contenido Pestaña registrar Equipo-->
  
<!-- FORM CREAR Equipo -->
<h4>Seguimiento Mantenimiento</h4>
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

