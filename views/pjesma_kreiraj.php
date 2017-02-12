<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Kreiranje pjesme</h1>
<hr>
<div class="row">
	<div class="col"></div>
	<div class="col-9">
		<?php if (validation_errors()): ?>
			<div class="alert alert-info">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('pjesma/kreiraj'); ?>
			<div class="form-group">
				<label for="izvodjaci">Izvođač:</label>
				<select class="form-control" name="izvodjaci" id="izvodjaci">
					<option value="0">odabir izvođača</option>
					<?php foreach($izvodjaci as $izvodjac): ?>
						<option value="<?php echo $izvodjac->izvodjac_id; ?>" <?php if (validation_errors()): if ($izvodjac->izvodjac_id == set_value('izvodjaci')): echo 'selected'; endif; endif; ?>><?php echo $izvodjac->naziv; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="naslov">Naslov:</label>
				<input type="text" class="form-control" id="naslov" name="naslov" value="<?php echo set_value('naslov'); ?>" />
			</div>
			<div class="form-group">
				<label for="tablatura">Tablatura:</label>
				<textarea class="form-control" id="tablatura" name="tablatura" rows="50"></textarea>
			</div>
			<button type="submit" class="btn btn-default" name="kreiraj">Kreiraj pjesmu</button>
		<?php echo form_close(); ?>
	</div>
	<div class="col"></div>
</div>