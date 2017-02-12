<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Uređivanje korisnika</h1>
<hr>
<div class="row">
	<div class="col"></div>
	<div class="col-9">
		<?php if (validation_errors()): ?>
			<div class="alert alert-info">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('korisnik/uredi/'.$korisnik['korisnik_id']); ?>
			<div class="form-group">
				<label for="tip_korisnika">Tip korisnika:</label>
				<select class="form-control" name="tip_korisnika" id="tip_korisnika">
					<?php foreach($tipovi_korisnika as $tip_korisnika): ?>
						<option value="<?php echo $tip_korisnika->tip_korisnika_id; ?>" <?php if (validation_errors()): if ($tip_korisnika->tip_korisnika_id == set_value('tip_korisnika')): echo 'selected'; endif; elseif ($tip_korisnika->tip_korisnika_id == $korisnik['tip_korisnika_tip_korisnika_id']): echo 'selected'; endif; ?>><?php echo $tip_korisnika->naziv; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="korisnicko_ime">Korisničko ime:</label>
				<input type="text" class="form-control" id="korisnicko_ime" name="korisnicko_ime" value="<?php echo $korisnik['korisnicko_ime']; ?>" />
			</div>
			<button type="submit" class="btn btn-default" name="azuriraj">Ažuriraj korisnika</button>
		<?php echo form_close(); ?>
	</div>
	<div class="col"></div>
</div>
<?php echo set_value('korisnicko_ime'); ?>