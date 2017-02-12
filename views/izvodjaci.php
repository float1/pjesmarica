<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Izvođači (<?php echo $broj_izvodjaca; ?>)</h1>
<hr>
<a href="<?php echo base_url('index.php/izvodjac/kreiraj'); ?>" class="btn btn-primary">Novi izvođač</a>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Naziv</th>
      <th>Radnja</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($izvodjaci as $izvodjac): ?>
    	<tr>
      		<th scope="row"></th>
      		<td><?php echo $izvodjac->naziv; ?></td>
      		<td>
      			<a href="<?php echo base_url('index.php/izvodjac/uredi/'.$izvodjac->izvodjac_id); ?>" class="btn btn-primary">Uredi</a>
      			<a href="<?php echo base_url('index.php/izvodjac/brisi/'.$izvodjac->izvodjac_id); ?>" class="btn btn-danger" onclick="return confirm('Brisanje korisnika?')">Briši</a>
      		</td>
    	</tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>
<ul class="pagination">
	<?php echo $paginacija; ?>
</ul>