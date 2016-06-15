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
    	$(document).ready(function() {
      
            buscar_teclado_modificar();


      });
      function buscar_teclado_modificar(){
            var o = "opcion="+ encodeURIComponent('buscar_sol_mov');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: '../../controllers/movimientos.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-12" style="height: 250px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Cod-Sol</th><th>Ambiente</th><th>Requeriere</th><th>Cantidad</th><th>Solicitante</th><th>Fecha Generada</th><th>Fecha Requerida</th><th>Estado</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                    if(resp[i].idEstado==1){var estado="Urgente";
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idSol_movimiento+'</td><td style="display:none">'
                    +resp[i].idAmbiente+'</td><td>'
                    +resp[i].nom_am+'</td><td style="display:none">'
                    +resp[i].idActivo+'</td><td>'
                    +resp[i].nom_ac+'</td><td>'
                    +resp[i].cantidad+'</td><td>'
                    +resp[i].idSolicitante+'</td><td>'
                    +resp[i].fecha_generada+'</td><td>'
                    +resp[i].fecha_requerida+'</td><td class="danger">'
                    +estado+'</td></tr>';
                  }
                    if(resp[i].idEstado==2){var estado="Moderado";
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idSol_movimiento+'</td><td style="display:none">'
                    +resp[i].idAmbiente+'</td><td>'
                    +resp[i].nom_am+'</td><td style="display:none">'
                    +resp[i].idActivo+'</td><td>'
                    +resp[i].nom_ac+'</td><td>'
                    +resp[i].cantidad+'</td><td>'
                    +resp[i].idSolicitante+'</td><td>'
                    +resp[i].fecha_generada+'</td><td>'
                    +resp[i].fecha_requerida+'</td><td class="warning">'
                    +estado+'</td></tr>';
                  }
                    if(resp[i].idEstado==5){var estado="Aceptado";
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idSol_movimiento+'</td><td style="display:none">'
                    +resp[i].idAmbiente+'</td><td>'
                    +resp[i].nom_am+'</td><td style="display:none">'
                    +resp[i].idActivo+'</td><td>'
                    +resp[i].nom_ac+'</td><td>'
                    +resp[i].cantidad+'</td><td>'
                    +resp[i].idSolicitante+'</td><td>'
                    +resp[i].fecha_generada+'</td><td>'
                    +resp[i].fecha_requerida+'</td><td class="success">'
                    +estado+'</td></tr>';
                  }
                    if(resp[i].idEstado==6){var estado="Rechazado";
                     html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idSol_movimiento+'</td><td style="display:none">'
                    +resp[i].idAmbiente+'</td><td>'
                    +resp[i].nom_am+'</td><td style="display:none">'
                    +resp[i].idActivo+'</td><td>'
                    +resp[i].nom_ac+'</td><td>'
                    +resp[i].cantidad+'</td><td>'
                    +resp[i].idSolicitante+'</td><td>'
                    +resp[i].fecha_generada+'</td><td>'
                    +resp[i].fecha_requerida+'</td><td style="display:none">'
                    +resp[i].idEstado+'</td><td class="active" style="text-decoration: line-through;">'
                    +estado+'</td></tr>';
                  }
                }
                  html+= '</tbody></table></div>';

                  $('#tabla_movimientos').html(html);

              })
              .fail(function() {
                console.log("error");
              })
             
          }
          function mostrar_datos(f)
          {
             codsol_mov= $(f).find('td:eq(0)').text();
              idam_mov = $(f).find('td:eq(1)').text();
              idac_mov = $(f).find('td:eq(3)').text();
              cant_mov=$(f).find('td:eq(5)').text();
              idso_mov = $(f).find('td:eq(6)').text();
              fere_mov = $(f).find('td:eq(8)').text();
              $fere_mov=fere_mov;
              
               

              $('#mov-codigo').val(idac_mov);
              $('#mov-amb').val(idam_mov);
             $('#mov-cantidad').val(cant_mov);
             
              var html5='<label class="col-sm-offset-1 col-sm-4 control-label">Fecha Requerida:</label><div class="col-sm-3"> <input type="date" name="fecha-ca-mod" step="1" min="2015-01-01" max="2020-12-31" value="'+fere_mov+'"></div>'

              $('#fech').html(html5);
              $('#mov-estado').val(idso_mov);
              

          }
          
          function aceptar_mov(){

      setTimeout("$('.ocultar').hide();", 5000);
            var o = "cod_sol="+encodeURIComponent(codsol_mov)+"&opcion="+ encodeURIComponent('mover')+"&cod_ac="+ encodeURIComponent(idac_mov)+"&cant="+ encodeURIComponent(cant_mov)+"&cod_am="+ encodeURIComponent(idam_mov);
            console.log(o);
            
              $.ajax({
                url: '../../controllers/movimientos.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);
                if(resp.resp==0){
                  var men='<div class="alert alert-danger ocultar" role="alert" align="center" >No existe Stock</div>';
                }
                if(resp.resp==1){
                  var men='<div class="alert alert-danger ocultar" role="alert" align="center" >No se puede cubrir la cantidad requerida</div>';
                }
                if(resp.resp==2){
                  var men='<div class="alert alert-success ocultar" role="alert" align="center" >Se realizo la solicitud</div>';
                  var boton='<a class="col-sm-offset-1 col-sm-2" href="/sistema_activos/tcpdf/too/Prestamo.php?mov='+codsol_mov+'" target="_blank"><i class="fa fa-print"></i>Imprimir</a>';
                  $('#imprimir_boton').html(boton);
                }
                if(resp.resp==3){
                  var men='<div class="alert alert-danger ocultar" role="alert" align="center" >No se realizo la solicitud</div>';
                }
                  $('#mostrar_mensaje_mov').html(men);

              })
              .fail(function() {
                console.log("error");
              })
             
          }
          function rechazar_mov(){

      setTimeout("$('.ocultar').hide();", 5000);
            var o = "cod_sol="+encodeURIComponent(codsol_mov)+"&opcion="+ encodeURIComponent('mover')+"&cod_ac="+ encodeURIComponent(idac_mov)+"&cant="+ encodeURIComponent(cant_mov)+"&cod_am="+ encodeURIComponent(idam_mov);
            console.log(o);
            
              $.ajax({
                url: '../../controllers/movimientos.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);
                if(resp.resp==0){
                  var men='<div class="alert alert-danger ocultar" role="alert" align="center" >No existe Stock</div>';
                }
                if(resp.resp==1){
                  var men='<div class="alert alert-danger ocultar" role="alert" align="center" >No se puede cubrir la cantidad requerida</div>';
                }
                if(resp.resp==2){
                  var men='<div class="alert alert-success ocultar" role="alert" align="center" >Se realizo la solicitud</div>';
                }
                if(resp.resp==3){
                  var men='<div class="alert alert-danger ocultar" role="alert" align="center" >No se realizo la solicitud</div>';
                }
                  $('#mostrar_mensaje_mov').html(men);

              })
              .fail(function() {
                console.log("error");
              })
             
          }
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
<div class="form-group">
    
