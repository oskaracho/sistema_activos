<!-- Banda de Presentacion  -->

	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    	<!-- Brand and toggle get grouped for better mobile display -->
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand" href="/sistema_activos/index.php"> Inicio</a>
    		</div>

    		<!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      		<ul class="nav navbar-nav">
            <li><a href="/sistema_activos/views/Administracion">Administracion<span class="sr-only">(current)</span></a></li>
            <li><a href="/sistema_activos/views/Movimientos">Movimientos<span class="sr-only"></span></a></li>
            <li><a href="/sistema_activos/views/Inventario">Inventario<span class="sr-only"></span></a></li>
            <li><a href="/sistema_activos/views/Seguimiento">Seguimiento<span class="sr-only"></span></a></li>
            <li><a href="/sistema_activos/views/Mantenimiento">Mantenimiento<span class="sr-only"></span></a></li>
            <li><a href="/sistema_activos/views/Almacen">Almacenes<span class="sr-only"></span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right" <?php if (isset($_SESSION['id_usu']))
  {
    echo ' style="display:none"';
  }
   ?>>
            <li><a href="" class="modal1" data-toggle="modal" data-target="#registromodal">Registrarse</a></li>
            <li><a href="" class="modal1" data-toggle="modal" data-target="#modalingreso">Ingresar</a></li>
          </ul>
          <div class="iniciado">
          <ul class="nav navbar-nav navbar-right" <?php if (!isset($_SESSION['id_usu']))
  {
    echo ' style="display:none"';
  }
   ?>>
               <li><a href="" ><?php echo $_SESSION['nombre']; ?> <?php echo $_SESSION['apellido']; ?></a></li>
            <li><a href="/sistema_activos/index.php" class="modal1" id="cerrar">Cerrar Sesion</a></li>
          </ul>
          </div>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</div>


<!-- Formulario modal login -->
<div class="modal fade" id="modalingreso" tabindex="-1" role="dialog" aria-labelledby="modalingreso">
    <div class="modal-dialog" role="document">
    	<div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title" id="myModalLabel">Ingreso</h4>
     		</div>
           
          	<div class="modal-body">
            	<form class="form-horizontal" method="post" name="login_form">
					<div class="form-group">
    					<label class="col-sm-2 col-sm-offset-1 control-label">CI:</label>
  					  	<div class="col-sm-7">
    						<input type="text" class="form-control" id="inputCi" name="inputCi" placeholder="Carnet de identidad" required>
   					 	</div>
 			 		</div>

 			 		<div class="form-group">
    					<label class="col-sm-2 col-sm-offset-1 control-label">Password:</label>
  					  	<div class="col-sm-7">
    						<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
   					 	</div>
 			 		</div>

 			 		<div class="form-group">
			    		<div class="col-sm-offset-3 col-sm-7">
			      			<button type="button" onclick="javascript:inicio_sesion();" class="btn btn-success">Ingresar</button>
			    		</div>
			  		</div>
              	</form>
          	</div>

          	<div class="modal-footer">
          		<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          	</div>
        </div>
	</div>
</div>

<!-- Formulario modal registro -->

<div class="modal fade" id="registromodal" tabindex="-1" role="dialog" aria-labelledby="registromodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formulario de Registro</h4>
      </div>
      <div class="modal-body">
        <!-- Formulario de registro -->
        <form class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nombre:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nombrecoach" placeholder="Juan" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Apellido P.:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="apellidopcoach" placeholder="Perez" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Apellido M.:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="apellidomcoach" placeholder="Lopez" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Fecha de Nacimiento:</label>
          <div class="col-sm-10">
            <input type="date" id="fechainiprepa" step="1" min="1940-01-01" max="2000-12-31" value="<?php echo date("Y-m-d");?>">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Carnet:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="carnet" placeholder="6482974" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Telefono:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="telefono" placeholder="78595241" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Correo:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="mailcoach" placeholder="juan.perez@ejemplo.com" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="passwordcoach" placeholder="**********" required>
          </div>
         </div>
         <div class="form-group">
          <label class="col-sm-2 control-label">Confirmar Password:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password2coach" placeholder="**********" required>
          </div>
         </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button id="btnregistro" type="submmit" class="btn btn-success">Registrar</button>
          </div>
        </div>
      </form>
      
      </div>
      <div class="modal-footer">
        <button type="reset" class="btn btn-primary">Limpiar Campos</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>