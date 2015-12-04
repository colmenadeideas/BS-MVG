<form id="newsletter" action="" novalidate="novalidate">
	<div class="col-lg-6 col-sm-6">
		<input type="email" name="email" placeholder="Escribe tu email" class="form-control input-lg" required />
		<input type="hidden" name="interests" value="<?php echo $this->course[0]['name']; ?>" />
	</div>
	<div class="col-lg-1 col-sm-1">
		<button type="submit" class="btn btn-info btn-lg">Enviar</button>
	</div>
	
</form>
