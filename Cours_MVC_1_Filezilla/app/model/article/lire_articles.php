<?php

	function lire_articles($offset, $limite)
	{
		global $pdo;

		try
		{
			//On envoie la requête
			$query = $pdo->prepare('SELECT post_ID, post_title, post_date, left(post_content,300) AS contenu
											FROM blog_posts
											ORDER BY post_date DESC
											LIMIT :offset,:limite');

			//On initialise les paramètres
			$query->bindParam(':offset', $offset, PDO::PARAM_INT);
			$query->bindParam(':limite', $limite, PDO::PARAM_INT);

			//On exécute la requête
			$query->execute();

			//On récupère tous les résultats
			$articles = $query->fetchAll();

			//On supprime le curseur
			$query->closeCursor();

			//On retourne tous les articles selectionnés
			return $articles;
		}

		catch(Exception $e)
		{
			die('Erreur SQL: ' . $e->getMessage());
		}
	}