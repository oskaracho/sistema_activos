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

<!-- Contenedor Pestaña ABM ACtivos -->
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Administrar</div>
  <div class="panel-body">


<!-- Pestaña ABM ACtivos -->

<ul class="nav nav-tabs" role="tablist">
 <li class="active"><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-first">Almacen Items</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-second">Almacen Eventos</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-third">Almacen Muebles</a></li>
</ul>
<!-- Contenido Pestaña ABM ACtivos -->
<div class="tab-content">

<!-- Contenido Pestaña registrar ACtivos-->

 <div class="active tab-pane fade in" id="tabs-first">
  
<!-- FORM CREAR ACtivos -->
<div align="center"><h4>Almacen Items</h4></div>
<form class="form-horizontal" name="modificar" id="modificar">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label" >Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputcodigoMo" placeholder="Codigo"  >
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

  <div>
    <center><h4>Datos del Jugador</h4></center>
  </div>
 
  
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Seccion:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputCodigoMod" placeholder="Codigo"  >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Tipo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputnombreMod" placeholder="Nombre" >
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fotografia Activo:</label>
      <div class="col-sm-7">
        <img class="img-circle media-object" width="300" height="300" src="/sistema_activos/Imagenes/Mueble5.png">
      </div>
    </div>

  

  
    
</form>
 <!-- FIN FORM CREAR ACtivos -->

 </div>

<!-- Fin Contenido Pestaña registrar ACtivos-->

<!--  Contenido Pestaña modificar ACtivos-->

 <div class="tab-pane fade" id="tabs-second">


  <!-- FORM MODIFICAR ACtivos -->
<div align="center"><h4>Almacen Eventos</h4></div>
<form class="form-horizontal" name="modificar" id="modificar">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label" >Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputcodigoMo" placeholder="Codigo"  >
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
  <div>
    <center><h4>Datos del Jugador</h4></center>
  </div>
 
  
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Estado:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputCodigoMod" placeholder="Codigo"  >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Tipo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputnombreMod" placeholder="Nombre" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fotografia Activo:</label>
      <div class="col-sm-7">
        <img class="img-circle media-object" width="300" height="300" src="/sistema_activos/Imagenes/Mueble5.png">
      </div>
    </div>


  
    
</form>
<!-- FIN FORM MODIFICAR ACtivos -->
 </div>
<!--  Fin Contenido Pestaña modificar ACtivos-->


 <div class="tab-pane fade" id="tabs-third">


  <!-- FORM ELIMINAR ACtivos -->


<div align="center"><h4>Almacen Muebles</h4></div>

<form class="form-horizontal" name="eliminar" id="eliminar">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label" id="buscarcodEli" >Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputcodigoEli" placeholder="Codigo"  >
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

  <div>
    <center><h4>Datos del Jugador</h4></center>
  </div>

  
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Estado:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputNombreEli" placeholder="Nombre "  >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Tipo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputcodigoEli" placeholder="Codigo"  >
      </div>
    </div>



  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Material</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputambienteEli" placeholder="Ambiente" >
    </div>
  </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fotografia Activo:</label>
      <div class="col-sm-7">
        <img class="img-circle media-object" width="300" height="300" src="/sistema_activos/Imagenes/Mueble5.png">
      </div>
    </div>
 

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


<!-- FIN FORM ELIMINAR ACtivos -->
 </div>


</div>
  


	   </div>
    </div>
    </div>

</body>
</html>

