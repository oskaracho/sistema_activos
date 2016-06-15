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



        $('#inputcodigo').on('keyup', buscar_teclado_modificar)
        $('#buscar-codigo').on('keyup', buscar_finalizados)
        $('#inputcodigo2').on('keyup', buscar_todos)

    	})
     function buscar_teclado_modificar(){
            var n = $('#inputcodigo').val();
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: '../../controllers/seguimiento.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

               var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Codigo</th><th style="display:none"></th><th>ambiente</th><th>idSolicitante</th><th>tarea</th><th>fecha_generada</th><th>fecha_requerida</th><th>hora_requerida</th><th>idEstado</th><th>hora_realizada</th><th>observaciones</th></tr></thead><tbody>';
        
                  for(i in resp){ 




                    html+='<tr onclick="mostrar_datos(this)"><td>'

                    +resp[i].idSol_correctivo+'</td><td>'
                    +resp[i].idAmbiente+'</td><td >'
                    +resp[i].idSolicitante+'</td><td >'
                    +resp[i].tarea+'</td><td>'
                    +resp[i].fecha_generada+'</td><td >'
                    +resp[i].fecha_requerida+'</td><td>'
                    +resp[i].hora_requerida+'</td><td>'
                    +resp[i].idEstado+'</td><td >'
                    +resp[i].hora_realizada+'</td><td >'
                    +resp[i].observaciones+'</td><td >'
                    +resp[i].idUsuario+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';

                  $('#mostrar-sol-co').html(html);

              })
              .fail(function() {
                console.log("error");
              })
             
          }


             function buscar_finalizados(){
            var n = $('#buscar-codigo').val();
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar_finalizados');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: '../../controllers/seguimiento.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Codigo</th><th style="display:none"></th><th>ambiente</th><th>idSolicitante</th><th>tarea</th><th>fecha_generada</th><th>fecha_requerida</th><th>hora_requerida</th><th>idEstado</th><th>hora_realizada</th><th>observaciones</th></tr></thead><tbody>';
        
                  for(i in resp){ 




                    html+='<tr onclick="mostrar_datos2(this)"><td>'

                    +resp[i].idSol_correctivo+'</td><td>'
                    +resp[i].idAmbiente+'</td><td >'
                    +resp[i].idSolicitante+'</td><td >'
                    +resp[i].tarea+'</td><td>'
                    +resp[i].fecha_generada+'</td><td >'
                    +resp[i].fecha_requerida+'</td><td>'
                    +resp[i].hora_requerida+'</td><td>'
                    +resp[i].idEstado+'</td><td >'
                    +resp[i].hora_realizada+'</td><td >'
                    +resp[i].observaciones+'</td><td >'
                    +resp[i].idUsuario+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';
                  $('#mostrar-fin').html(html);
                 

              })
              .fail(function() {
                console.log("error");
              })
             
          }

           function buscar_todos(){
            var n = $('#inputcodigo2').val();
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar_todos');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: '../../controllers/seguimiento.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Codigo</th><th style="display:none"></th><th>ambiente</th><th>idSolicitante</th><th>tarea</th><th>fecha_generada</th><th>fecha_requerida</th><th>hora_requerida</th><th>idEstado</th><th>hora_realizada</th><th>observaciones</th></tr></thead><tbody>';
        
                  for(i in resp){ 




                    html+='<tr onclick="mostrar_datos3(this)"><td>'

                    +resp[i].idSol_correctivo+'</td><td>'
                    +resp[i].idAmbiente+'</td><td >'
                    +resp[i].idSolicitante+'</td><td >'
                    +resp[i].tarea+'</td><td>'
                    +resp[i].fecha_generada+'</td><td >'
                    +resp[i].fecha_requerida+'</td><td>'
                    +resp[i].hora_requerida+'</td><td>'
                    +resp[i].idEstado+'</td><td >'
                    +resp[i].hora_realizada+'</td><td >'
                    +resp[i].observaciones+'</td><td >'
                    +resp[i].idUsuario+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';
                  $('#mostrar-todos').html(html);
                 

              })
              .fail(function() {
                console.log("error");
              })
             
          }


           function mostrar_datos(f)
          {
            

              idSol_correctivo= $(f).find('td:eq(0)').text();
              idAmbiente= $(f).find('td:eq(1)').text();
              idSolicitante= $(f).find('td:eq(2)').text();
              tarea= $(f).find('td:eq(3)').text();
              fecha_generada= $(f).find('td:eq(4)').text();
              fecha_requerida= $(f).find('td:eq(5)').text();
              hora_requerida= $(f).find('td:eq(6)').text();
              idEstado= $(f).find('td:eq(7)').text();
              hora_realizada= $(f).find('td:eq(8)').text();
              observaciones= $(f).find('td:eq(9)').text();
              idUsuario= $(f).find('td:eq(10)').text();
              
              $('#man-codigo').val(idSol_correctivo);
              $('#man-lugar').val(idAmbiente);

              //var html5='<label class="col-sm-offset-1 col-sm-4 control-label">Fecha Requerida:</label><div class="col-sm-3"> <input type="date" name="fecha-ca-mod" step="1" min="2015-01-01" max="2020-12-31" value="'+fere_mov+'"></div>'

             // $('#fech').html(html5);
             // $('#mov-estado').val(idso_mov);
              
          }

          function mostrar_datos2(f)
          {
            

              idSol_correctivo= $(f).find('td:eq(0)').text();
              idAmbiente= $(f).find('td:eq(1)').text();
              idSolicitante= $(f).find('td:eq(2)').text();
              tarea= $(f).find('td:eq(3)').text();
              fecha_generada= $(f).find('td:eq(4)').text();
              fecha_requerida= $(f).find('td:eq(5)').text();
              hora_requerida= $(f).find('td:eq(6)').text();
              idEstado= $(f).find('td:eq(7)').text();
              hora_realizada= $(f).find('td:eq(8)').text();
              observaciones= $(f).find('td:eq(9)').text();
              idUsuario= $(f).find('td:eq(10)').text();
              
              $('#fin-codigo').val(idSol_correctivo);
              $('#fin-lugar').val(idAmbiente);
              $('#fin-tipo').val(fecha_generada);
              $('#fin-desc').val(fecha_requerida);
              $('#fin-desc2').val(idUsuario);
          }

          function mostrar_datos3(f)
          {
              idSol_correctivo= $(f).find('td:eq(0)').text();
              idAmbiente= $(f).find('td:eq(1)').text();
              idSolicitante= $(f).find('td:eq(2)').text();
              tarea= $(f).find('td:eq(3)').text();
              fecha_generada= $(f).find('td:eq(4)').text();
              fecha_requerida= $(f).find('td:eq(5)').text();
              hora_requerida= $(f).find('td:eq(6)').text();
              idEstado= $(f).find('td:eq(7)').text();
              hora_realizada= $(f).find('td:eq(8)').text();
              observaciones= $(f).find('td:eq(9)').text();
              idUsuario= $(f).find('td:eq(10)').text();
              
              $('#mod-desc').val(observaciones);
             
          }

          function mod(){

      setTimeout("$('.ocultar').hide();", 5000);
            var o = "a="+encodeURIComponent(idSol_correctivo)+"&opcion="+ encodeURIComponent('mover')+"&estado="+ encodeURIComponent(idEstado);
            console.log(o);
            
              $.ajax({
                url: '../../controllers/seguimiento.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

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

<div id="mostrar-sol-co"></div>

 
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
      <button type="button" class="btn btn-primary">analizar</button>
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
      <button type="button" class="btn btn-primary" onclick="javascript:mod();">Registrar</button>
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

<div id="mostrar-fin"></div>


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
        <input type="text" class="form-control" id="fin-lugar" name="fin-lugar" placeholder="lugar" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fecha Inicio:</label>
      <div class="col-sm-7">
        <input required type="text" class="form-control" id="fin-tipo" name="fin-tipo" placeholder="Fecha" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label">Fecha Fin</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="fin-desc" name="fin-desc" placeholder="Fecha" >
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-offset-1 col-sm-2 control-label"> Responsable</label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="fin-desc2" name="fin-desc2" placeholder="resp" >
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
      <input type="text" class="form-control" id="inputcodigo2" placeholder="Codigo"  >
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

<div id="mostrar-todos"></div>


 
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

