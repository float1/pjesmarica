<?php 
if (!isset($_SESSION['korisnicko_ime'])): redirect(base_url('index.php/prijava'), 'location'); endif; 
?>
<h1>Pjesme (<?php echo $broj_pjesama; ?>)</h1>
<hr>
<a href="<?php echo base_url('index.php/pjesma/kreiraj'); ?>" class="btn btn-primary">Nova pjesma</a>
<hr>
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Naslov</th>
      <th>Izvođač</th>
      <th>Radnja</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pjesme as $pjesma): ?>
    	<tr>
      		<th scope="row"></th>
      		<td><?php echo $pjesma->naslov; ?></td>
      		<td><?php echo $pjesma->naziv; ?></td>
      		<td>
      			<a href="<?php echo base_url('index.php/pjesma/uredi/'.$pjesma->pjesma_id); ?>" class="btn btn-primary">Uredi</a>
      			<a href="<?php echo base_url('index.php/pjesma/brisi/'.$pjesma->pjesma_id); ?>" class="btn btn-danger" onclick="return confirm('Brisanje pjesme?')">Briši</a>
      		</td>
    	</tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>
<ul class="pagination">
  <?php echo $paginacija; ?>
</ul>