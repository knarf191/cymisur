
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Diseño de navbar para dispositivos moviles -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bienvenido/a <?php echo strstr($nombre," ",true)?></a>
    </div>

    <!-- Navbar con opciones de menu -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
		        <li><a href="<?php echo base_url();?>app/usuarios">Usuarios</a></li>
		        <li><a href="<?php echo base_url();?>app/empleados">Empleados</a></li>
		        <li><a href="<?php echo base_url();?>app/clientes">Clientes</a></li>
		        <li><a href="<?php echo base_url();?>app/proveedores">Proveedores</a></li>
		        <li><a href="<?php echo base_url();?>app/herramientas">Herramientas</a></li>
            </ul>


	      <form class="navbar-form navbar-left" role="search">
	        <li><a href="<?php echo base_url();?>login_gestor/close_session">Cerrar Sesion</a></li> 
	      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>