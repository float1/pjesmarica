<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Moji podaci</h1>
<hr>

<div class="row">
	<div class="col"></div>
	<div class="col-9">
		<?php if (validation_errors()): ?>
			<div class="alert alert-info">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('korisnik/promjena_lozinke/'.$korisnik['korisnik_id']); ?>
			<div class="form-group">
				<label for="trenutna_lozinka">Trenutna lozinka:</label>
				<input type="password" class="form-control" id="trenutna_lozinka" name="trenutna_lozinka" value="<?php echo set_value('trenutna_lozinka'); ?>" />
			</div>
			<div class="form-group">
				<label for="nova_lozinka">Nova lozinka:</label>
				<input type="password" class="form-control" id="nova_lozinka" name="nova_lozinka" />
			</div>
			<button type="submit" class="btn btn-default" name="kreiraj">Promijeni lozinku</button>
		<?php echo form_close(); ?>
	</div>
	<div class="col"></div>
</div>