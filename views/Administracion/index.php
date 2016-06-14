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
    <script src="/sistema_activos/controllers/validadores.js"></script>
    <script src="/sistema_activos/controllers/administracion.js"></script>
    
</head>
<body>
<!--  llamada a la cabecera -->
<?php 
    require_once $_SERVER["DOCUMENT_ROOT"]."/sistema_activos/barramenusr.php";
  ?>

<!-- Contenedor Pestaña ABM Activo -->
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Administrar</div>
  <div class="panel-body">


<!-- Pestaña ABM Activo -->

<ul class="nav nav-tabs" role="tablist">
 <li class="active"><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-first">Registrar</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-second">Modificar</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-third">Eliminar</a></li>
</ul>
<!-- Contenido Pestaña ABM Activo -->
<div class="tab-content">

<!-- Contenido Pestaña registrar Activo-->

 <div class="active tab-pane fade in" id="tabs-first">
  
<!-- FORM CREAR Activo -->
<h4 align="center">Registrar Activo</h4>
  <form class="form-horizontal" id="formRegistro" method="POST" enctype="multipart/form-data">
  
  <br>
    <div class="form-group" >
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="reg-codigo" name="reg-codigo" placeholder="Codigo " onkeypress="return soloNumeros(event)" >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="reg-nombre" name="reg-nombre" placeholder="Nombre" onkeypress="return soloLetras(event)" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Cantidad:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="reg-cantidad" name="reg-cantidad" placeholder="Cantidad" onkeypress="return soloNumeros(event)">
      </div>
    </div>

  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Almacen:</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-almacen" name="reg-almacen">
        <option></option>
        <option value="1">Cama Frigorifica 1 </option>
        <option value="2">Cama Frigorifica 2</option>
        <option value="3">Abarrotes</option>
        <option value="4">Enlatados</option>
        <option value="5">Mueble</option>
        <option value="6">Objetos</option>
        <option value="7">Limpieza</option>
        <option value="8">Minibar</option>
        <option value="9">Zonas comunes</option>
      </select>
    </div>
  </div>
  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Caducidad:</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-ca-reg" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div>              
  </div>
  <div class="form-group ">
            <label class="col-sm-3 control-label">Fecha Garantia:</label>
          <div class="col-xs-3">
            <input type="date" name="fecha-ga-reg" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div>              
  </div>
<div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion:</label>
      <div class="col-sm-7">
      <textarea class="form-control" rows="4" type="text" class="form-control" id="reg-desc" name="reg-desc" placeholder="Descripcion del activo" required ></textarea>      
      </div>
  </div>
<div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Estado:</label>
    <div class="col-sm-2">
      <select required class="form-control" id="reg-estado" name="reg-estado" >
        <option></option>
        <option value="1">Buen Estado </option>
        <option value="2">Moderado</option>
      </select>
    </div>
  </div>
  <div class="form-group">
                <label class="col-sm-offset-1 col-sm-2 control-label">Imagen Ejercicio:</label>
                <div class="col-sm-3" >
                  <div  id="mostrar-ima" name="mostrar-ima" class="img-rounded"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-offset-1 col-sm-2 control-label">Subir imagen:</label>
                <label class=" control-label"></label>
                <div class="col-sm-3" >
                  <input required type="file" id="abrir-ima" class="form-control-file col-xs-12" name="abrir-ima" value="ser">
                </div>
              </div>
              <script src="mostrar-ima.js"></script>

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
 <!-- FIN FORM CREAR Activo -->

 </div>

<!-- Fin Contenido Pestaña registrar Activo-->

<!--  Contenido Pestaña modificar Activo-->

 <div class="tab-pane fade" id="tabs-second">


  <!-- FORM MODIFICAR Activo -->
<h4>Modificar Activo</h4>
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
    <center><h4>Datos del Activo</h4></center>
  </div>
 
  
    <div class="form-group" >
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="mod-codigo" name="mod-codigo" placeholder="Codigo " onkeypress="return soloNumeros(event)" >
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="mod-nombre" name="mod-nombre" placeholder="Nombre" onkeypress="return soloLetras(event)">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Cantidad:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="mod-cantidad" name="mod-cantidad" placeholder="tipo" onkeypress="return soloNumeros(event)">
      </div>
    </div>

  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Almacen:</label>
    <div class="col-sm-2">
      <select required class="form-control" id="mod-almacen" name="mod-almacen">
        <option></option>
        <option value="1">Cama Frigorifica 1 </option>
        <option value="2">Cama Frigorifica 2</option>
        <option value="3">Abarrotes</option>
        <option value="4">Enlatados</option>
        <option value="5">Mueble</option>
        <option value="6">Objetos</option>
        <option value="7">Limpieza</option>
        <option value="8">Minibar</option>
        <option value="9">Zonas comunes</option>
      </select>
    </div>
  </div>
 <div  id="mostrar_fecha_ca" ></div>
 <div  id="mostrar_fecha_ga" ></div>

<div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion:</label>
      <div class="col-sm-7">
      <textarea required class="form-control" rows="4" type="text" class="form-control" id="mod-desc" name="mod-desc" placeholder="Descripcion del activo"></textarea>      
      </div>
  </div>
<div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Estado:</label>
    <div class="col-sm-2">
      <select required class="form-control" id="mod-estado" name="mod-estado">
        <option></option>
        <option value="1">Buen Estado </option>
        <option value="2">Moderado</option>
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
                  <input required type="file" id="abrir-ima-mod" class="form-control-file col-xs-12" name="abrir-ima-mod">
                </div>
              </div>
<!--               <script src="mostrar-ima-mod.js"></script>
 -->
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-primary">Limpiar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="submit" class="btn btn-success">Modificar</button>
    </div>
  </div>
  <div id="resultado_mod"></div>

  
    
</form>
<!-- FIN FORM MODIFICAR Activo -->
 </div>
<!--  Fin Contenido Pestaña modificar Activo-->


 <div class="tab-pane fade" id="tabs-third">


  <!-- FORM ELIMINAR Activo -->


<h4>Eliminar Activo</h4>

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
                <label class="col-sm-offset-1 col-sm-2 control-label">Imagen Activo:</label>
                <div class="col-sm-3" >
                  <div  id="mostrar-ima-eli" name="mostrar-ima-eli" class="img-rounded"></div>

                </div>
    </div>
  
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Nombre:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="eli-nombre" placeholder="Nombre "  readonly="">
      </div>
      
    </div>

    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Codigo:</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="eli-codigo" placeholder="Codigo"  readonly="">
      </div>
    </div>



  <div class="form-group">
    <label class="col-sm-offset-1 col-sm-2 control-label">Descripcion:</label>
    <div class="col-sm-5">
      <textarea type="text" class="form-control" id="eli-desc" placeholder="Descripcion" readonly=""></textarea>
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

