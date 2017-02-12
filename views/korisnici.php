<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Korisnici (<?php echo $broj_korisnika; ?>)</h1>
<hr>
<a href="<?php echo base_url('index.php/korisnik/kreiraj'); ?>" class="btn btn-primary">Novi korisnik</a>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Tip korisnika</th>
      <th>Korisničko ime</th>
      <th>Radnja</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($korisnici as $korisnik): ?>
    	<tr>
      		<th scope="row"></th>
      		<td><?php if ($korisnik->tip_korisnika_tip_korisnika_id == 1): echo 'Administrator'; elseif ($korisnik->tip_korisnika_tip_korisnika_id == 2): echo 'Korisnik'; endif; ?></td>
      		<td><?php echo $korisnik->korisnicko_ime; ?></td>
      		<td>
      			<a href="<?php echo base_url('index.php/korisnik/uredi/'.$korisnik->korisnik_id); ?>" class="btn btn-primary">Uredi</a>
      			<a href="<?php echo base_url('index.php/korisnik/brisi/'.$korisnik->korisnik_id); ?>" class="btn btn-danger" onclick="return confirm('Brisanje korisnika?')">Briši</a>
      		</td>
    	</tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>