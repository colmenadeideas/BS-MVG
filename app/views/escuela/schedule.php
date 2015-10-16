<div class="well well-sm">
	<!--h4></h4-->
	<button class="btn btn-success" onclick="printdocs()"><i class="glyphicon glyphicon-print"></i> Imprimir Horario </button>
</div>
<div id="printable-area">
<?php $this->insert('registration/documentation/schedule/'.$this->course_group[0]['slug']."/". $this->course_group[0]['horario-slug'].'.jpg'); ?>
</div>