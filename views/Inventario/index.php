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
	<title>Inventario</title>
	<link rel="stylesheet" href="/sistema_activos/bootstrap-3.3.6-dist/css/bootstrap.css">
    <script src="/sistema_activos/bootstrap-3.3.6-dist/jquery.js"></script>
    <script src="/sistema_activos/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
    <script src="/sistema_activos/bootstrap-3.3.6-dist/jquery.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
        buscar_teclado_inventario();
        $("#inv-localizacion").change(function(){
          console.log($("#inv-localizacion").val());
          $.ajax({
            url:"../../clases/select_inv.php",
            type: "POST",
            data:"local="+$("#inv-localizacion").val(),
            success: function(ambiente){
              console.log(ambiente);
              $("#inv-ambiente").html(ambiente);
            }
          })
        });
        $("#inv-ambiente").change(function(){
          if($("#inv-ambiente").val()==34 ){
          $.ajax({
            url:"../../clases/select_inv.php",
            type: "POST",
            data:"almacen="+$("#inv-ambiente").val(),
            success: function(almacen){
              console.log(almacen);
              var selec_al='<div class="form-group"><label class="col-sm-offset-2 col-sm-3 control-label">Tipo Almacen</label><div class="col-sm-3"><select class="form-control" id="inv-almacen" name="inv-almacen"></select></div></div>'
              $('#almacenes').html(selec_al);
              $("#inv-almacen").html(almacen);
              $('#almacenes').show();
            }
          })
        }else{
            $('#almacenes').hide();
        }
        });
      })
     
  function registrar_inventario(){
        var local=$("#inv-localizacion").val();
        var fecha=$("#fecha-inven").val();
        var ambiente=$("#inv-ambiente").val();
        if(local==10 && ambiente==34){
        var ambi=$("#inv-almacen").val();
        }else{
            var ambi=$("#inv-ambiente").val();
        }
              o = "&opcion=" + encodeURIComponent('tabla_llena');

var o="opcion="+ encodeURIComponent('registrar')+"&idAmbiente="+encodeURIComponent(ambi)+"&fecha_ejecucion="+encodeURIComponent(fecha);
console.log(o);
        $.ajax({
            url:"../../controllers/inventario.php",
            type: "POST",
            data:o,
            success: function(data){
              console.log(data);
              var resp = $.parseJSON(data);
              if(resp=1){
              var html='<div class="alert alert-success ocultar" role="alert" align="center" >Insertado!</div>';
              $("#formInventario")[0].reset();
            }
            $('#resultado_reg_inv').html(html);
            }
          })
  }
  function buscar_teclado_inventario(){
            var o = "opcion="+ encodeURIComponent('buscar_sol_inv');//{};
            console.log(o);
            
              $.ajax({
                url: '../../controllers/inventario.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-12" style="height: 250px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Cod-Sol</th><th>Ambiente</th><th>Fecha Ejecucion</th><th>Estado</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                    if(resp[i].idEstado_in==1){var estado="A Realizar";
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idInventario_am+'</td><td style="display:none">'
                    +resp[i].idAmbiente+'</td><td>'
                    +resp[i].nom_am+'</td><td>'
                    +resp[i].fecha_ejecucion+'</td><td style="display:none">'
                    +resp[i].idEstado_in+'</td><td class="success">'
                    +estado+'</td></tr>';
                  }
                    if(resp[i].idEstado_in==2){var estado="Observado";
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idInventario_am+'</td><td style="display:none">'
                    +resp[i].idAmbiente+'</td><td>'
                    +resp[i].nom_am+'</td><td>'
                    +resp[i].fecha_ejecucion+'</td><td style="display:none">'
                    +resp[i].idEstado_in+'</td><td class="info">'
                    +estado+'</td></tr>';
                  }
                  if(resp[i].idEstado_in==3){var estado="Realizado";
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idInventario_am+'</td><td style="display:none">'
                    +resp[i].idAmbiente+'</td><td>'
                    +resp[i].nom_am+'</td><td>'
                    +resp[i].fecha_ejecucion+'</td><td style="display:none">'
                    +resp[i].idEstado_in+'</td><td class="danger">'
                    +estado+'</td></tr>';
                  }
                }
                  html+= '</tbody></table></div>';

                  $('#tabla_inventarios').html(html);

              })
              .fail(function() {
                console.log("error");
              })
             
          }
          function mostrar_datos(f)
          {
              codsol_inv= $(f).find('td:eq(0)').text();
              idam_inv = $(f).find('td:eq(1)').text();
              fech_inv = $(f).find('td:eq(3)').text();
              est_inv=$(f).find('td:eq(4)').text();
              ambi=$(f).find('td:eq(2)').text();
              var impri=' <div class="col-sm-2"><a  href="/sistema_activos/tcpdf/too/Inventario.php?inv='+codsol_inv+'" target="_blank"><h4>IMPRIMIR</h4></a></div>';
              $('#impri').html(impri);
              $('#inv-amb').val(ambi);
              $('#inv-fecha').val(fech_inv);

          }
    </script>   
