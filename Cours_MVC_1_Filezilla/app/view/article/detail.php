<?php include("app/view/layout/header.inc.php"); ?>

<div class="container-fluid">

	<div class="container div-content-article">

		<h1><?= $articles[0]['post_title']; ?></h1>
		<p id="category-author">Classé dans: <?= $articles[0]['cat_descr']; ?></p>
		<p id="author-article">Rédigé par: <?= $articles[0]['user_login']; ?></p>
		<p id="content-article"><?= $articles[0]['post_content']; ?></p>

	</div>

</div>

<div class="container-fluid comments">

	<h2 class="container-fluid">Les commentaires (<?= $nb_commentaires_par_page ?>)</h2>


	<?php
	foreach($commentaires as $commentaire)
	{
	?>
		<div class="news">
		    <h3>
		        <?= $commentaire['user_login']; ?>
		        <em>le <?= $commentaire['comment_date']; ?></em>
		    </h3>
		    
		    <p>
		    <?= $commentaire['comment_content']; ?>
		    <br />
		    </p>
		</div>
	<?php
	}
	?>

	<?php if(isset($_SESSION["user"]))
	{ ?>
		<h2>Insérer un commentaire</h2>

		<form method="POST" action="?module=commentaire&action=inserer_commentaire">
			
			<label for="contenu_commentaire">Votre commentaire: </label><textarea name="contenu_commentaire" id="contenu_commentaire"></textarea><br />
			<input type="hidden" name="id" value="<?= $_GET["id"] ?>">
			<input type="submit" value="Enregistrer">

		</form>
	<?php }

	else
	{ ?>

		<div>
			
			<p>Connectez-vouspour commenter, cliquez <a href="?module=users&action=login">ici</a></p>

		</div>

	<?php } ?>



</div>

<?php include("app/view/layout/footer.inc.php"); ?>