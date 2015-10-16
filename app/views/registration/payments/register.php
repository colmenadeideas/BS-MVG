<form id="payment-registration" class="form-modal" >
	<input type="hidden" id="courses_registration_id" name="id" value="<?php echo $this->registration[0]['id'];?>">
	
	<div class="col-sm-10 col-lg-10 col-sm-offset-1">
		<select name="payment-form" class="form-control input-lg" required>
			<option value="" disabled selected>¿Método de pago?</option>
			<option value="Transferencia">Transferencia</option>
			<option value="Depósito">Depósito</option>
			<option value="Efectivo">Efectivo</option>
			<option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
			<option value="Tarjeta de Dédito">Tarjeta de Dédito</option>
		</select>
	</div>

	<div class="col-sm-10 col-lg-10 col-sm-offset-1">
		<input type="text" name="payment-number" placeholder="Nº Planilla ó Transacción" class="form-control input-lg" required>
	</div>

	<div class="col-sm-10 col-lg-10 col-sm-offset-1">
		<select name="payment-bank" class="form-control input-lg" required>
			<option value="" disabled selected>Banco</option>
				<option value="0156">100% BANCO</option>
				<option value="0196">ABN AMRO BANK</option>
				<option value="0172">BANCAMIGA BANCO MICROFINANCIERO, C.A.</option>
				<option value="0171">BANCO ACTIVO BANCO COMERCIAL, C.A.</option>
				<option value="0166">BANCO AGRICOLA</option>
				<option value="0175">BANCO BICENTENARIO</option>
				<option value="0128">BANCO CARONI, C.A. BANCO UNIVERSAL</option>
				<option value="0164">BANCO DE DESARROLLO DEL MICROEMPRESARIO</option>
				<option value="0102">BANCO DE VENEZUELA S.A.I.C.A.</option>
				<option value="0114">BANCO DEL CARIBE C.A.</option>
				<option value="0149">BANCO DEL PUEBLO SOBERANO C.A.</option>
				<option value="0163">BANCO DEL TESORO</option>
				<option value="0176">BANCO ESPIRITO SANTO, S.A.</option>
				<option value="0115">BANCO EXTERIOR C.A.</option>
				<option value="0003">BANCO INDUSTRIAL DE VENEZUELA.</option>
				<option value="0173">BANCO INTERNACIONAL DE DESARROLLO, C.A.</option>
				<option value="0105">BANCO MERCANTIL C.A.</option>
				<option value="0191">BANCO NACIONAL DE CREDITO</option>
				<option value="0116">BANCO OCCIDENTAL DE DESCUENTO.</option>
				<option value="0138">BANCO PLAZA</option>
				<option value="0108">BANCO PROVINCIAL BBVA</option>
				<option value="0104">BANCO VENEZOLANO DE CREDITO S.A.</option>
				<option value="0168">BANCRECER S.A. BANCO DE DESARROLLO</option>
				<option value="0134">BANESCO</option>
				<option value="0177">BANFANB</option>
				<option value="0146">BANGENTE</option>
				<option value="0174">BANPLUS BANCO COMERCIAL C.A</option>
				<option value="0190">CITIBANK.</option>
				<option value="0121">CORP BANCA.</option>
				<option value="0157">DELSUR BANCO UNIVERSAL</option>
				<option value="0151">FONDO COMUN</option>
				<option value="0601">INSTITUTO MUNICIPAL DE CRÉDITO POPULAR</option>
				<option value="0169">MIBANCO BANCO DE DESARROLLO, C.A.</option>
				<option value="0137">SOFITASA</option>
			</select>
			
										
		
		
	</div>
	<div class="col-sm-10 col-lg-10 col-sm-offset-1">
		<input type="text" name="payment-amount" placeholder="por Bs." class="form-control input-lg" required>
	</div>

	<div class="col-sm-10 col-lg-10 col-sm-offset-1">
		<input type="text" name="payment-date" placeholder="Fecha del depósito" data-date-format="DD/MM/YY" required class="form-control input-lg datetimepicker left"/>
		<i class="glyphicon glyphicon-calendar add-on right"></i>
	</div>
	
	<?php if($this->registration[0]['code'] != NULL ) {?>

	<div class="col-sm-10 col-lg-10 col-sm-offset-1">
		<input type="text" name="payment-code" placeholder="Codigo de descuento" class="form-control input-lg">
	</div>
	<?php } ?>

	<input type="submit" name="submit" class="btn btn-success btn-lg pull-right send" value="Registrar Pago">
	<div class="clearfix"></div>
</form>