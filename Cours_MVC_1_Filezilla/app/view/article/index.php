<?php include("app/view/layout/header.inc.php"); ?>

	<div class="container-fluid all-articles">
		
		<h3>Derniers articles du blog</h3>

		<?php

			//Pour chaque article du tableau
			foreach($articles as $article)
			{?>
				<div class="container">

					<h2><a href="?module=article&action=detail&id=<?= $article['post_ID']?>">
						<?= $article['post_title']; ?>
					</a></h2>
					<br />
					 <p><?= $article['post_date']; ?></p>
					<br />
					<p><?= $article['contenu']; ?> ...</p>

				</div>

			<?php } ?>
	</div>

	<?php 

		//include("app/view/article/pagination.php"); 

		paginate($nb_articles, PAGINATION_ARTICLES, 'article', 'index');

	?>

<?php include("app/view/layout/footer.inc.php"); ?>