</head>
<body>
<?php 
      include("../../clases/select_inv.php");

?>
<!--  llamada a la cabecera -->
 	<?php 
    require_once ("../../../sistema_activos/barramenusr.php");
  ?>

<!-- Contenedor Pestaña ABM Activo -->
<div class="col-sm-offset-2 col-sm-8">
<div class="panel panel-primary">
  <div class="panel-heading">Inventarios</div>
  <div class="panel-body">


<!-- Pestaña ABM Activo -->

<ul class="nav nav-tabs" role="tablist">
 <li class="active"><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-first">Inventarios</a></li>
  <li><a href="javascript:;" role="tab" data-toggle="tab" data-target="#tabs-second">Detalles</a></li>
</ul>
<!-- Contenido Pestaña ABM Activo -->
<div class="tab-content">

<!-- Contenido Pestaña movistrar Activo-->

 <div class="active tab-pane fade in" id="tabs-first">
  
<!-- FORM CREAR Activo -->
<h4 align="center"> Programacion de Inventarios</h4>

  <form class="form-horizontal" id="formInventario" method="POST" enctype="multipart/form-data">
  
  <br>
  <div class="form-group">
    <label class="col-sm-offset-2 col-sm-3 control-label">Localizacion</label>
    <div class="col-sm-3">
      <select required  class="form-control" id="inv-localizacion" name="mov-ambiente">
      <?php echo $localizacion;  ?> 
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-offset-2 col-sm-3 control-label">Ambiente</label>
    <div class="col-sm-3">
      <select required  class="form-control" id="inv-ambiente" name="inv-ambiente">
      
      </select>
    </div>
  </div>
  <div id="almacenes"></div>
    <div class="form-group">
      <div id="fech">
            <label class="col-sm-offset-1 col-sm-4 control-label">Fecha Requerida:</label>
          <div class="col-sm-3">
            <input type="date" name="fecha-inven" id="fecha-inven" step="1" min="2015-01-01" max="2020-12-31" value="<?php echo date("Y-m-d");?>" required>
          </div> 
      </div>             
  </div>

  
<br><br>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-danger">Rechazar</button>
    </div>
    <div class="col-sm-offset-1 col-sm-2">
      <button type="button" onclick="javascript:registrar_inventario();" class="btn btn-success">Aceptar</button>
    </div>
  </div>
<div id="resultado_reg_inv"></div>
   
</form>
 <!-- FIN FORM CREAR Activo -->

 </div>

<!-- Fin Contenido Pestaña movistrar Activo-->

<!--  Contenido Pestaña modificar Activo-->

 <div class="tab-pane fade" id="tabs-second">


  <!-- FORM MODIFICAR Activo -->
<h4 align="center"> Seguimiento Inventarios</h4>
<div class="form-group">
    
<div id="tabla_inventarios"></div>
  </div>
  <form class="form-horizontal" id="formMovimentos" method="POST" enctype="multipart/form-data">
  

    <div class="form-group" >
      <label class="col-sm-offset-3 col-sm-2 control-label">Ambiente:</label>
      <div class="col-sm-3">
        <input required readonly type="text" class="form-control" id="inv-amb" name="inv-amb" placeholder="Codigo "  >
      </div>
    </div>
    <div class="form-group" >
      <label class="col-sm-offset-3 col-sm-2 control-label">Fecha:</label>
      <div class="col-sm-3">
        <input required readonly type="text" class="form-control" id="inv-fecha" name="inv-fecha" placeholder="Cantidad "  >
      </div>
    </div>
  
<br><br>

  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-2">
      <button type="button" class="btn btn-danger">Rechazar</button>
    </div>
    <div id="impri"></div>
    <div class=" col-sm-2">
      <button type="button" onclick="javascript:aceptar_inv();" class="btn btn-success">Realizado</button>
    </div>
    <div id="imprimir_boton"></div>
  </div>
<div id="mostrar_mensaje_mov"></div>
   
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

