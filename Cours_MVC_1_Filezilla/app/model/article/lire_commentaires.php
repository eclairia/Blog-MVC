<?php

	/*
		Fonction lire_commentaires dans le modèle
		Permet d'afficher les commentaires liés à l'article
	*/
	function lire_commentaires($id, $nb_commentaires_par_page)
	{
		global $pdo;

		try
		{
			$query = $pdo->prepare('SELECT * 
									FROM blog_comments, blog_users
									WHERE comment_post_ID =:id
									AND comment_author = ID
									ORDER BY comment_date DESC
									LIMIT :nb_commentaires_par_page');

			$query->bindParam(':id', $id, PDO::PARAM_INT);
			$query->bindParam(':nb_commentaires_par_page', $nb_commentaires_par_page, PDO::PARAM_INT);

			$query->execute();

			$commentaires = $query->fetchAll();
			
			return $commentaires;
		}

		catch(Exception $e)
		{
			echo 'Erreur SQL: ' . $e->getMessage();
		}
	}