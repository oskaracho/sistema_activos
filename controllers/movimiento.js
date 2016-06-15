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
                  var boton='<a class=" col-sm-2 " href="/sistema_activos/tcpdf/too/Prestamo.php?mov='+codsol_mov+'" target="_blank"><h4>IMPRIMIR</h4></a>';
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