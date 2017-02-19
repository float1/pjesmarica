<h1>Kreiranje admina</h1>
<hr>
<div class="row">
	<div class="col"></div>
	<div class="col-9">
		<?php if (validation_errors()): ?>
			<div class="alert alert-info">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('instalacija/index'); ?>
			<div class="form-group">
				<label for="korisnicko_ime">Korisničko ime:</label>
				<input type="text" class="form-control" id="korisnicko_ime" name="korisnicko_ime" value="<?php echo set_value('korisnicko_ime'); ?>" />
			</div>
			<div class="form-group">
				<label for="lozinka">Lozinka:</label>
				<input type="text" class="form-control" id="lozinka" name="lozinka" />
			</div>
			<button type="submit" class="btn btn-default" name="kreiraj">Kreiraj korisnika</button>
		<?php echo form_close(); ?>
	</div>
	<div class="col"></div>
</div>