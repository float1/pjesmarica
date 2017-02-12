<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Kreiranje izvođača</h1>
<hr>
<div class="row">
	<div class="col"></div>
	<div class="col-9">
		<?php if (validation_errors()): ?>
			<div class="alert alert-info">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('izvodjac/kreiraj'); ?>
			<div class="form-group">
				<label for="naziv">Naziv:</label>
				<input type="text" class="form-control" id="naziv" name="naziv" value="<?php echo set_value('naziv'); ?>" />
			</div>
			<button type="submit" class="btn btn-default" name="kreiraj">Kreiraj izvođača</button>
		<?php echo form_close(); ?>
	</div>
	<div class="col"></div>
</div>