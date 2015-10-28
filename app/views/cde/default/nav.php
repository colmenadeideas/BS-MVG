<div class="col-sm-3 col-lg-3 affix-sidebar">
	<div class="sidebar-nav">
		<div class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<span class="visible-xs navbar-brand">MVG Sistema</span>
			</div>
			<div class="navbar-collapse collapse sidebar-navbar-collapse">
				<ul class="nav navbar-nav navegacion" id="sidenav01">
					<li class="active">
						<img class="img-responsive" src="<?php echo IMG; ?>modelsview-logo.gif">
						
						<a href="#" data-toggle="collapse" data-target="#configmenu" data-parent="#sidenav01" class="collapsed"> 
												 Configuración <i class="glyphicon glyphicon-cog"></i>
						</a>
						<div class="collapse" id="configmenu" style="height: 0px;">
							<ul class="nav nav-list">
								<li>
									<a href="#">Cambiar contraseña</a>
								</li>
								<li>
									<a href="#">Modificar mis Datos</a>
								</li>
							</ul>
						</div>
					</li>
					
					<?php foreach ($this->menu as $Menu) { 
												
							if (@is_array($Menu['children'])) { // Build dropdown <li> ?>
						<li>
							<a data-toggle="collapse" data-target="#menulink<?php echo $Menu['id']; ?>" class="collapsed"> 
								<span class="glyphicon glyphicon-<?php echo $Menu['icon']; ?>">&nbsp;</span> <?php echo $Menu['name']; ?><span class="caret pull-right"></span> 
							</a>
							<div class="collapse" id="menulink<?php echo $Menu['id']; ?>" style="height: 0px;">
								<ul class="nav nav-list">
								<?php  foreach($Menu['children'] as $Submenu) { //build submenu <li> ?>
									<li>
										<a href="#<?php echo $Submenu['url']; ?>"><i class="glyphicon glyphicon-<?php echo $Submenu['icon']; ?> hidden-xs">&nbsp;</i><?php echo $Submenu['name']; ?></a>
									</li>
								<?php  } ?>
								</ul>
							</div>
						</li>
						<?php } else {  //Build normal <li> ?>
						<li>
							<a href="#<?php echo $Menu['url']; ?>"><i class="glyphicon glyphicon-<?php echo $Menu['icon']; ?> hidden-xs">&nbsp;</i><?php echo $Menu['name']; ?></a>
						</li>
						<?php } ?>
						<!--a href="#"> <span class="glyphicon glyphicon-calendar"></span> Inscripción</a>
						
						<a href="#"><span class="glyphicon glyphicon-calendar"></span> Notificaciones <span class="badge pull-right">42</span></a-->					
					<?php  }?>	
					<li>
						<a href="<?php echo URL; ?>account/logout"  <span class="glyphicon glyphicon-log-out"></span> Salir </a>
						
					</li>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
<div id="desktop" class="col-sm-9 col-lg-9">
	<div id="preloader">
  		 <div class="timer-loader"></div>
	</div>