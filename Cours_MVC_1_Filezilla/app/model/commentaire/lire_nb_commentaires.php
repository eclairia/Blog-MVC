<?php

	//Permet de compter le nombre de commentaires dans la base de données
	function lire_nb_commentaires($id)
	{
		global $pdo;

		try
		{
			$query = $pdo->prepare("SELECT COUNT(comment_ID) AS nb_commentaires
									FROM blog_comments, blog_posts
									WHERE comment_post_ID = :id");

			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->execute();
			
			$nb_commentaires = $query->fetch();

			//On retourne tous les commentaires sélectionnés
			return $nb_commentaires['nb_commentaires'];

			$query->closeCursor();			
		}

		catch(Exception $e)
		{
			die('Erreur SQL: ' . $e->getMessage());
		}
	}	