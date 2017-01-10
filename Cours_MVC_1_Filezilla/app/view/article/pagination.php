<p>Barre de pagination avec <?= $nb_pages ?> pages</p>

<div class="container-fluid pagination"> 

	<?php for($i=1; $i<$nb_pages+1; $i++)
	{ ?>
		<a href="?module=article&action=index&page=<?= $i; ?>"><?= $i; ?></a>
	<?php } ?>

</div>