<div id="tabla_movimientos"></div>

  </div>
  <form class="form-horizontal" id="formMovimentos" method="POST" enctype="multipart/form-data">
  
  <br>
    <div class="form-group" >
      <label class="col-sm-offset-3 col-sm-2 control-label">Codigo Activo:</label>
      <div class="col-sm-3">
        <input required readonly type="text" class="form-control" id="mov-codigo" name="mov-codigo" placeholder="Codigo "  >
      </div>
    </div>
    <div class="form-group" >
      <label class="col-sm-offset-3 col-sm-2 control-label">Cantidad:</label>
      <div class="col-sm-3">
        <input required readonly type="text" class="form-control" id="mov-cantidad" name="mov-codigo" placeholder="Cantidad "  >
      </div>
    </div>
    <div class="form-group" >
      <label class="col-sm-offset-3 col-sm-2 control-label">Codigo Destino:</label>
      <div class="col-sm-3">
        <input required readonly type="text" class="form-control" id="mov-amb" name="mov-codigo" placeholder="Codigo "  >
      </div>
    </div>
    <div class="form-group">
      <div id="fech">
            <label class="col-sm-offset-1 col-sm-4 control-label">Fecha Requerida:</label>
          <div class="col-sm-3">
            <input type="date" readonly name="fecha-mov-re" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div> 
      </div>             
  </div>

  <div class="form-group">
    <label class="col-sm-offset-2 col-sm-3 control-label">Estado Requerimiento</label>
    <div class="col-sm-3">
      <select required readonly class="form-control" id="mov-estado" name="mov-ambiente">
        <option></option>
        <option value="1">Urgente</option>
        <option value="2">Moderado</option>
      </select>
    </div>
  </div>

<br><br>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-danger">Rechazar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="button" onclick="javascript:aceptar_mov();" class="btn btn-success">Aceptar</button>
    </div>
    <div id="imprimir_boton"></div>
  </div>
<div id="mostrar_mensaje_mov"></div>
   
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

