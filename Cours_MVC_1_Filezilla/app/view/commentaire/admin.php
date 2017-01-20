<?php if(!defined("_BASE_URL")) die("Ressource interdite"); ?>
<?php include("app/view/layout/header.inc.php"); ?>

	<h1 class="container">Liste des commentaires</h1>

	<?php 

	/*
	*Paramètre 1: Name du select
	*Paramètre 2: Attribut class
	*Paramètre 3: Attribut id
	*Paramètre 4: Attend un tableau de données
	*Paramètre 5: id de la colonne du tableau (partie de gauche)
	*Paramètre 6: valeur de la colonne du tableau (partie de droite)
	*/

	if(isset($_GET["user"]))
	{ ?>
		<div class="container list_scroll"><?php scrolllist("users", "dropdown", "listusers", $users, "ID", "display_name", array("default" => "Tous les users", "selected" => $_GET['user'])); ?></div>
	<?php }
 
	else
	{ ?>
		<div class="container list_scroll"><?php scrolllist("users", "dropdown", "listusers", $users, "ID", "display_name", array("default" => "Tous les users")); ?></div>
	<?php } ?>

	<?php 

		if(!$commentaires)
		{ ?>
			<div class="container bgcolor">
				<p>Il n'y a aucun commentaire pour cet utilisateur pour le moment.</p>
			</div>
		<?php } 

		else
		{
			foreach($commentaires as $commentaire)
			{ ?>
					<div class="container bgcolor">
						<p>ID du commentaire: <?php echo $commentaire["comment_ID"]; ?></p>
						<p>ID du post: <?php echo $commentaire["comment_post_ID"]; ?></p>
						<p>ID auteur: <?php echo $commentaire["comment_author"]; ?></p>	
						<p>Date: <?php echo $commentaire["comment_date"]; ?></p>
						<p>Contenu: <?php echo $commentaire["comment_content"]; ?></p>
						<a href="?module=commentaire&action=supprimer_commentaire&page=<?= $page ?>&id=<?= $commentaire['comment_ID']; ?>" onclick=" return confirm('Etes-vous certain de vous certain de vouloir supprimer le message ?')">Supprimer le commentaire</a>
					</div>
			<?php } ?>
		<?php } ?>

	<?php 

		if(isset($_GET['user']))
		{
			paginate($nb_commentaires, PAGINATION_COMMENTAIRES, 'commentaire', 'admin', '&user=' . $_GET['user']);
		}

		else
		{
		 paginate($nb_commentaires, PAGINATION_COMMENTAIRES, 'commentaire', 'admin');
		}	

	?>

<script type="text/javascript" src="webroot/js/commentaire_admin.js"></script>

<?php include("app/view/layout/footer.inc.php"); ?>