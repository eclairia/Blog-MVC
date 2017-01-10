<?php

	function lire_nb_articles()
	{
		global $pdo;

		try
		{
			$query = $pdo->query("SELECT COUNT(post_ID) AS nb_articles FROM blog_posts");

			$query->execute();
			
			$nb_articles = $query->fetch();

			//On retourne tous les articles sélectionnés
			return $nb_articles['nb_articles'];

			$query->closeCursor();			
		}

		catch(Exception $e)
		{
			die('Erreur SQL: ' . $e->getMessage());
		}
	}	