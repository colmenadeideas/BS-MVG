<div class="col-lg-12 col-xs-12 jumbotron">
	<h2>Inscripciones en Curso</h2>
</div>
<div class="col-lg-12 col-xs-12">
	<button class="btn btn-info" id="boton_imprimir_pendientes">Imprimir Pendientes</button><br><br>
	<table id="registrations-all-list" class="table table-hover table-list">
		<thead>
			<th width="50px">#Código</th>
			<th>Curso</th>
			<th width="25%">Grupo</th>
			<th>Nombre</th>
			<th></th>
			<th>Fecha</th>
			<th>Status</th>
			<th width="200px"></th>
		</thead>
	</table>
</div>
<?php $this->render('students/edit-loadarea'); ?>
<?php $this->render('students/modal-loadarea'); ?>
<?php $this->render('students/confirm-approve'); ?>
<?php $this->render('students/confirm-completation'); 
// ?>
<div id="myPrintArea" >
	<table class="table-condensed">
	<tr><td>#Codigo</td><td>Curso</td><td>Nombre</td><td>TLF</td></tr>
	<?php 
	foreach ($this->pendientes as $pendientes) {
		$alumno=json_decode($pendientes["data"]);//var_dump($alumno);
		?>
		<tr><td><?php echo $pendientes["student_id"]; ?></td><td><?php echo $pendientes["name"]; ?></td><td><?php echo  $pendientes["student_name"]." ";echo  $pendientes["student_lastname"]; ?></td><td><?php echo $alumno->phonenumber."<br>";echo $alumno->cellphone; ?></td></tr>
		<?php
	}
	?>
</table>
</div>
