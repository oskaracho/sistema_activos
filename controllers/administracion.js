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
