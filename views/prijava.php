<?php 
if (isset($_SESSION['korisnicko_ime'])): redirect(base_url(), 'location'); endif; 
?>
<h1>Prijava</h1>
<hr>
<div class="row">
  <div class="col"></div>
  <div class="col-9">
    <?php if (validation_errors() != false): ?>
      <div class="alert alert-info">
        <?php echo validation_errors(); ?>
      </div>
    <?php endif; ?>

    <?php echo form_open('prijava/provjera'); ?>
      <div class="form-group">
        <label for="korisnicko_ime">Korisničko ime:</label>
        <input type="text" class="form-control" id="korisnicko_ime" name="korisnicko_ime">
      </div>
      <div class="form-group">
        <label for="lozinka">Lozinka:</label>
        <input type="password" class="form-control" id="lozinka" name="lozinka">
      </div>
      <button type="submit" class="btn btn-default" name="prijava">Prijava</button>
    </form>
  </div>
  <div class="col"></div>
</div>