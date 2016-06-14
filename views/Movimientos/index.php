<?php
@session_start();
  if (!isset($_SESSION['id_usu']))
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
    <script src="/sistema_activos/bootstrap-3.3.6-dist/jquery.min.js"></script>
    <script type="text/javascript">
    	
    </script>
</head>
<body>
<!--  llamada a la cabecera -->
 	<?php 
    require_once ("../../../sistema_activos/barramenusr.php");
  ?>

<!-- Contenedor Pestaña ABM Activo -->
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Movimientos</div>
  <div class="panel-body">


<!-- Pestaña ABM Activo -->

<ul class="nav nav-tabs" role="tablist">
 <li class="active"><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-first">Movimientos</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-second">Detalles</a></li>
</ul>
<!-- Contenido Pestaña ABM Activo -->
<div class="tab-content">

<!-- Contenido Pestaña movistrar Activo-->

 <div class="active tab-pane fade in" id="tabs-first">
  
<!-- FORM CREAR Activo -->
<h4 align="center"> Movimiento Material</h4>
  <form class="form-horizontal" id="formMovimentos" method="POST" enctype="multipart/form-data">
  
  <br>
    <div class="form-group" >
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-3">
        <input required type="text" class="form-control" id="mov-codigo" name="mov-codigo" placeholder="Codigo "  >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">de:</label>
      <div class="col-sm-3">
        <input required type="text" class="form-control" id="mov-ubicacion" name="mov-ubicacion" placeholder="Ubicacion Actual" >
      </div>
    </div>
    <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">a:</label>
    <div class="col-sm-2">
      <select required class="form-control" id="mov-destino" name="mov-destino">
        <option></option>
        <option value="1">Almacen 1</option>
        <option value="2">Almacen 2</option>
        <option value="3">Almacen 3</option>
      </select>
    </div>
  </div>
    
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Almacen</label>
    <div class="col-sm-2">
      <select required class="form-control" id="mov-ambiente" name="mov-ambiente">
        <option></option>
        <option value="1">Almacen 1</option>
        <option value="2">Almacen 2</option>
        <option value="3">Almacen 3</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Nombre Almacen</label>
    <div class="col-sm-2">
      <select required class="form-control" id="mov-ambiente" name="mov-ambiente">
        <option></option>
        <option value="1"></option>
        <option value="2">Almacen 2</option>
        <option value="3">Almacen 3</option>
      </select>
    </div>
  </div>



  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary">Limpiar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-success">movistrar</button>
    </div>
  </div>

   
</form>
 <!-- FIN FORM CREAR Activo -->

 </div>

<!-- Fin Contenido Pestaña movistrar Activo-->

<!--  Contenido Pestaña modificar Activo-->

 <div class="tab-pane fade" id="tabs-second">


  <!-- FORM MODIFICAR Activo -->
<h4 align="center"> Detalles</h4>
<form class="form-horizontal" id="formModificar" method="POST" enctype="multipart/form-data">
  <br>
  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label" >Codigo:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="buscar-codigo" placeholder="Codigo"  >
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
    <center><h4>Datos del Activo</h4></center>
  </div>
 
  
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="mod-codigo" name="mod-codigo" placeholder="Codigo"  >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="mod-nombre" name="mod-nombre" placeholder="Nombre" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Tipo:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="mod-tipo" name="mod-tipo" placeholder="tipo" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="mod-desc" name="mod-desc" placeholder="Descripcion" >
      </div>
    </div>


  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Almacen</label>
    <div class="col-sm-3">
      <select class="form-control" id="mod-amb" name="mod-amb">
        <option></option>
        <option value="1">Almacen 1</option>
        <option value="2">Almacen 2</option>
        <option value="3">Almacen 3</option>
      </select>
    </div>
  </div>

  <div class="form-group">
                <label class="col-sm-offset-1 col-sm-2 control-label">Imagen Ejercicio:</label>
                <div class="col-sm-3" >
                  <div  id="mostrar-ima-mod" name="mostrar-ima-mod" class="img-rounded"></div>

                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-2 control-label">Subir imagen:</label>
                <label class=" control-label"></label>
                <div class="col-sm-3" >
                  <input type="file" id="abrir-ima-mod" class="form-control-file col-xs-12" name="abrir-ima-mod">
                </div>
              </div>
<!--               <script src="mostrar-ima-mod.js"></script>
 -->
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
<!--  Fin Contenido Pestaña modificar Activo-->


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
                <button type="button" onclick="javascript:eliminarDatos()" class="btn btn-success btn-sm">Eliminar</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>

              </div>
           </div>


          </form>
          </div>

          <div class="modal-footer">
                       </div>
        </div>
    </div>
  </div>




</form>


<!-- FIN FORM ELIMINAR Activo -->
 </div>


</div>
  


	   </div>
    </div>
    </div>

</body>
</html>

