<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Kreiranje korisnika</h1>
<hr>
<div class="row">
	<div class="col"></div>
	<div class="col-9">
		<?php if (validation_errors()): ?>
			<div class="alert alert-info">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('korisnik/kreiraj'); ?>
			<div class="form-group">
				<label for="tip_korisnika">Tip korisnika:</label>
				<select class="form-control" name="tip_korisnika" id="tip_korisnika">
					<?php foreach($tipovi_korisnika as $tip_korisnika): ?>
						<option value="<?php echo $tip_korisnika->tip_korisnika_id; ?>" <?php if (validation_errors()): if ($tip_korisnika->tip_korisnika_id == set_value('tip_korisnika')): echo 'selected'; endif; elseif ($tip_korisnika->tip_korisnika_id == 2): echo 'selected'; endif; ?>><?php echo $tip_korisnika->naziv; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
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