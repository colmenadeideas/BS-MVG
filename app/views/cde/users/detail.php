<?php foreach ($this->item as $Item) { 
		$id = $Item['id'];
		$tablename =  'users';
		$tablename_fields =  'user_profile';	
		
		
?>

<table class="table table-condensed">
	<tr><td>
		Nombre: <a href="#" class="editable" data-type="text" id="name" data-pk="<?php echo $tablename_fields; ?>-name-<?php echo $id; ?>" ><?php echo $this->item_profile[0]['name']; ?></a>
		</td>
	</tr>
	<tr><td>
			RIF:
			<a href="#" class="editable" id="rif" data-type="text" data-pk="<?php echo $tablename_fields; ?>-rif-<?php echo $id; ?>">
			<?php echo $this->item_profile[0]['rif'];?>
			</a>
	</td></tr>
	<tr><td>
			Teléfono:
			<a href="#" class="editable" id="phone" data-type="text" data-pk="<?php echo $tablename_fields; ?>-phone-<?php echo $id; ?>">
			<?php echo $this->item_profile[0]['phone'];?>
			</a>
	</td></tr>
	<tr><td>
			VIP:
			<a href="#" class="editable" id="vip" data-type="select" data-source="<?php echo URL;?>miweb/vip" data-pk="<?php echo $tablename_fields; ?>-vip-<?php echo $id; ?>">
			<?php echo $this->item_profile[0]['vip'];?>
	</td></tr>
	<tr><td>
			Status:
			<a href="#" class="editable" id="status" data-type="select" data-source="<?php echo URL;?>miweb/status" data-pk="<?php echo $tablename_fields; ?>-status-<?php echo $id; ?>">
			<?php echo $this->item_profile[0]['status'];?>
			</a>
	</td></tr>
	<tr><td></td></tr>	
</table>

<?php } ?>
