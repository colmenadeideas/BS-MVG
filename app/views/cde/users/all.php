<div class="container">
	<div class="row text-center">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12  hidden-xs">
				<div class="panel panel-default">
					<div class="panel-body">
					 	<div>
							<a href="#users/all" class="action" data-key="action">
								<img src="<?php echo IMG; ?>icon-users.png" class="img-responsive" alt="Usuarios">					
							</a>
						<br>
							<h2>Usuarios</h2>				
						</div>
						<div class="clearfix"></div>
						<div class="well well-sm hidden-sm hidden-xs">
								Usuarios y actividad en el sistema
						</div>
					
					</div>
				</div>		
			</div>
			
			
			<?php $this -> render("cde/users/add");  ?>
			<?php $this -> render("cde/users/edit");  ?>
			
			<?php// $this -> render("cde/filejobs/edit");  ?>
			<?php //$this -> render("cde/services/edit");  ?>
			<?php// $this -> render("cde/supplies/edit");  ?>
			
			
			
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">			
				<div class="head-table head-table-users">
					<h3 class="pull-left">Usuarios del Sistema</h3><i class="glyphicon glyphicon-user icons-small pull-right"></i>
					<a class="btn btn-default btn-xs" data-toggle="modal" href="#add-users"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
				</div>
				<table id="users-list" class="table table-hover">
					<thead>
						<th>Nombre</th>
						<th>username</th>
						<th width="25%"></th>
					</thead>
					
				</table>			
				
			</div>
			
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">			
				<div class="head-table head-table-users">
					<h3 class="pull-left">Actividad Reciente</h3><i class="glyphicon glyphicon-stats icons-small pull-right"></i>
					
				</div>
				<table id="actionlog-list" class="table table-hover table-condensed">
					<thead>
						<th width="95%"></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th width="0"></th>
					</thead>
					
				</table>			
				
			</div>
			
			
		</div>
	</div>
</div>