<!doctype html>
<html lang="hr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Pjesmarica</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="<?php echo base_url(); ?>application/codemirror/lib/codemirror.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>application/codemirror/lib/codemirror.css">
		<script src="<?php echo base_url(); ?>application/codemirror/mode/javascript/javascript.js"></script>
		
		<!-- Piwik -->
		<script type="text/javascript">
		  var _paq = _paq || [];
		  _paq.push(["setDomains", ["*.zoran2.ddns.net/pjesmarica"]]);
		  _paq.push(['trackPageView']);
		  _paq.push(['enableLinkTracking']);
		  (function() {
		    var u="//zoran2.ddns.net/analitika/piwik/";
		    _paq.push(['setTrackerUrl', u+'piwik.php']);
		    _paq.push(['setSiteId', '3']);
		    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
		    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
		  })();
		</script>
		<noscript><p><img src="//zoran2.ddns.net/analitika/piwik/piwik.php?idsite=3" style="border:0;" alt="" /></p></noscript>
		<!-- End Piwik Code -->

	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
			  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <a class="navbar-brand" href="<?php echo base_url(''); ?>">Početak</a>
			  <div class="collapse navbar-collapse" id="navbarNav">
			  	<ul class="navbar-nav mr-auto">
			  	<?php if (isset($_SESSION['korisnik_id']) && $_SESSION['tip_id'] == 1): ?>
			    	<li class="nav-item">
			        	<a class="nav-link" href="<?php echo base_url('index.php/korisnik'); ?>">Korisnici</a>
			      	</li>
			      	<li class="nav-item">
			        	<a class="nav-link" href="<?php echo base_url('index.php/izvodjac'); ?>">Izvođači</a>
			    	</li>
			    	<li class="nav-item">
			        	<a class="nav-link" href="<?php echo base_url('index.php/pjesma'); ?>">Pjesme</a>
			    	</li>
			    <?php endif; ?>
			    </ul>
			    <ul class="navbar-nav">
			      <li class="nav-item">
			      	<?php if (!isset($_SESSION['korisnicko_ime'])): ?>
			        	<a class="nav-link" href="<?php echo base_url('index.php/prijava'); ?>">Prijava</a>
			        <?php else: ?>
			        	<li class="nav-item"><a class="nav-link" href="<?php echo base_url('index.php/korisnik/moji_podaci/'.$korisnik['korisnik_id']); ?>"><?php echo $_SESSION['korisnicko_ime']; ?></a></li>
			        	<a class="nav-link" href="<?php echo base_url('index.php/prijava/odjava'); ?>">Odjava</a>
			        <?php endif; ?>
			      </li>
			    </ul>
			  </div>
			</nav>