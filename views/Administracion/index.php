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
    <script type="text/javascript">
    	$(document).ready(function() {
    	
            $('#formRegistro').on('submit', RegistrarDatos)
            $('#formModificar').on('submit', modificar_activo)
            $('#buscar-codigo').on('keyup', buscar_teclado_modificar)
            $('#buscar-codigo-eli').on('keyup', buscar_teclado_eliminar)

    	});

function RegistrarDatos(){
      setTimeout("$('.ocultar').hide();", 5000);
          var formData = new FormData($('#formRegistro')[0]); 
          formData.append( 'opcion','registrar');
          console.log(formData);
          console.log(formData.toString());
          $.ajax({
            url: '../../controllers/activo.php',
            type: $('#formRegistro').attr('method'),
            data: formData,
            contentType: false,
            processData: false,
          })
          .done(function(data) {
              var resp = $.parseJSON(data);
            console.log(data);
            console.log(resp);
            if(resp.resp==1){
              var html='<div class="alert alert-success ocultar" role="alert" align="center" >Insertado!</div>';
              $("#formRegistro")[0].reset();
            }
            $('#resultado_reg').html(html);

          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
      }
      function buscar_teclado_modificar(){
            var n = $('#buscar-codigo').val();
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar');//{a: n, opcion:'buscar'};
            console.log(o);
            
              $.ajax({
                url: '../../controllers/activo.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Codigo</th><th style="display:none"></th><th>Nombre</th><th>Descripcion</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idActivo+'</td><td>'
                    +resp[i].nombre_ac+'</td><td style="display:none">'
                    +resp[i].cantidad_ac+'</td><td style="display:none">'
                    +resp[i].idSub_almacen+'</td><td style="display:none">'
                    +resp[i].fecha_caducidad+'</td><td style="display:none">'
                    +resp[i].garantia_valida+'</td><td>'
                    +resp[i].descripcion+'</td><td style="display:none">'
                    +resp[i].idEstado_ac+'</td><td style="display:none">'
                    +resp[i].foto+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';

                  $('#mostrar-tabla-mod').html(html);

              })
              .fail(function() {
                console.log("error");
              })
             
          }
          function mostrar_datos(f)
          {
              cod_mod= $(f).find('td:eq(0)').text();
              nom_mod = $(f).find('td:eq(1)').text();
              cant_mod = $(f).find('td:eq(2)').text();
              sub_mod=$(f).find('td:eq(3)').text();
              feca_mod = $(f).find('td:eq(4)').text();
              fega_mod = $(f).find('td:eq(5)').text();
              desc_mod = $(f).find('td:eq(6)').text();
              ides_mod = $(f).find('td:eq(7)').text();
              foto_mod = $(f).find('td:eq(8)').text();
              console.log(foto_mod);
              var html4='<img src="/sistema_activos/'+foto_mod+'"  alt="..." class="img-rounded" width="200" heigth="200">'
              var html5='<div class="form-group "><label class="col-sm-3 control-label">Fecha Caducidad:</label><div class="col-xs-3"> <input type="date" name="fecha-ca-mod" step="1" min="2015-01-01" max="2020-12-31" value="'+feca_mod+'"></div></div>'
              var html6='<div class="form-group "><label class="col-sm-3 control-label">Fecha Garantia:</label><div class="col-xs-3"><input type="date" name="fecha-ga-mod" step="1" min="2015-01-01" max="2020-12-31" value="'+fega_mod+'"></div></div>'
              

              $('#mod-codigo').val(cod_mod);
              $('#mod-nombre').val(nom_mod);
              $('#mod-cantidad').val(cant_mod);
              $('#mod-almacen').val(sub_mod);
              $('#fecha-ga-mod').val(fega_mod);
              $('#mod-desc').val(desc_mod);
              $('#mod-estado').val(ides_mod);
              $('#mostrar-ima-mod').html(html4);
              $('#mostrar_fecha_ca').html(html5);
              $('#mostrar_fecha_ga').html(html6);
              

          }
          function buscar_teclado_eliminar(){
            var n = $('#buscar-codigo-eli').val();
            console.log(n);
            var o = "a="+encodeURIComponent(n)+"&opcion="+ encodeURIComponent('buscar');//{a: n, opcion:'buscar'};
            console.log(o);
            
             $.ajax({
                url: '../../controllers/activo.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-8" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Codigo</th><th style="display:none"></th><th>Nombre</th><th>Descripcion</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                    html+='<tr onclick="mostrar_datos_eli(this)"><td>'
                    +resp[i].idActivo+'</td><td>'
                    +resp[i].nombre_ac+'</td><td style="display:none">'
                    +resp[i].idSub_almacen+'</td><td>'
                    +resp[i].descripcion+'</td><td style="display:none">'
                    +resp[i].foto+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';

                  $('#mostrar-tabla-eli').html(html);

              })
              .fail(function() {
                console.log("error");
              })
             
          }
          function mostrar_datos_eli(f)
          {
              cod_eli= $(f).find('td:eq(0)').text();
              nom_eli = $(f).find('td:eq(1)').text();
              desc_eli = $(f).find('td:eq(3)').text();
              foto_eli=$(f).find('td:eq(4)').text();
              console.log(foto_eli);
              var html_fo='<img src="/sistema_activos/'+foto_eli+'"  alt="..." class="img-rounded" width="200" heigth="200">'

              $('#eli-codigo').val(cod_eli);
              $('#eli-nombre').val(nom_eli);
              $('#eli-desc').val(desc_eli);
              $('#mostrar-ima-eli').html(html_fo);
              

          }
      function eliminarDatos(){

        setTimeout("$('.ocultar').hide();", 5000);
        console.log(cod_eli);
          $.ajax({
            url: '../../controllers/activo.php',
            type: 'POST',
            data: {idActivo: cod_eli, opcion: 'eliminar'}
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            console.log(data);
            console.log(resp);
            var t= resp.resp;
            if(t==1){
              var html='<div class="alert alert-success ocultar" role="alert" align="center" >Insertado!</div>';
              $("#formEliminar")[0].reset();
            }
            $('#resultado_eli').html(html);
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
      }
      function modificar_activo()
      {
      // var input = $("<input>").attr("type", "hidden").attr("name", "opcion").val("modificar");
      // var input2 = $("<input>").attr("type", "hidden").attr("name", "id").val(cod_mod);
      
      var formData = new FormData($("#formModificar")[0]);
      formData.append( 'opcion','modificar');
          console.log(formData);
          $.ajax({
                type: $('#formModificar').attr('method'),
                url:'../../controllers/activo.php',
                data: formData,
                contentType: false,
                processData: false,
          })
          .done(function(data) {
            var resp = $.parseJSON(data);
            console.log(data);
            console.log(resp);
            var t= resp.resp;
            if(t==1){
              var html='<div class="alert alert-success ocultar" role="alert" align="center" >Modificado!</div>';
              $("#formModificar")[0].reset();
            }
            $('#resultado_mod').html(html);
            
          })
          .fail(function() {
            console.log("error");
          })
          event.preventDefault();
      }
    </script>
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

<form class="form-horizontal" name="eliminar" id="eliminar">
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
<form id="formEliminar">
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

