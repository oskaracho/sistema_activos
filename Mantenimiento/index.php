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
    require_once ("../../sistema_activos/barramenusr.php");
  ?>

<!-- Contenedor Pestaña ABM Equipo -->
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Mantenimiento</div>
  <div class="panel-body">


<!-- Pestaña ABM Equipo -->

<ul class="nav nav-tabs" role="tablist">
 <li class="active"><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-fouth">Programados</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-first">Registrar</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-second">Modificar</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-third">Eliminar</a></li>
</ul>
<!-- Contenido Pestaña ABM Equipo -->
<div class="tab-content">

<!-- Contenido Pestaña registrar Equipo-->

 <div class="tab-pane fade in" id="tabs-first">
  
<!-- FORM CREAR Equipo -->
<h4 align="center">Registrar Mantenimiento</h4>
  <form class="form-horizontal">
  
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Ambiente</label>
    <div class="col-sm-3">
      <select class="form-control">
        <option></option>
        <option>Ambientes </option>
        <option>Habitaciones </option>
        <option>Maquinaria y Objetos </option>
      </select>
    </div>
    <div class="col-sm-3">
      <select class="form-control">
        <option></option>
        <option>Picina </option>
        <option>Salon A </option>
        <option>Salon B </option>
      </select>
    </div>
    
  </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="inputNombre" placeholder="Codigo "  >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="inputApellido1" placeholder="Nombre" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="inputApellido2" placeholder="Descripcion" >
      </div>
    </div>

  

  <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fotografia Activo:</label>
      <div class="col-sm-7">
        <img class="img-circle media-object" width="300" height="300" src="/sistema_activos/Imagenes/Mueble5.png">
      </div>
    </div>

  <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Subir imagen:</label>
      <div class="col-sm-4">
        <label class="col-sm-2 control-label">Ruta</label>
      </div>
  
      <button  type="button" class="btn btn-default">
          <span class="glyphicon glyphicon-open" aria-hidden="true"></span>        
            Subir Archivo        
        </button>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary">Limpiar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-success">Registrar</button>
    </div>
  </div>

   
</form>
 <!-- FIN FORM CREAR Equipo -->

 </div>

<!-- Fin Contenido Pestaña registrar Equipo-->

<!--  Contenido Pestaña modificar Equipo-->

 <div class="tab-pane fade" id="tabs-second">


  <!-- FORM MODIFICAR Equipo -->
<h4 align="center">Modificar Activo</h4>
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
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputCodigoMod" placeholder="Codigo"  >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputnombreMod" placeholder="Nombre" >
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputdescripcionMod" placeholder="Descripcion" >
      </div>
    </div>


  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Ambiente</label>
    <div class="col-sm-3">
      <select class="form-control">
        <option></option>
        <option>Ambiente 1</option>
        <option>Ambiente 2</option>
        <option>Ambiente 3</option>
        <option>Ambiente 4</option>
        <option>Ambiente 5</option>
        <option>Ambiente 6</option>
        <option>Ambiente 7</option>
      </select>
    </div>
  </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fotografia Activo:</label>
      <div class="col-sm-7">
        <img class="img-circle media-object" width="300" height="300" src="/sistema_activos/Imagenes/Mueble5.png">
      </div>
    </div>

  <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Subir imagen:</label>
      <div class="col-sm-4">
        <label for="inputSubirMo" class="col-sm-2 control-label">Ruta</label>
      </div>
      <button type="button" class="btn btn-default ">
        <span class="glyphicon glyphicon-open " aria-hidden="true"></span>
        Subir archivo
      </button>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary">Limpiar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-success">Modificar</button>
    </div>
  </div>

  
    
</form>
<!-- FIN FORM MODIFICAR Equipo -->
 </div>
<!--  Fin Contenido Pestaña modificar Equipo-->


 <div class="tab-pane fade" id="tabs-third">


  <!-- FORM ELIMINAR Equipo -->


<h4 align="center">Eliminar Activo</h4>

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
      <label class="col-sm-offset-1 col-sm-2 control-label">Fotografia Activo:</label>
      <div class="col-sm-7">
        <img class="img-circle media-object" width="300" height="300" src="/sistema_activos/Imagenes/Mueble5.png">
      </div>
    </div>
  
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputNombreEli" placeholder="Nombre "  readonly="">
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="inputcodigoEli" placeholder="Codigo"  readonly="">
      </div>
    </div>



  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Ambiente</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputambienteEli" placeholder="Ambiente" readonly="">
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

