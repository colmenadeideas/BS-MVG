<div class="modal-header"></div>
<div class="modal-body text-center">
	<h4>Enviar Comentarios y Correcciones<br>
		<small>Envía algunos comentarios indicando la razón del rechazo</small>
	</h4>
	<form id="cronograma-reject" method="post">
        <input type="text" name="id_cronograma" required="required" value="<?php echo $this->activities[0]['id_cronograma']; ?>">
        <input type="text" name="from_usuario" required="required"  value="<?php echo $this->userdata['id']; ?>">
        <textarea name="comment" class="form-control" placeholder="Ingrese su comentario..." rows="5" required></textarea>
	</form> 
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		Cancelar
	</button>
	<input type="submit" name="send" class="btn btn-success send" value="Enviar Comentarios">
</div>