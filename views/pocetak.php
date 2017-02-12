<h1>Početak</h1>
<hr>
<a href="<?php echo base_url('index.php/pocetak/abc/a') ?>" class="btn btn-primary">A</a>
<a href="<?php echo base_url('index.php/pocetak/abc/b') ?>" class="btn btn-primary">B</a>
<a href="<?php echo base_url('index.php/pocetak/abc/c') ?>" class="btn btn-primary">C/Č/Ć</a>
<a href="<?php echo base_url('index.php/pocetak/abc/d') ?>" class="btn btn-primary">D</a>
<a href="<?php echo base_url('index.php/pocetak/abc/e') ?>" class="btn btn-primary">E</a>
<a href="<?php echo base_url('index.php/pocetak/abc/f') ?>" class="btn btn-primary">F</a>
<a href="<?php echo base_url('index.php/pocetak/abc/g') ?>" class="btn btn-primary">G</a>
<a href="<?php echo base_url('index.php/pocetak/abc/h') ?>" class="btn btn-primary">H</a>
<a href="<?php echo base_url('index.php/pocetak/abc/i') ?>" class="btn btn-primary">I</a>
<a href="<?php echo base_url('index.php/pocetak/abc/j') ?>" class="btn btn-primary">J</a>
<a href="<?php echo base_url('index.php/pocetak/abc/k') ?>" class="btn btn-primary">K</a>
<a href="<?php echo base_url('index.php/pocetak/abc/l') ?>" class="btn btn-primary">L</a>
<a href="<?php echo base_url('index.php/pocetak/abc/m') ?>" class="btn btn-primary">M</a>
<a href="<?php echo base_url('index.php/pocetak/abc/n') ?>" class="btn btn-primary">N</a>
<a href="<?php echo base_url('index.php/pocetak/abc/o') ?>" class="btn btn-primary">O</a>
<a href="<?php echo base_url('index.php/pocetak/abc/p') ?>" class="btn btn-primary">P</a>
<a href="<?php echo base_url('index.php/pocetak/abc/r') ?>" class="btn btn-primary">R</a>
<a href="<?php echo base_url('index.php/pocetak/abc/s') ?>" class="btn btn-primary">S/Š</a>
<a href="<?php echo base_url('index.php/pocetak/abc/t') ?>" class="btn btn-primary">T</a>
<a href="<?php echo base_url('index.php/pocetak/abc/u') ?>" class="btn btn-primary">U</a>
<a href="<?php echo base_url('index.php/pocetak/abc/v') ?>" class="btn btn-primary">V</a>
<a href="<?php echo base_url('index.php/pocetak/abc/z') ?>" class="btn btn-primary">Z/Ž</a>
<a href="<?php echo base_url('index.php/pocetak/abc/y') ?>" class="btn btn-primary">Y</a>
<a href="<?php echo base_url('index.php/pocetak/abc/x') ?>" class="btn btn-primary">X</a>
<hr>
<?php if (isset($izvodjaci_abc)): ?>
	<div class="list-group">
		<?php foreach ($izvodjaci_abc as $izvodjac_abc): ?>

				<a href="<?php echo base_url('index.php/pocetak/pjesme/'.$izvodjac_abc->izvodjac_id); ?>" class="list-group-item list-group-item-action"><?php echo $izvodjac_abc->naziv; ?></a>
			
		<?php endforeach; ?>
	</div>
<?php endif; ?>
<?php if (isset($tab)): ?>
	<h1><?php echo $tab['naslov']; ?></h1>
	<h2><?php echo $tab['naziv']; ?></h2>
	<pre><?php echo $tab['tablatura']; ?></pre>
<?php endif; ?>
<?php if (isset($pjesme_izvodjaca)): ?>
	<div class="list-group">
		<?php foreach ($pjesme_izvodjaca as $pjesma_izvodjaca): ?>

			<a href="<?php echo base_url('index.php/pocetak/tab/'.$pjesma_izvodjaca->pjesma_id); ?>" class="list-group-item list-group-item-action"><?php echo $pjesma_izvodjaca->naslov; ?></a>
			
		<?php endforeach; ?>
	</div>
<?php endif; ?>