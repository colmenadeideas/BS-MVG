<div id="add-users" class="modal fade" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header head head-users">
				
				<div class="left">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button><h3>Agregar Usuario</h3>
					<i class="glyphicon glyphicon-user icons"></i>
				</div>
				
			</div>
			<div class="modal-body">
				<form id="form" action="" method="post" class="form-horizontal add-users">
					
					<div class="form-group">
						<label for="name" class="hidden-xs col-sm-3 control-label">Nombre</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" required>
					    </div>
					</div>
					<div class="form-group">
						<label for="rif" class="hidden-xs col-sm-3 control-label">Cédula o RIF</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="rif" name="rif" required>
					    </div>
					</div>
					<div class="form-group">
						<label for="email" class="hidden-xs col-sm-3 control-label">Email</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
					    </div>
					</div>
					<div class="form-group">
						<label for="phone" class="hidden-xs col-sm-3 control-label">Teléfono</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" >
					    </div>
					</div>
					
					<div class="form-group">
						<label for="role" class="hidden-xs col-sm-3 control-label">Rol</label>
					    <div class="col-sm-9">
						<select id="role" name="role" data-placeholder="Rol del Usuario" class="chosen-select form-control" required>					
							<option value="admin">admin</option>
							<option value="administracion">administracion</option>
							<option value="operario" selected="selected">operario</option>
							<option value="cliente">cliente</option>
						</select>
						</div>
					</div>
					<input type="hidden" id="status" name="status" value="active" />
					<div class="form-group">
						<label for="role" class="hidden-xs col-sm-3 control-label">VIP</label>
					    <div class="col-sm-9">
						<select id="vip" name="vip" data-placeholder="Usuario VIP" class="chosen-select form-control" required>					
							<option value="0">No</option>
							<option value="1">Si</option>
							
						</select>
						</div>
					</div>
					
					<em> El Usuario será notificado por correo y recibirá instrucciones para su clave</em><br>
					<div class="form-group">
					    <div class="col-lg-5 col-xs-12 pull-right">
					      <button type="submit" class="btn btn-default btn-wide send">Agregar</button>
					    </div>
					  </div>
				</form>
			</div>
		</div>
	</div>	
</div>