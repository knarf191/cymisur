
	<div class="main-sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-brand">
				<a>Bienvenido/a <?php echo strstr($nombre," ",true)?></a>
			</li>
			
			<li>
				<a href="<?php echo base_url();?>dashboard/administradores">
					<i class="fa fa-users"></i>
					<span>Administradores</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>dashboard/clientes">
					<i class="fa fa-suitcase"></i>
					<span>Clientes</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>dashboard/galeria">
					<i class="fa fa-paint-brush"></i>
					<span>Galeria</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>login/close_session">
				<span>Cerrar Sesion</span>
				</a>
			</li>								
		</ul>
	</div>		
	