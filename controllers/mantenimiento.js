    	$(document).ready(function() {
    	
            buscar_teclado_modificar();
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
            url: '../../controllers/mantenimiento.php',
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
                url: 'mantenimiento.php',
                type: 'POST',
                data: o
              })
              .done(function(data2) {
                var resp = $.parseJSON(data2);//json a objeto
                console.log(data2);
                console.log(resp);

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-10" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Codigo</th><th style="display:none"></th><th>Nombre</th><th>Descripcion</th></tr></thead><tbody>';
        
                  for(i in resp){ 
                    html+='<tr onclick="mostrar_datos(this)"><td>'
                    +resp[i].idSol_preventivo+'</td><td>'
                    +resp[i].idAmbiente+'</td><td style="display:none">'
                    +resp[i].idActivo+'</td><td style="display:none">'
                    +resp[i].tarea+'</td><td style="display:none">'
                    +resp[i].fecha_generada+'</td><td style="display:none">'
                    +resp[i].fecha_requerida+'</td><td>'
                    +resp[i].idSolicitante+'</td><td style="display:none">'
                    +resp[i].idEstado+'</td><td style="display:none">'
                    +resp[i].idUsuario+'</td></tr>';
                  }
                  html+= '</tbody></table></div>';

                  $('#mostrar2').html(html);

              })
              .fail(function() {
                console.log("error");
              })
             
          }
          function mostrar_datos(f)
          {
              regcod_mod= $(f).find('td:eq(0)').text();
              regam_mod = $(f).find('td:eq(1)').text();
              regtman_mod = $(f).find('td:eq(2)').text();
              regdesc_mod=$(f).find('td:eq(4)').text();
              fesol_mod = $(f).find('td:eq(5)').text();
              reges_mod = $(f).find('td:eq(6)').text();
              
              
              $('#reg-cod').val(regcod_mod);
              $('#reg-ambiente').val(regam_mod);
              $('#reg-tman').val(regtman_mod);
              $('#reg-desc').val(regdesc_mod);
              $('#fecha-req').val(fesol_mod);
              $('#reg-estado').val(reges_mod);
             
              

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

                var html = '<div class="table-responsive col-sm-offset-2 col-sm-10" style="height: 200px; overflow-y:scroll;" class="table table-hover"><table class="table table-hover"><thead><tr><th>Codigo</th><th style="display:none"></th><th>Nombre</th><th>Descripcion</th></tr></thead><tbody>';
        
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
